 <?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');

require("conexaoPDO.php");

$inviteEmail = $_GET['inviteEmail'];
$admin_id = $_GET['admin_id'];
$type = $_GET['type'];

$system_id = rand(0,1000000);


$texto = '<!doctype html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="date=no">
    <meta name="format-detection" content="address=no">
    <meta name="format-detection" content="email=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <meta charset="utf-8">
    <title>Notification</title>
    <style type="text/css">/* Typography */
.o_text-sans {
  font-family: Arial,"Helvetica Neue",Helvetica,sans-serif;
  word-break: break-word; }

.o_text-headline {
  font-family: Arial,"Helvetica Neue",Helvetica,sans-serif;
  word-break: break-word;
  font-weight: bold; }

.o_ereset p,
.o_ereset li,
.o_ereset h1,
.o_ereset h2,
.o_ereset h3,
.o_ereset h4,
.o_ereset h5,
.o_ereset h6 {
  Margin-top: 0px;
  Margin-bottom: 0px; }

.o_ereset a,
.o_ereset a:visited {
  text-decoration: none;
  outline: none; }

.o_esec .o_underline {
  text-decoration: underline; }

.o_esec .o_underline:hover {
  text-decoration: none !important; }

.o_esec .o_linethrough {
  text-decoration: line-through; }

.o_esec .o_nowrap {
  white-space: nowrap; }

/* Default Sizes  */
.o_esec .o_text {
  font-size: 16px;
  line-height: 24px; }

.o_esec .o_text-xs {
  font-size: 14px;
  line-height: 21px; }

.o_text-xxs {
  font-size: 12px;
  line-height: 19px;
  text-transform: uppercase;
  letter-spacing: 1px; }

.o_esec .o_text-md {
  font-size: 18px;
  line-height: 27px; }

.o_esec .o_text-lg {
  font-size: 20px;
  line-height: 30px; }

.o_esec h1 {
  font-size: 32px;
  line-height: 41px; }

.o_esec h2 {
  font-size: 25px;
  line-height: 32px; }

.o_esec h3 {
  font-size: 20px;
  line-height: 28px; }

.o_esec h4 {
  font-size: 16px;
  line-height: 24px; }

.o_esec .o_text-caps {
  text-transform: uppercase;
  letter-spacing: 2px; }

.o_ebody {
  margin: 0px;
  padding: 0px; }

.o_ereset {
  font-size: 0 !important;
  line-height: 100%; }

.o_block {
  max-width: 600px; }

.o_col {
  display: inline-block !important;
  width: 100%;
  vertical-align: top; }

.o_col-1 {
  max-width: 92px; }

.o_col-o {
  max-width: 128px; }

.o_col-2 {
  max-width: 184px; }

.o_col-3 {
  max-width: 276px; }

.o_col-4 {
  max-width: 368px; }

.o_col-oo {
  max-width: 424px; }

.o_col-5 {
  max-width: 460px; }

.o_col-6s {
  max-width: 536px; }

.o_col-6 {
  max-width: 552px; }

/* Reset */
.o_ereset img {
  -ms-interpolation-mode: bicubic;
  display: block;
  border: 0;
  line-height: 100%;
  height: auto;
  outline: none;
  text-decoration: none; }

.o_img-full {
  width: 100%; }

.o_esec,
.o_esec table {
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%; }

.o_esec table[align="center"] {
  margin: 0 auto; }

.o_ereset a,
.o_esec .o_inline {
  display: inline-block; }

/* Buttons */
.o_btn {
  transition: all .15s ease-in; }
  .o_btn a {
    display: block; }
  .o_btn:hover {
    transform: scale(1.1); }

.o_pbtn {
  padding: 14px 32px;
  vertical-align: top; }

.o_link {
  transition: all .15s ease-in; }
  .o_link:hover {
    opacity: .6; }

/* Colors */
.o_bg-white {
  background-color: #ffffff; }

.o_bg-default {
  background-color: #056ff0; }

.o_text-default,
a.o_text-default span,
a.o_text-default strong {
  color: #056ff0; }

.o_text-dark,
a.o_text-dark span,
a.o_text-dark strong {
  color: #212932; }

.o_text-white,
a.o_text-white span,
a.o_text-white strong {
  color: #ffffff; }

.o_text-accent,
a.o_text-accent span,
a.o_text-accent strong {
  color: #3ab7ff; }

.o_text-muted,
a.o_text-muted span,
a.o_text-muted strong {
  color: #687887; }

.o_bb-default {
  border-bottom: 2px solid #056ff0; }

.o_b-default {
  border: 4px solid #056ff0; }

.o_bb-muted {
  border-bottom: 4px solid #e9e9f1; }

.o_bb-white {
  border-bottom: 4px solid #ffffff; }

.o_br {
  border-radius: 6px; }

.o_br-max {
  border-radius: 56px; }

/* Display */
.o_hide,
.o_hide-lg {
  display: none;
  font-size: 0;
  max-height: 0;
  width: 0;
  line-height: 0;
  overflow: hidden;
  mso-hide: all;
  visibility: hidden; }

/* Alignment */
.o_text-center {
  text-align: center; }

.o_text-left {
  text-align: left; }

.o_text-right {
  text-align: right; }

.o_text-nowrap {
  white-space: nowrap; }

/* Padding */
.o_px {
  padding-left: 16px;
  padding-right: 16px; }

.o_px-xs {
  padding-left: 8px;
  padding-right: 8px; }

.o_px-md {
  padding-left: 24px;
  padding-right: 24px; }

.o_px-lg {
  padding-left: 32px;
  padding-right: 32px; }

.o_px-mg {
  padding-left: 40px;
  padding-right: 40px; }

.o_px-ng {
  padding-left: 48px;
  padding-right: 48px; }

.o_py {
  padding-top: 16px;
  padding-bottom: 16px; }

.o_py-md {
  padding-top: 24px;
  padding-bottom: 24px; }

.o_py-lg {
  padding-top: 32px;
  padding-bottom: 32px; }

.o_pt {
  padding-top: 16px; }

.o_pt-md {
  padding-top: 24px; }

.o_pt-lg {
  padding-top: 32px; }

.o_pb-xs {
  padding-bottom: 8px; }

.o_pb {
  padding-bottom: 16px; }

.o_pb-md {
  padding-bottom: 24px; }

.o_pb-lg {
  padding-bottom: 32px; }

.o_p-icon {
  padding: 12px; }

/* Margins */
.o_esec .o_mb-xs {
  margin-bottom: 8px; }

.o_esec .o_mb {
  margin-bottom: 16px; }

.o_esec .o_mb-md {
  margin-bottom: 24px; }

.o_esec .o_mb-lg {
  margin-bottom: 32px; }

.o_esec .o_mt {
  margin-top: 16px; }

.o_esec .o_mt-md {
  margin-top: 24px; }

/* Backgrounds */
.o_bg-center {
  background-position: 50% 0%;
  background-repeat: no-repeat; }

@media (max-width: 633px) {
  u ~ div {
    min-width: 100vw !important; }
  .o_hide-lg {
    display: inline-block !important;
    font-size: inherit !important;
    max-height: none !important;
    line-height: inherit !important;
    overflow: visible !important;
    width: auto !important;
    visibility: visible !important; }
  .o_hide-xs {
    display: none !important;
    font-size: 0 !important;
    max-height: 0 !important;
    width: 0 !important;
    line-height: 0 !important;
    overflow: hidden !important;
    visibility: hidden !important; }
  .o_col-xs-1 {
    max-width: 25% !important; }
  .o_col-xs-2 {
    max-width: 50% !important;
    float: left !important; }
  .o_col-xs-3 {
    max-width: 75% !important; }
  .o_col-xs-4 {
    max-width: 100% !important; }
  .o_text-xs-center {
    text-align: center !important; }
  .o_text-xs-left {
    text-align: left !important; }
    .o_text-xs-left table {
      margin-left: 0 !important;
      margin-right: auto !important; }
  .o_xs-pt {
    padding-top: 16px !important; } }

@media screen {
  .o_pbtn {
    padding: 0px !important; }
  .o_btn .o_pbtn a {
    padding: 14px 32px; }
  .o_text-sans {
    font-family: "Roboto", sans-serif !important; }
  .o_text-headline {
    font-family: "Montserrat", sans-serif !important;
    font-weight: 700 !important; }
  /* cyrillic-ext */
  @font-face {
    font-family: \'Montserrat\';
    font-style: normal;
    font-weight: 700;
    src: local("Montserrat Bold"), local("Montserrat-Bold"), url(https://fonts.gstatic.com/s/montserrat/v12/IQHow_FEYlDC4Gzy_m8fcrllaL-ufMOTUcv7jfgmuJg.woff2) format("woff2");
    unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F; }
  /* cyrillic */
  @font-face {
    font-family: \'Montserrat\';
    font-style: normal;
    font-weight: 700;
    src: local("Montserrat Bold"), local("Montserrat-Bold"), url(https://fonts.gstatic.com/s/montserrat/v12/IQHow_FEYlDC4Gzy_m8fcpsnFT_2ovhuEig4Dh-CBQw.woff2) format("woff2");
    unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116; }
  /* vietnamese */
  @font-face {
    font-family: \'Montserrat\';
    font-style: normal;
    font-weight: 700;
    src: local("Montserrat Bold"), local("Montserrat-Bold"), url(https://fonts.gstatic.com/s/montserrat/v12/IQHow_FEYlDC4Gzy_m8fcnv4bDVR720piddN5sbmjzs.woff2) format("woff2");
    unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB; }
  /* latin-ext */
  @font-face {
    font-family: \'Montserrat\';
    font-style: normal;
    font-weight: 700;
    src: local("Montserrat Bold"), local("Montserrat-Bold"), url(https://fonts.gstatic.com/s/montserrat/v12/IQHow_FEYlDC4Gzy_m8fcjrEaqfC9P2pvLXik1Kbr9s.woff2) format("woff2");
    unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF; }
  /* latin */
  @font-face {
    font-family: \'Montserrat\';
    font-style: normal;
    font-weight: 700;
    src: local("Montserrat Bold"), local("Montserrat-Bold"), url(https://fonts.gstatic.com/s/montserrat/v12/IQHow_FEYlDC4Gzy_m8fcmaVI6zN22yiurzcBKxPjFE.woff2) format("woff2");
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2212, U+2215; }
  /* cyrillic-ext */
  @font-face {
    font-family: \'Roboto\';
    font-style: normal;
    font-weight: 400;
    src: local("Roboto"), local("Roboto-Regular"), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu72xKOzY.woff2) format("woff2");
    unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F; }
  /* cyrillic */
  @font-face {
    font-family: \'Roboto\';
    font-style: normal;
    font-weight: 400;
    src: local("Roboto"), local("Roboto-Regular"), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu5mxKOzY.woff2) format("woff2");
    unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116; }
  /* greek-ext */
  @font-face {
    font-family: \'Roboto\';
    font-style: normal;
    font-weight: 400;
    src: local("Roboto"), local("Roboto-Regular"), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7mxKOzY.woff2) format("woff2");
    unicode-range: U+1F00-1FFF; }
  /* greek */
  @font-face {
    font-family: \'Roboto\';
    font-style: normal;
    font-weight: 400;
    src: local("Roboto"), local("Roboto-Regular"), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu4WxKOzY.woff2) format("woff2");
    unicode-range: U+0370-03FF; }
  /* vietnamese */
  @font-face {
    font-family: \'Roboto\';
    font-style: normal;
    font-weight: 400;
    src: local("Roboto"), local("Roboto-Regular"), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7WxKOzY.woff2) format("woff2");
    unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB; }
  /* latin-ext */
  @font-face {
    font-family: \'Roboto\';
    font-style: normal;
    font-weight: 400;
    src: local("Roboto"), local("Roboto-Regular"), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7GxKOzY.woff2) format("woff2");
    unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF; }
  /* latin */
  @font-face {
    font-family: \'Roboto\';
    font-style: normal;
    font-weight: 400;
    src: local("Roboto"), local("Roboto-Regular"), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu4mxK.woff2) format("woff2");
    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD; } }
</style>

    <!--[if (gte mso 9)|(IE)]>
    <xml>
     <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
     </o:OfficeDocumentSettings>
    </xml>
    <style type="text/css">
    	.o_of { float: left; }
    </style>
    <![endif]-->
  </head>
  <body class="o_ebody" style="margin: 0px;padding: 0px;">
    <table class="o_esec" role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;">
      <tbody>
        <tr>
          <td class="o_ereset o_bg-dark o_hide" style="line-height: 0;display: none;font-size: 0 !important;max-height: 0;width: 0;overflow: hidden;mso-hide: all;visibility: hidden;">
            <div>Hidden preheader text here</div>
            <div>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
          </td>
        </tr>
        <tr>
          <td class="o_ereset o_bg-dark o_pt-lg o_pb o_px-mg" align="center" style="line-height: 100%;padding-left: 40px;padding-right: 40px;padding-top: 32px;padding-bottom: 16px;font-size: 0 !important;">
            <!--[if mso]>
            <table role="presentation" width="552" border="0" cellspacing="0" cellpadding="0" align="center">
            <tbody>
            <tr>
            <td width="184" align="left" style="padding: 0 8px;vertical-align:top;">
            <![endif]-->
            <div class="o_col o_col-2 o_text-left o_text-xs-center" style="width: 100%;vertical-align: top;max-width: 184px;text-align: left;display: inline-block !important;">
              <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                <p class="o_text o_text-sans" style="font-family: Arial,&quot;Helvetica Neue&quot;,Helvetica,sans-serif;word-break: break-word;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;"><a class="o_text-dark o_link" href="#" style="transition: all .15s ease-in;color: #212932;text-decoration: none;outline: none;display: inline-block;"><img src="http://optocreative.com/APPS/anatomytracker/images/emailInvite/logo2.png" width="222" height="57" alt="TL;DR" style="max-width: 150px;-ms-interpolation-mode: bicubic;display: block;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a></p>
              </div>
            </div>
            <!--[if mso]>
            </td>
            <td width="368" align="right" style="padding: 0 8px;vertical-align:top;">
            <![endif]--><!--[if mso]>
            </td>
            </tr>
            </table>
            <![endif]-->
          </td>
        </tr>
        <tr>
          <td class="o_ereset o_bg-dark o_px" align="center" style="line-height: 100%;padding-left: 16px;padding-right: 16px;font-size: 0 !important;">
            <!--[if mso]>
            <table role="presentation" width="600" border="0" cellspacing="0" cellpadding="0" align="center">
            <tbody>
            <tr>
            <td align="center">
            <![endif]-->
            <table class="o_block" role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;">
              <tbody>
                <tr>
                  <td class="o_ereset o_bg-default o_bg-center o_br o_px-md o_py-lg" align="center" background="http://optocreative.com/APPS/anatomytracker/images/emailInvite/hero_lines-color.png" style="line-height: 100%;background-color: #056ff0;border-radius: 6px;padding-left: 24px;padding-right: 24px;padding-top: 32px;padding-bottom: 32px;background-position: 50% 0%;background-repeat: no-repeat;font-size: 0 !important;">
                    <!--[if mso]>
                    <table role="presentation" width="552" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                    <tr>
                    <td align="center" style="padding: 0 8px;">
                    <![endif]-->
                    <div class="o_col o_col-4" style="width: 100%;vertical-align: top;max-width: 368px;display: inline-block !important;">
                      <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                        <table role="presentation" align="center" cellspacing="0" cellpadding="0" border="0" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;margin: 0 auto;">
                          <tbody>
                            <tr>
                              <td style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </td>
                            </tr>
                            <tr>
                              <td class="o_bg-white o_text o_text-sans o_text-dark o_p-icon o_br-max" style="font-family: Arial,&quot;Helvetica Neue&quot;,Helvetica,sans-serif;word-break: break-word;background-color: #ffffff;color: #212932;border-radius: 56px;padding: 12px;font-size: 16px;line-height: 24px;">
                                <img class="o_br-max" src="http://optocreative.com/APPS/anatomytracker/images/emailInvite/icon_notifications.gif" width="88" height="88" alt="Ringing Bell" style="max-width: 88px;border-radius: 56px;-ms-interpolation-mode: bicubic;display: block;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <h3 class="o_text-headline o_text-white o_mt-md o_mb-xs" style="font-family: Arial,&quot;Helvetica Neue&quot;,Helvetica,sans-serif;word-break: break-word;font-weight: bold;color: #ffffff;margin-top: 24px;margin-bottom: 8px;font-size: 20px;line-height: 28px;">Invite!</h3>
                        <p class="o_text o_text-sans o_text-white o_mb-lg" style="font-family: Arial,&quot;Helvetica Neue&quot;,Helvetica,sans-serif;word-break: break-word;color: #ffffff;margin-top: 0px;margin-bottom: 32px;font-size: 16px;line-height: 24px;">Join Anatomy Tracker Community!<br>ID: '.$system_id.'</p>
                        <table class="o_btn" role="presentation" align="center" cellspacing="0" cellpadding="0" border="0" style="transition: all .15s ease-in;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;margin: 0 auto;">
                          <tbody>
                            <tr>
                              <td class="o_pbtn o_text-md o_br-max o_bg-white" align="center" style="padding: 14px 32px;vertical-align: top;background-color: #ffffff;border-radius: 56px;font-size: 18px;line-height: 27px;">
                                <a class="o_text-headline o_text-dark" href="https://www.apple.com/br/ios/app-store/" style="font-family: Arial,&quot;Helvetica Neue&quot;,Helvetica,sans-serif;word-break: break-word;font-weight: bold;color: #212932;text-decoration: none;outline: none;display: block;"><span style="color: #212932;">Get Start Now!</span></a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table role="presentation" align="center" width="184" cellspacing="0" cellpadding="0" border="0" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;margin: 0 auto;">
                          <tbody>
                            <tr>
                              <td class="o_ereset o_pt-md o_bb-white" style="line-height: 100%;border-bottom: 4px solid #ffffff;padding-top: 24px;font-size: 0 !important;">&nbsp; </td>
                            </tr>
                          </tbody>
                        </table>
                        
                      </div>
                    </div>
                    <!--[if mso]>
                    </td>
                    </tr>
                    </table>
                    <![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]>
            </td>
            </tr>
            </table>
            <![endif]-->
          </td>
        </tr>
        <tr>
          <td class="o_ereset o_bg-dark" style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </td>
        </tr>
        <tr>
          <td class="o_ereset o_bg-dark o_px-ng o_pt o_pb-lg" align="center" style="line-height: 100%;padding-left: 48px;padding-right: 48px;padding-top: 16px;padding-bottom: 32px;font-size: 0 !important;">
            <!--[if mso]>
            <table role="presentation" width="536" border="0" cellspacing="0" cellpadding="0" align="center">
            <tbody>
            <tr>
            <td align="center">
            <![endif]-->
            <div class="o_col-6s o_text-sans o_text-xs" style="font-family: Arial,&quot;Helvetica Neue&quot;,Helvetica,sans-serif;word-break: break-word;max-width: 536px;font-size: 14px;line-height: 21px;">
              <p class="o_text-muted" style="color: #687887;margin-top: 0px;margin-bottom: 0px;"><a class="o_text-muted o_link" href="#" style="transition: all .15s ease-in;color: #8f8f8f;text-decoration: none;outline: none;display: inline-block;"><img src="http://optocreative.com/APPS/anatomytracker/images/emailInvite/logo2.png" width="180" height="32" alt="Facebook" style="display: inline-block;max-width: 32px;-ms-interpolation-mode: bicubic;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a></p>
              <p class="o_text-muted" style="color: #687887;margin-top: 0px;margin-bottom: 0px;">Anatomy Tracker <br>
                ©2019 Opto Creative Lab Inc.</p>
              <p class="o_text-muted" style="color: #687887;margin-top: 0px;margin-bottom: 0px;">
                <a class="o_text-muted" href="#" style="color: #687887;text-decoration: none;outline: none;display: inline-block;"><span style="color: #687887;">www.optocreative.com</span></a></p>
            </div>
            <!--[if mso]>
            </td>
            </tr>
            </table>
            <![endif]-->
            <div class="o_hide-xs" style="font-size: 64px; line-height: 64px; height: 64px;">&nbsp; </div>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
';


$verificaEmail = mysqli_query($conexao, "SELECT * FROM invite WHERE email = '$inviteEmail'");
$contagem = mysqli_num_rows($verificaEmail);

if($contagem == 0){
	
				
	$sqlPegaTasks = mysqli_query($conexao, "INSERT INTO invite (email, system_id, admin_id, creation_date)VALUES('$inviteEmail', '$system_id', '$admin_id', NOW())") or die(mysqli_error($conexao));
	
	$headers = "MIME-Version: 1.1\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	$headers .= "From: info@optocreative.com\n"; // remetente
	$envio = mail($inviteEmail, "Join your ANATOMY TRACKER community!", $texto, $headers);
		
	if($envio){
		echo 'Send Successfully!';
	}else{
		echo 'Error';
	}
	
	
}else{
	echo 'existe';
}

				
				
			


?>