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
    <body id="top">
        <div id="container">
            <div id="header-surround"><header id="header">
                    <img src="img/logo.png" alt="Grape" class="logo">

                    <div class="divider-header divider-vertical"></div>

                    <a href="javascript:void(0);" onclick="$('#info-dialog').dialog({modal: true});"><span class="btn-info"></span></a>

                    <!-- Modal Box Content -->
                    <div id="info-dialog" title="About" style="display: none;">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div> <!--! end of #info-dialog -->

                    <!-- Begin from Toolbox -->
                    <ul class="toolbox-header">
                        <!-- First entry -->
                        <li>
                            <a rel="tooltip" title="Create a User" class="toolbox-action" href="javascript:void(0);"><span class="i-24-user-business"></span></a>
                            <div class="toolbox-content">

                                <!-- Box -->
                                <div class="block-border">
                                    <div class="block-header small">
                                        <h1>Create a User</h1>
                                    </div>
                                    <form id="create-user-form" class="block-content form" action="" method="post">
                                        <div class="_100">
                                            <p><label for="username">Username</label><input id="username" name="username" class="required" type="text" value="" /></p>
                                        </div>
                                        <div class="_50">
                                            <p class="no-top-margin"><label for="firstname">Firstname</label><input id="firstname" name="firstname" class="required" type="text" value="" /></p>
                                        </div>
                                        <div class="_50">
                                            <p class="no-top-margin"><label for="lastname">Lastname</label><input id="lastname" name="lastname" class="required" type="text" value="" /></p>
                                        </div>
                                        <div class="clear"></div>

                                        <!-- Buttons with actionbar  -->
                                        <div class="block-actions">
                                            <ul class="actions-left">
                                                <li><a class="close-toolbox button red" id="reset" href="javascript:void(0);">Cancel</a></li>
                                            </ul>
                                            <ul class="actions-right">
                                                <li><input type="submit" class="button" value="Create the User"></li>
                                            </ul>
                                        </div> <!--! end of #block-actions -->
                                    </form>
                                </div> <!--! end of box -->

                            </div>
                        </li> <!--! end of first entry -->

                        <!-- Second entry -->
                        <li>
                            <a rel="tooltip" title="Write a Message" class="toolbox-action" href="javascript:void(0);"><span class="i-24-inbox-document"></span></a>
                            <div class="toolbox-content">

                                <!-- Box -->
                                <div class="block-border">
                                    <div class="block-header small">
                                        <h1>Write a Message</h1>
                                    </div>
                                    <form id="write-message-form" class="block-content form" action="" method="post">							
                                        <p class="inline-mini-label">
                                            <label for="recipient">Recipient</label>
                                            <input type="text" name="recipient" class="required">
                                        </p>
                                        <p class="inline-mini-label">
                                            <label for="subject">Subject</label>
                                            <input type="text" name="subject">
                                        </p>
                                        <div class="_100">
                                            <p class="no-top-margin"><label for="message">Message</label><textarea id="message" name="message" class="required" rows="5" cols="40"></textarea></p>
                                        </div>

                                        <div class="clear"></div>

                                        <!-- Buttons with actionbar  -->
                                        <div class="block-actions">
                                            <ul class="actions-left">
                                                <li><a class="close-toolbox button red" id="reset2" href="javascript:void(0);">Cancel</a></li>
                                            </ul>
                                            <ul class="actions-right">
                                                <li><input type="submit" class="button" value="Send Message"></li>
                                            </ul>
                                        </div> <!--! end of #block-actions -->
                                    </form>
                                </div> <!--! end of box -->

                            </div>
                        </li> <!--! end of second entry -->

                        <!-- Third entry -->
                        <li>
                            <a rel="tooltip" title="Create a Folder" class="toolbox-action" href="javascript:void(0);"><span class="i-24-folder-horizontal-open"></span></a>
                            <div class="toolbox-content">

                                <!-- Box -->
                                <div class="block-border">
                                    <div class="block-header small">
                                        <h1>Create a Folder</h1>
                                    </div>
                                    <form id="create-folder-form" class="block-content form" action="" method="post">
                                        <p class="inline-mini-label">
                                            <label for="folder-name">Name</label>
                                            <input type="text" name="folder-name" class="required">
                                        </p>

                                        <!-- Buttons with actionbar  -->
                                        <div class="block-actions">
                                            <ul class="actions-left">
                                                <li><a class="close-toolbox button red" id="reset3" href="javascript:void(0);">Cancel</a></li>
                                            </ul>
                                            <ul class="actions-right">
                                                <li><input type="submit" class="button" value="Create Folder"></li>
                                            </ul>
                                        </div> <!--! end of #block-actions -->
                                    </form>
                                </div> <!--! end of box -->

                            </div>
                        </li> <!--! end of third entry -->
                    </ul>

                    <!-- Begin of #user-info -->
                    <div id="user-info">
                        <p>
                            <span class="messages">Hello <a href="javascript:void(0);">Administrator</a> ( <a href="javascript:void(0);"><img src="img/icons/packs/fugue/16x16/mail.png" alt="Messages"> 3 new messages</a> )</span>
                            <a href="javascript:void(0)" class="toolbox-action button">Settings</a> <a href="javascript:void(0);" class="button red">Logout</a>
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
                    <img class="img-left framed" src="img/misc/avatar_small.png" alt="Hello Admin">
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
