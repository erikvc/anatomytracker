// JavaScript Document

const url = '';

/*=================BOTÃO VOLTAR DO TOPO==============*/
$("#top-back").click(function(){
	window.history.back();
});

/**CADASTRAR PAGINA ADMIN ACCOUNT**/
$("#opto-form-create-admin").submit(function (e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: url+"anatomytracker/webservice/createAdmin.php",
        type: 'POST',
        data: formData,
		crossDomain: true,
        before: function(){
            $("#opto-loading-overlay").show('slow');
        },
        success: function (newClientReturn) {
            if(newClientReturn == 'ok'){
                $('#opto-form-create-admin input').val('');
				$(".opto-button1").fadeIn('slow');
				$("#opto-loading").fadeOut('slow');
                //$('.lightbox-label').html('Cadastrado com Sucesso!');
                setTimeout(function(){
                    $("#opto-loading-overlay").hide('slow');
                    window.location.href = "login.html";
                },3000)
                
            }else{
                alert(newClientReturn);
            }
        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function () {
                    /* faz alguma coisa durante o progresso do upload */
                    $("#opto-loading").fadeIn('slow');
					$(".opto-button1").fadeOut('slow');
					//alert('llllllll');
                }, false);
            }
            return myXhr;
        }
    });
})


/**FIM CADASTRAR**/



/**CADASTRAR PAGINA USERS ACCOUNT**/
$("#opto-form-create-users").submit(function (e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: url+"anatomytracker/webservice/createUsers.php",
        type: 'POST',
        data: formData,
		crossDomain: true,
        before: function(){
            $("#opto-loading-overlay").show('slow');
        },
        success: function (newClientReturn) {
            if(newClientReturn == 'ok'){
                $('#opto-form-create-users input').val('');
				$(".opto-button1").fadeIn('slow');
				$("#opto-loading").fadeOut('slow');
                //$('.lightbox-label').html('Cadastrado com Sucesso!');
                setTimeout(function(){
                    $("#opto-loading-overlay").hide('slow');
                    window.location.href = "login.html";
                },3000)
                
            }else{
                alert(newClientReturn);
            }
        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function () {
                    /* faz alguma coisa durante o progresso do upload */
                    $("#opto-loading").fadeIn('slow');
					$(".opto-button1").fadeOut('slow');
					//alert('llllllll');
                }, false);
            }
            return myXhr;
        }
    });
})


/**FIM CADASTRAR**/



/**LOGIN**/
$("#opto-form-login").submit(function(e){
	e.preventDefault();
	var dataLogin = $(this).serialize();
	$.ajax({
		url: url+'anatomytracker/webservice/login.php',
		type: 'get',
		crossDomain: true,
		dataType: 'json',
		data: dataLogin,
		success: function(data){
			console.log(data);
			if(data != null){
				
				localStorage.setItem('userID', data[0].id);
				localStorage.setItem('userType', data[0].type);
				localStorage.setItem('userFirst', data[0].first);
				localStorage.setItem('userLast', data[0].last);
				localStorage.setItem('userEmail', data[0].email);
				localStorage.setItem('userUsername', data[0].username);
				localStorage.setItem('admin_id', data[0].admin_id);
				localStorage.setItem('userImage', data[0].image);
				
				if(data[0].type == 0){
				   window.location.href="user_profile.html";
				}else{
				   window.location.href="admin_profile.html";	
				}

				  
			}else{
				$("#opto-errorSuccess").text('Invalid Email or Password!');
				$("#opto-errorSuccess").fadeIn('slow');
				setTimeout(function(){
					$("#opto-errorSuccess").fadeOut('slow');
				},3000)
			}
			
		},
		error: function(data){
			alert(data);
		}
	})
});



function verificaLogado(){
	var logado = localStorage.getItem('userEmail');
	if(logado == null){
	   window.location.href='login.html';
	}
}



/***********LOGOUT************/
function logout(){
	localStorage.removeItem('userID');
	localStorage.removeItem('userType');
	localStorage.removeItem('userFirst');
	localStorage.removeItem('userLast');
	localStorage.removeItem('userEmail');
	localStorage.removeItem('userUsername');
	localStorage.removeItem('userImage');
	
	window.location.href="login.html";
}



/***********SEND INVITE**********/
$("#opto-form-invite").submit(function(e){
	e.preventDefault();
	var inviteEmail = $("#inviteFieldEmail").val();
	var admin_id = localStorage.getItem('userID');
	var type = localStorage.getItem('userType');
	$.ajax({
		url: url+'anatomytracker/webservice/invite.php',
		type: 'get',
		data: 'inviteEmail='+inviteEmail+'&admin_id='+admin_id+'&type='+type,
		crossDomain: true,
		success: function(dados){
			alert(dados);
		}
	})
});



/*************JOIN USERS***************/
$("#opto-form-joinusers").submit(function(e){
	e.preventDefault();
	var joinID = $("#joinID").val();
	$.ajax({
		url: url+'anatomytracker/webservice/join.php',
		type: 'get',
		crossDomain: true,
		dataType: 'json',
		data: 'id='+joinID,
		success: function(dados){
			if(dados != 'erro'){
				sessionStorage.setItem('accountName', dados[0].accountName);
				sessionStorage.setItem('system_id', dados[0].system_id);
				sessionStorage.setItem('admin_id', dados[0].admin_id);
				sessionStorage.setItem('invite_email', dados[0].invite_email);
				
				window.location.href='create_users_account.html';
			}else{
				$("#opto-errorSuccess").fadeIn();
				setTimeout(function(){
					$("#opto-errorSuccess").fadeOut();
				},3000);
			}
			
		},
		error: function(){
			/****/
		}
		
	})
});



/***************SET INVITE INFO ON CREATE USERS PAGE*************/
function setInviteInfo(){
	var accountName = sessionStorage.getItem('accountName');
	var system_id = sessionStorage.getItem('system_id');
	var admin_id = sessionStorage.getItem('admin_id');
	var invite_email = sessionStorage.getItem('invite_email');
	
	$("#opto-recebe-accountname").text(accountName);
	$("#opto-recebe-inviteID").text(system_id);
	$("#opto-email-disable").val(invite_email);
}



/***************PEGA MEMBERS LIST***************/
function pegaMembers(){
	var admin_id = localStorage.getItem('userID');
	
	$.ajax({
		url: url+'anatomytracker/webservice/pegaMembersList.php',
		type: 'get',
		crossDomain: true,
		dataType: 'json',
		data: 'id='+admin_id,
		success: function(dados){
			$("#recebe-members-list").empty();
			if(dados.length == 0){
			   alert('There are no members yet for this administrator, invite new members to join your cycle.');
				window.location.href="invite_members.html";
			}else{
				for(var i=0;dados.length>i;i++){
					$("#recebe-members-list").append('<div class="opto-list-box"><div class="opto-list-image"><img src="'+url+'anatomytracker/images/'+dados[i].image+'" width="200" height="200" alt=""/><div class="opto-online-ball"></div></div><div class="opto-box-text"><div class="opto-list-name">'+dados[i].first+'&nbsp;'+dados[i].last+'</div><div class="opto-list-function">'+dados[i].username+'</div><div class="opto-list-location"><i class="fas fa-map-marker-alt"></i> Dishant Hospital, Ring road, Nagpur</div></div><div class="opto-list-arrow"><i class="fas fa-chevron-right"></i></div></div>');
				}
			}
		},
		error: function(dados){
			alert(console.log(dados));
		}
	})
}

/***************PEGA TISSUE LIST***************/
function pegaTissue(){
	var adminID = localStorage.getItem('userID');
	
	$.ajax({
		url: url+'anatomytracker/webservice/pegaTissueList.php',
		type: 'get',
		crossDomain: true,
		dataType: 'json',
		data: 'id=31',//+admin_id,
		success: function(dados){
			$("#recebe-tissue-list").empty();
			if(dados.length == 0){
			   alert('There are no tissue yet for this administrator.');
			}else{
				for(var i=0;dados.length>i;i++){
					$("#recebe-tissue-list").append('<div class="opto-list-box"><div class="opto-list-image"><img src="'+url+'anatomytracker/images/dummy-user.jpg" width="200" height="200" alt=""/><div class="opto-online-ball"></div></div><div class="opto-box-text"><div class="opto-list-name">'+dados[i].first+'</div><div class="opto-list-function">'+dados[i].username+'</div><div class="opto-list-location"><i class="fas fa-map-marker-alt"></i> Dishant Hospital, Ring road, Nagpur</div></div><div class="opto-list-arrow"><i class="fas fa-chevron-right"></i></div></div>');
				}
			}
		},
		error: function(dados){
			alert(console.log(dados));
		}
	})
}




/**CADASTRAR TISSUE**/
$("#opto-form-create-tissue").submit(function (e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: url+"anatomytracker/webservice/createTissue.php",
        type: 'POST',
        data: formData,
		crossDomain: true,
        before: function(){
            //$("#opto-loading-overlay").show('slow');
        },
        success: function (newClientReturn) {
            $("#opto-loading").fadeOut('slow');
			$(".opto-button1").fadeIn('slow');
			window.location.href="tissue_directory.html";
        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function () {
                    /* faz alguma coisa durante o progresso do upload */
                    $("#opto-loading").fadeIn('slow');
					$(".opto-button1").fadeOut('slow');
					//alert('llllllll');
                }, false);
            }
            return myXhr;
        }
    });
})


/**FIM CADASTRAR**/





/*********PEGA IMAGEM USER PROFILE**********/
function pegaUserProfile(){
	var userImage = localStorage.getItem("userImage");
	var firstName = localStorage.getItem("userFirst");
	$("#user-image-profile").attr('src', url+'anatomytracker/images/'+userImage);
	$("#user-name-profile").html("Welcome "+firstName);
}