<section id="content">
    <div class="main">
        <div class="indent-left">
            <div class="wrapper p4">
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
                    <?php
                    foreach ($list as $row) {
                        $img1 = img("asset/template_admin/img/icons/packs/fugue/16x16/user.png") . " Diposting oleh <strong>Administrator</strong>";
                        $img2 = img("asset/template_admin/img/icons/packs/fugue/16x16/calendar.png") . " Tanggal post <strong>" . date("d M Y    h:i:s", strtotime($row->tanggal)) . " </strong>";
                        $img3 = img("asset/template_admin/img/icons/packs/fugue/16x16/category.png") . "  Kategori <strong>" . $row->kategori . "</strong>";
                        echo "<h3>$row->judul</h3>";
                        echo "<span style='color: #6b6b6b'>$img1 | $img2 | $img3</span>";
                        echo "<br/><br/>";
                        echo $this->storage->function_more($row->isi);
                        echo "<br/>";
                        echo anchor("$row->jenis/detail/$row->id", "Selengkapnya", array('class' => 'button fright'));
                        echo "<br/><br/><br/>";
                    }
                    ?>

                    <center>
                        <div id="pagination">
                            <?php
                            echo $this->pagination->create_links();
                            ?>
                        </div>
                    </center>
                    <br>
                    <br>
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
                    $link = "https://jsm2014.monsters-sam.com/berita/";
                    ?>
                    <div class="fb-comments" width="100%" data-href="<?= $link ?>" 
                         data-numposts="5" data-colorscheme="light"></div>

                    <br>
                    <br>


                </article>
            </div>

        </div>
    </div>
</section>