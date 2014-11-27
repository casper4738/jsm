<section id="content">
    <div class="main">
        <div class="slider-wrapper">
            <div class="slider">
                <ul class="items">
                    <li>
                        <?= img('asset/template1/images/slider-img1.jpg', TRUE); ?>
                        <strong class="banner">
                            <a class="close" href="#">x</a>
                            <strong>Progress</strong>
                            <span>Business Company</span>
                            <b class="margin-bot">Lorem ipsum dolor sit amet, consectetur adipisicing elitsedo eiusmod tempor incididunt ut labore dolore magna aliqua enim ad minim veniam.</b>
                            <a class="button2" href="#">Read More</a>
                        </strong>
                    </li>
                    <li>
                        <?= img('asset/template1/images/slider-img2.jpg', TRUE); ?>
                        <strong class="banner">
                            <a class="close" href="#">x</a>
                            <strong>SpaSalon</strong>
                            <span>popular Procedures</span>
                            <b class="margin-bot">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit<br> in voluptate velit.</b>
                            <a class="button2" href="#">Read More</a>
                        </strong>
                    </li>
                    <li>
                        <?= img('asset/template1/images/slider-img3.jpg', TRUE); ?>
                        <strong class="banner">
                            <a class="close" href="#">x</a>
                            <strong>GoodCook</strong>
                            <span>Online cooking recipes</span>
                            <b class="margin-bot">Esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia <br>deserunt mollit anim.</b>
                            <a class="button2" href="#">Read More</a>
                        </strong>
                    </li>
                    <li>
                        <?= img('asset/template1/images/slider-img4.jpg', TRUE); ?>
                        <strong class="banner">
                            <a class="close" href="#">x</a>
                            <strong>HandyMan</strong>
                            <span>Home Services</span>
                            <b class="margin-bot">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.</b>
                            <a class="button2" href="#">Read More</a>
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
                            <a class="item" href="#">Berita & Event</a>
                            <span>Business.Co is one of <a href="http://blog.templatemonster.com/free-website-templates/" target="_blank">free web templates</a> created by TemplateMonster.com team. </span>
                        </li>
                        <li>
                            <a class="item" href="#">Domus Fidei</a>
                            <span>This template is optimized for 1280X1024 screen resolution.</span>
                        </li>
                        <li class="last-item">
                            <a class="item" href="#">Why Join With Us?</a>
                            <span>It is also XHTML &amp; CSS valid. Quis nostrud exercitation ullamco laboris nisi ut.</span>
                        </li>
                    </ul>
                </div>
            </article>
        </div>
    </div>
</section>