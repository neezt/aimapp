<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon-32x32.png" sizes="32x32">

    <title>Asamblea Internacional 2019</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url();?>bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login_page.min.css" />

</head>
<body class="login_page">

    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <img src="<?php echo base_url();?>assets/img/jw2019.svg">   
                </div>
                <form id="form-login" onsubmit="return false;">
                    <div id="msg-err" style="color:red; size: 7px; padding-bottom: 10px; display: none;">
                        E-mail o Password incorrecto, si no lo recuerda, contacte a su coordinador
                    </div>

                    <div class="uk-form-row">
                        <label for="login_email">E-mail</label>
                        <input class="md-input" type="text" id="login_email" name="login_email" required />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">Contrase&ntilde;a</label>
                        <input class="md-input" type="password" id="login_password" name="login_password" required />
                    </div>
                    <div class="uk-margin-medium-top">
                        <button type="submit" id="login-btn" class="md-btn md-btn-primary md-btn-block md-btn-large">Ingresar</button>
                    </div>
                    <div class="uk-margin-top">
                        <a href="#" id="login_help_show" class="uk-float-right">Necesitas ayuda ?</a>
                    </div>
                </form>
            </div>
            <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_b uk-text-success">No puedes iniciar sesi&oacute;n?</h2>
                <p>Este sistema es de uso exclusivo para voluntarios de la Asamblea Internacional 2019</p>
                <p>Si usted ya tenia acceso y no puede iniciar sesi&oacute;n, por favor, comuniquese con su coordinador del departamento para que le brinde la ayuda.</p>
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                <form>
                    <div class="uk-form-row">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <a href="index.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                    </div>
                </form>
            </div>
            
        </div>
       
    </div>

    <!-- common functions -->
    <script src="<?=base_url();?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?=base_url();?>assets/js/uikit_custom.min.js"></script>
    <!-- altair core functions -->
    <script src="<?=base_url();?>assets/js/altair_admin_common.min.js"></script>

    <script>
    altair_forms.parsley_validation_config();
    </script>
    <script src="<?=base_url();?>bower_components/parsleyjs/dist/parsley.min.js"></script>
    <!-- altair login page functions -->
    <script src="<?=base_url();?>assets/js/pages/login.js"></script>

    <script>
        // check for theme
        if (typeof(Storage) !== "undefined") {
            var root = document.getElementsByTagName( 'html' )[0],
                theme = localStorage.getItem("altair_theme");
            if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
                root.className += ' app_theme_dark';
            }
        }
    </script>

</body>
</html>