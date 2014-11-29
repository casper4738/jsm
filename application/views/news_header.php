<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= "JSM | " . $title ?></title>
        <meta charset="utf-8">
        <?php
        $list = array(
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template1/css/reset.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template1/css/style.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template1/css/layout.css'),
            array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/template1/css/pagination.css')
        );

        foreach ($list as $value) {
            echo link_tag($value);
        }
        ?>
        <script src="<?= base_url(); ?>asset/template1/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>asset/template1/js/jquery.dropotron.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>asset/template1/js/skel.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>asset/template1/js/init.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>asset/template1/js/jquery-1.6.3.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>asset/template1/js/cufon-yui.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>asset/template1/js/cufon-replace.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>asset/template1/js/NewsGoth_400.font.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>asset/template1/js/NewsGoth_700.font.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>asset/template1/js/Vegur_300.font.js" type="text/javascript"></script> 
        <script src="<?= base_url(); ?>asset/template1/js/FF-cash.js" type="text/javascript"></script>
    </head>
    <body id="page5">
        <!--==============================header=================================-->
        <header>
            <div class="main">
                <div class="wrapper">
                    <h1>
                       <?= anchor("login", "Jeduthun Salvation Ministry") ?>
                        <strong>Jeduthun Salvation Ministry</strong>
                    </h1>
                    <nav id="nav">
                        <ul class="menu">
                            <li><?= anchor("beranda", "Beranda", array('title' => 'Beranda')) ?></li>
                            <li><a href="#" title = 'Jeduthun Salvatin Ministry'>JSM</a>
                                <ul>
                                    <li><a href="#">Koordinator Bidang</a>
                                        <ul>
                                            <?= "<li>".anchor("korbid/music", "Music", array('title' => 'Kordinator Bidang Music'))."</li>"?>
                                            <?= "<li>".anchor("korbid/choir", "Choir", array('title' => 'Kordinator Bidang Choir'))."</li>"?>
                                            <?= "<li>".anchor("korbid/multimedia", "Multimedia", array('title' => 'Kordinator Bidang Multimedia'))."</li>"?>
                                        </ul>
                                    </li>
                                    <li><a href="#">Jadwal & Tugas</a>
                                        <ul>
                                            <li><?= anchor("sel/pelayanan/", "Jadwal Pelayanan", array('title' => 'Jadwal Pelayanan')) ?></li>
                                            <li><?= anchor("sel/english_mass/", "Jadwal English Mass", array('title' => 'Jadwal English Mass')) ?></li>
                                            <li><?= anchor("sel/doa_malam/", "Jadwal Doa Malam", array('title' => 'Jadwal Doa Malam')) ?></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Domus Fidei / PD</a></li>
                                </ul>
                            </li>
                            <li><?= anchor("berita", "Berita & Events", array('title' => 'Berita & Events', 'class' => 'active')) ?></li>
                            <li><?= anchor("galeri", "Galeri", array('title' => 'Galeri')) ?></li>
                            <li><?= anchor("tentang", "Tentang JSM", array('title' => 'Tentang JSM')) ?></li>
                        </ul>
                    </nav>
                </div>
            </div><div class="ic">@Fandy Adam Design By TemplateMonster</div>
        </header>
        <!--==============================content================================-->