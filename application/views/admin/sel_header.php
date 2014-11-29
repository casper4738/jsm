<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= "Admin | " . $title ?></title>
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
//            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template_admin/css/forms.css'),
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
    <body id="top">
        <div id="container">
            <div id="header-surround"><header id="header">

                    <div class="divider-header divider-vertical"></div>

                    <!-- Begin from Toolbox -->
                    <ul class="toolbox-header">
                        
                    </ul>

                    <!-- Begin of #user-info -->
                    <div id="user-info">
                        <p>
                            <span class="messages">Selamat Datang <a href="javascript:void(0);">Administrator</a>
                            <a href="javascript:void(0);" class="button red">Logout</a>
                        </p>
                    </div> <!--! end of #user-info -->

                </header></div> <!--! end of #header -->

            <div class="fix-shadow-bottom-height"></div>

            <!-- Begin of Sidebar -->
            <aside id="sidebar">

                <!-- Search -->
                <div id="search-bar">
                    <form id="search-form" name="search-form" action="search.php" method="post">
                        <input type="text" id="query" name="query" value="" autocomplete="off" placeholder="Search">
                    </form>
                </div> <!--! end of #search-bar -->

                <!-- Begin of #login-details -->
                <section id="login-details">
                    <img class="img-left framed" src="<?=  base_url()?>asset/template_admin/img/misc/avatar_small.png" alt="Hello Admin">
                    <h3>Logged in as</h3>
                    <h2><a class="user-button" href="javascript:void(0);">Administrator&nbsp;<span class="arrow-link-down"></span></a></h2>
                    <ul class="dropdown-username-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Messages</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>

                    <div class="clearfix"></div>
                </section> <!--! end of #login-details -->

                <?php
                require_once 'navigation.php';
                ?>

            </aside> <!--! end of #sidebar -->
