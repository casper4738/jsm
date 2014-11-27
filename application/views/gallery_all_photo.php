<section id="content">
    <div class="main">

        <div class="indent-left">

            <?php
            $limit = 9;
            $num_paging = ceil($num_rows / $limit);
            ?>
            <div class="wrapper">
                <center>
                    <ul>
                        <li><span class="dropcap_1">></span></li>
                        <?php
                        for ($i = $num_paging; $i >= 1; $i--) {
                            echo anchor("galeri/hal/$album/" . $i, "<li><span class='dropcap_1'>$i</span></li>");
                        }
                        ?>
                        <li><span class="dropcap_1"><</span></li>
                    </ul>
                </center>
            </div>
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
                                        'src' => "asset/galeri/$row->id_foto.jpg",
                                        'width' => '290',
                                        'height' => '121',
                                        'title' => "Judul Foto : $row->judul_foto \n "
                                        . "Tanggal Foto : $row->tanggal_foto \n "
                                        . "Tanggal Upload : $row->tanggal_post \n "
                                        . "By $row->id_foto",
                                    );
                                    echo img($image_properties);
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
                                        'src' => "asset/galeri/$row->id_foto.jpg",
                                        'width' => '290',
                                        'height' => '121',
                                        'title' => "Judul Foto : $row->judul_foto \n "
                                        . "Tanggal Foto : $row->tanggal_foto \n "
                                        . "Tanggal Upload : $row->tanggal_post \n "
                                        . "By $row->id_foto",
                                    );
                                    echo img($image_properties);
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
        </div>
    </div>
</section>