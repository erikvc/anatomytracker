// JavaScript Document

const url = 'http://www.optocreative.com/APPS/anatomytracker/';

/*=================BOTÃO VOLTAR DO TOPO==============*/
$("#top-back").click(function(){
	window.history.back();
});

/**CADASTRAR PAGINA ADMIN ACCOUNT**/
$("#opto-form-create-admin").submit(function (e){
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: url+"createAdmin.php",
        type: 'POST',
        data: formData,
        before: function(){
            $(".lightbox-wait").fadeIn('slow');
        },
        success: function (newClientReturn) {
            if(newClientReturn == 'ok'){
                $('#form-cadastrar input').val('');
                $('.lightbox-label').html('Cadastrado com Sucesso!');
                setTimeout(function(){
                    $(".lightbox-wait").fadeOut('slow');
                    window.location.href = "login.html";
                },3000)
                
            }else{
                $(".lightbox-label").text(newClientReturn);
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
                    $(".lightbox-wait").fadeIn('slow');
                }, false);
            }
            return myXhr;
        }
    });
})
/**FIM CADASTRAR**/