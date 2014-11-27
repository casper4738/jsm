<section id="content">
    <div class="main">
        <div class="indent-left">
            <div class="wrapper p4" id="page5">
                <article class="col-1">
                    <h3>Berita</h3>
                    <ul class="list-1">
                        <?php
                        for ($index = 0; $index < $list_berita->num_rows(); $index++) {
                            $row = $list_berita->result()[$index];
                            if ($index == $list_berita->num_rows() - 1) {
                                echo "<li class='last-item'>" . anchor("berita/detail/" . $row->id_berita, $row->judul_berita, array('title' => $row->judul_berita)) . "</li>";
                            } else {
                                echo "<li>" . anchor("berita/detail/" . $row->id_berita, $row->judul_berita, array('title' => $row->judul_berita)) . "</li>";
                            }
                        }
                        ?>
                    </ul>
                    <br>
                    <h3>Event</h3>
                    <ul class="list-1">
                        <?php
                        echo "<li>" . anchor("event/all/", "<strong>JADWAL SEMUA EVENT</strong>", array('class' => 'link-1')) . "</li>";
                        for ($index = 0; $index < $list_event->num_rows(); $index++) {
                            $row = $list_event->result()[$index];
                            if ($index == $list_event->num_rows() - 1) {
                                echo "<li class='last-item'>" . anchor("event/detail/" . $row->id_event, $row->judul_event, array('class' => 'link-1')) . "</li>";
                            } else {
                                echo "<li>" . anchor("event/detail/" . $row->id_event, $row->judul_event, array('class' => 'link-1')) . "</li>";
                            }
                        }
                        ?>
                    </ul>
                </article>
                <article class="col-2">
                    <h3><?= $berita->judul_berita; ?></h3>
                    <span style="color: #6b6b6b"><?= img("asset/template_admin/img/icons/packs/fugue/16x16/user.png") ?> Diposting oleh <strong>Administrator</strong> 
                        | <?= img("asset/template_admin/img/icons/packs/fugue/16x16/calendar.png") ?> Tanggal post <strong> <?= date("d M Y    h:i:s", strtotime($berita->tanggal_post)) ?></strong>
                    </span>
                    <br><br>
                    <?= $berita->isi_berita; ?>
                    <br/><br/><br/>

                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id))
                                return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>

                    <?php 
//                    $link = base_url() . "berita/detail/" . $berita->id_berita;
                    $link = "https://jsm2014.monsters-sam.com/berita/detail/" . $berita->id_berita;
                    ?>
                    <div class="fb-comments" width="100%" data-href="<?= $link ?>" 
                         data-numposts="5" data-colorscheme="light"></div>
                </article>
            </div>
        </div>
    </div>
</section>