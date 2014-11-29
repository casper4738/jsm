<!DOCTYPE html>
<html lang="en">
    <head>
        <title>JSM</title>
        <meta charset="utf-8">
        <?php
        $list = array(
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/style.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/960.fluid.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/main.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/buttons.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/lists.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/icons.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/notifications.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/typography.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/forms.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/tables.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/charts.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/jquery-ui-1.8.15.custom.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => '//fonts.googleapis.com/css?family=PT+Sans'),
        );

        foreach ($list as $value) {
            echo link_tag($value);
        }
        ?>

        <script src="<?= base_url(); ?>asset/template_admin/js/modernizr-2.0.6.min.js" type="text/javascript"></script>


    </head>

    <body class="special-page">
        <div id="container">
            <section id="login-box">
                <div class="block-border">
                    <div class="block-header">
                        <h1>Login</h1>
                    </div>
                    <?php
                    $attributes = array('id' => 'login-form', 'class' => 'block-content form');
                    echo form_open('login/verify', $attributes);
                    ?>
                    <p class="inline-small-label">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="" class="required">
                    </p>
                    <p class="inline-small-label">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="" class="required">
                    </p>
                    <div class="clear"></div>
                    <div class="block-actions">
                        <ul class="actions-left">

                            <li><a class="button red" id="reset-login" href="javascript:void(0);">Kembali</a></li>
                        </ul>
                        <ul class="actions-right">
                            <li><input type="submit" class="button" value="Login"></li>
                        </ul>
                    </div> 
                    </form>


                </div>
            </section> 
        </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?= base_url(); ?>asset/template_admin/js/libs/jquery-1.6.2.min.js"><\/script>')</script>
        <script defer src="<?= base_url(); ?>asset/template_admin/js/plugins.js"></script> <!-- lightweight wrapper for consolelog, optional -->
        <script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery.notifications.js"></script> <!-- Notifications  -->
        <script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery.uniform.min.js"></script> <!-- Uniform (Look & Feel from forms) -->
        <script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery.validate.min.js"></script> <!-- Validation from forms -->
        <script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery.tipsy.js"></script> <!-- Tooltips -->
        <script defer src="<?= base_url(); ?>asset/template_admin/js/common.js"></script> <!-- Generic functions -->
        <script defer src="<?= base_url(); ?>asset/template_admin/js/script.js"></script> <!-- Generic scripts -->

        <script type="text/javascript">
            $().ready(function() {
                var validatelogin = $("#login-form").validate({
                    invalidHandler: function(form, validator) {
                        var errors = validator.numberOfInvalids();
                        if (errors) {
                            var message = errors == 1
                                    ? 'silakan isi username dan password anda'
                                    : 'silakan isi username dan password anda';
                            $('#login-form').removeAlertBoxes();
                            $('#login-form').alertBox(message, {type: 'error'});
                        } else {
                            $('#login-form').removeAlertBoxes();
                        }
                    }
                });

                jQuery("#reset-login").click(function() {
                    validatelogin.resetForm();
                });
            });
        </script>

        <script type="text/javascript">
            $().ready(function() {
                $('#login-form').alertBox("Periksa username dan password anda", {type: 'error'});
            });
        </script>
    </body>
</html>
