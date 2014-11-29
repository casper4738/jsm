<section id="content">
    <div class="main">
        <div class="indent-left">
            <center>
                <div id="pagination">
                    <?php
                    echo $this->pagination->create_links();
                    ?>
                </div>
            </center>
            <br>
            <br>

            <h3>Gallery</h3>
            <?php
            $index = 1;
            foreach ($list->result() as $row) {
                if ($index == 3 || $index == 6 || $index == 9) {
                    ?>
                    <article class="col-2">
                        <div class="prev-indent-bot">
                            <figure class="img-border">
                                <a href="#">
                                    <?php
                                    $image_properties = array(
                                        'src' => "./asset/eltre/elfinder/files/images/$row->id_galeri$row->file_ext",
                                        'width' => '290',
                                        'height' => '121',
                                        'title' => "Judul Foto : $row->judul_foto \n "
                                        . "Tanggal Foto : $row->tanggal_foto \n "
                                        . "Tanggal Upload : $row->tanggal_post \n "
                                        . "By Administrator",
                                    );
                                    echo anchor("galeri/detail/$row->id_galeri", img($image_properties));
                                    ?>
                                </a>
                            </figure>
                            <div class="clear"></div>
                        </div>
                        <h6><center><?= $row->judul_foto . " | " . $row->tanggal_foto ?></center></h6>
                    </article>
                    <?php
                } else {
                    ?>
                    <article class="col-1">
                        <div class="prev-indent-bot">
                            <figure class="img-border">
                                <a href="#">
                                    <?php
                                    $image_properties = array(
                                        'src' => "./asset/eltre/elfinder/files/images/$row->id_galeri$row->file_ext",
                                        'width' => '290',
                                        'height' => '121',
                                        'title' => "Judul Foto : $row->judul_foto \n "
                                        . "Tanggal Foto : $row->tanggal_foto \n "
                                        . "Tanggal Upload : $row->tanggal_post \n "
                                        . "By Administrator",
                                    );
                                     echo anchor("galeri/detail/$row->id_galeri", img($image_properties));
                                    ?></a>
                            </figure>
                            <div class="clear"></div>
                        </div>
                        <h6><center><?= $row->judul_foto . " | " . $row->tanggal_foto ?></center></h6>
                    </article>
                    <?php
                }
                $index++;
            }
            ?>
            <div class="wrapper margin-bot">
                <?php
                for ($i = 0; $i < 2; $i++) {
                    ?>
                <?php } ?>

            </div>
            <br>
            <br>
            <center>
                <div id="pagination">
                    <?php
                    echo $this->pagination->create_links();
                    ?>
                </div>
            </center>
        </div>
    </div>
</section>