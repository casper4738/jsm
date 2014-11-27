<section id="content">
    <div class="main">
        <div class="indent-left">
            <?php
            $list = array(
                array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => 'asset/photo_album/css/style.css'),
            );

            foreach ($list as $value) {
                echo link_tag($value);
            }
            ?>
            <script src="<?= base_url(); ?>asset/photo_album/js/jquery.galleriffic.js" type="text/javascript"></script>

            <!--==============================content================================-->
            <div id="js">
                <h2 class="indent-bot2">Photo Album 
                </h2>
                <div class="wrapper p4">
                    <div class="slideshow-container">
                        <div id="slideshow" class="slideshow"></div>
                    </div>
                    <div id="caption" class="caption-container"></div>
                </div>
                <div id="thumbs" class="navigation">
                    <ul class="thumbs noscript">
                        <?php
                        for ($index = 0; $index < $list_album->num_rows(); $index++) {
                            $row = $list_album->result()[$index];
                            ?>
                            <li>
                                <a class="thumb" href="<?= base_url() ?>asset/photo_album/images/gallery-img<?= $row->id_album ?>.jpg">
                                    <?= img("asset/photo_album/images/thumb-$row->id_album.jpg", TRUE); ?>
                                </a>
                                <div class="caption">
                                    <h3><?= $row->id_album . ". " . $row->judul_album ?></h3>
                                    <div class="border-bot p1">
                                        <p class="indent-bot"><em class="color-2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</em></p>
                                        <?= anchor("galeri/hal/" . $row->id_album . "/1", "Tampilkan Foto Album Ini", 'class="link-1"'); ?>
                                    </div>
                                    <?php
                                    $list_foto = $this->galeri_model->get_galeri($row->id_album, 0);
                                    $count1 = $list_foto->num_rows()-1;
                                    $count2 = $list_foto->num_rows()-1;
                                    if($count1 < 0) {
                                        $count2 = 0;
                                    } else {
                                        $count2 = $count1 - 3;
                                    }
                                    for ($k = $count1; $k > $count2; $k--) {
                                        $rows = $list_foto->result()[$k];
                                        ?>
                                        <div class="wrapper p2">
                                            <figure class="img-indent img-border1">
                                                <a href="#"> 
                                                <?php
                                                $image_properties = array(
                                                    'src' => "asset/galeri/$rows->id_foto.jpg",
                                                    'width' => '132',
                                                    'title' => "Judul Foto : $rows->judul_foto \n "
                                                    . "Tanggal Foto : $rows->tanggal_foto \n "
                                                    . "Tanggal Upload : $rows->tanggal_post \n "
                                                    . "By $rows->id_foto",
                                                );
                                                echo img($image_properties);
                                                ?>
                                                </a></figure>
                                            <div class="extra-wrap">
                                                <h6><?=$rows->judul_foto?></h6>
                                                <time class="tdate-1" datetime="2011-10-21">
                                                <a class="link" href="#">21.10.2011</a></time>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?= anchor("galeri/hal/" . $row->id_album . "/1", "Tampilkan Foto Album Ini", 'class="link-1"'); ?>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div id="controls"></div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(window).load(function() {
        var gallery = $('#thumbs').galleriffic({
            delay: 7000,
            numThumbs: 6,
            preloadAhead: 6,
            enableTopPager: false,
            enableBottomPager: false,
            imageContainerSel: '#slideshow',
            controlsContainerSel: '#controls',
            captionContainerSel: '#caption',
            loadingContainerSel: '',
            renderSSControls: false,
            renderNavControls: true,
            playLinkText: '',
            pauseLinkText: '',
            prevLinkText: 'Prev',
            nextLinkText: 'Next',
            nextPageLinkText: '',
            prevPageLinkText: '',
            enableHistory: false,
            autoStart: 7000,
            syncTransitions: true,
            defaultTransitionDuration: 900
        });
    });
</script>