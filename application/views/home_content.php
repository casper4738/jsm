<section id="content">
    <div class="main">
        <div class="slider-wrapper">
            <div class="slider">
                <ul class="items">
                    <li>
                        <?php
                        $image_properties1 = array(
                            'src' => "./uploads/$slider1->id_slider$slider1->file_ext",
                        );
                        echo img($image_properties1);
                        ?>
                        <strong class="banner">
                            <a class="close" href="#">x</a>
                            <strong>JSM</strong>
                            <span>Jeduthun Salvation Ministry</span>
                            <b class="margin-bot">komunitas pujian penyembahan khatolik makassar yang 
                                mengambil komitmen untuk menumbuhkan hidup kerohaniannya melalui pujian dan 
                                penyembahan didalam Roh dan kebenaran</b>
                        </strong>
                    </li>
                    <li>
                        <?php
                        $image_properties2 = array(
                            'src' => "./uploads/$slider2->id_slider$slider2->file_ext",
                        );
                        echo img($image_properties2, TRUE);
                        ?>
                        <strong class="banner">
                            <a class="close" href="#">x</a>
                            <strong>JSM</strong>
                            <span>Jeduthun Salvation Ministry</span>
                            <b class="margin-bot">komunitas pujian penyembahan khatolik makassar yang 
                                mengambil komitmen untuk menumbuhkan hidup kerohaniannya melalui pujian dan 
                                penyembahan didalam Roh dan kebenaran</b>
                        </strong>
                    </li>
                    <li>
                        <?php
                        $image_properties3 = array(
                            'src' => "./uploads/$slider3->id_slider$slider3->file_ext",
                        );
                        echo img($image_properties3, TRUE);
                        ?>
                        <strong class="banner">
                            <a class="close" href="#">x</a>
                           <strong>JSM</strong>
                            <span>Jeduthun Salvation Ministry</span>
                            <b class="margin-bot">komunitas pujian penyembahan khatolik makassar yang 
                                mengambil komitmen untuk menumbuhkan hidup kerohaniannya melalui pujian dan 
                                penyembahan didalam Roh dan kebenaran</b>
                        </strong>
                    </li>
                    <li>
                        <?php
                        $image_properties4 = array(
                            'src' => "./uploads/$slider4->id_slider$slider4->file_ext",
                        );
                        echo img($image_properties4, TRUE);
                        ?>
                        <strong class="banner">
                            <a class="close" href="#">x</a>
                            <strong>JSM</strong>
                            <span>Jeduthun Salvation Ministry</span>
                            <b class="margin-bot">komunitas pujian penyembahan khatolik makassar yang 
                                mengambil komitmen untuk menumbuhkan hidup kerohaniannya melalui pujian dan 
                                penyembahan didalam Roh dan kebenaran</b>
                        </strong>
                    </li>
                </ul>
            </div>
            <ul class="pagination">
                <li><a class="item-1" href=""><strong>01</strong></a></li>
                <li><a class="item-2" href=""><strong>02</strong></a></li>
                <li><a class="item-3" href=""><strong>03</strong></a></li>
                <li><a class="item-4" href=""><strong>04</strong></a></li>
            </ul>
        </div>
        <div class="border-bot1 img-indent-bot">
            <h2>Pujian dan penyembahan dalam Roh dan kebenaran 
                <strong> agar dapat menghasilkan buah Roh</strong></h2>
        </div>
        <div class="wrapper">
            <article class="col-1">
                <div class="indent-left">
                    <ul class="list-1">
                        <?php
                        for ($index = 0; $index < $list->num_rows(); $index++) {
                            $row = $list->result()[$index];
                            if ($index == $list->num_rows() - 1) {
                                echo "<li class='last-item'>" . anchor("berita/detail/" . $row->id_berita, $row->judul_berita, array('title' => $row->judul_berita)) . "</li>";
                            } else {
                                echo "<li>" . anchor("berita/detail/" . $row->id_berita, $row->judul_berita, array('title' => $row->judul_berita)) . "</li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </article>
            <article class="col-2">
                <h3>Selamat Datang!</h3>
                <div class="p1">
                    <figure class="img-border">
                        <?= img('asset/template1/images/page1-img1.jpg', TRUE); ?>
                    </figure>
                    <div class="clear"></div>
                </div>
                <p class="img-indent-bot">
                    komunitas pujian penyembahan khatolik makassar yang 
                    mengambil komitmen untuk menumbuhkan hidup kerohaniannya melalui pujian dan 
                    penyembahan didalam Roh dan kebenaran (bdk Yoh 4:23) 
                    kepada Tuhan serta Perayaan Ekaristi (Kis 2:41-47) agar dapat menghasilkan 
                    buah Roh (bdk Gal 5:22-23) yang pada akhirnya mampu melaksanakan Amanat Agung 
                    Tuhan (bdk Mat 28:19-20, Kis 1:8)

                </p>
                <?= anchor("tentang", "Selengkapnya", array('class' => 'button')); ?>

            </article>
            <article class="col-3">
                <div class="indent-top">
                    <ul class="list-2">
                        <li>
                            <?= anchor("berita", "Berita & Event", array('class' => 'item')); ?>  
                            <span>Berisi kumpulan artikel, info terkini, kegiatan yang dilakukan dan lain sebagainya</span>
                        </li>
                        <li>
                            <a class="item" href="#">Domus Fidei</a>
                            <span>komunitas pujian penyembahan khatolik makassar yang mengambil komitmen untuk menumbuhkan hidup kerohaniannya</span>
                        </li>
                        <li class="last-item">
                            <?= anchor("event/all", "Jadwal Event", array('class' => 'item')); ?>  
                            <span>Jadwal dan Info Event</span>
                        </li>
                    </ul>
                </div>
            </article>
        </div>
    </div>
</section>