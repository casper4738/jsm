<!--==============================footer=================================-->
<footer>
    <div class="main">
        <div class="wrapper border-bot2 margin-bot">
            <article class="fcol-1">
                <div class="indent-left">
                    <h3 class="color-1">Fan Page / Group</h3>
                    <ul class="list-services">
                        <li><?= anchor("https://www.facebook.com/groups/68079572107/", "Facebook"); ?></li>
                        <li><?= anchor("https://twitter.com/JsmChoir", "Twitter", array('class' => "it-2")); ?></li>
                        <li><?= anchor("#", "BBM", array('class' => "it-3")); ?></li>
                        <li><?= anchor("#", "Whats App", array('class' => "it-4")); ?></li>
                    </ul>
                </div>
            </article>
            <article class="fcol-2">
                <h4 class="color-1">Tentang Jeduthun Salvation Ministry</h4>
                    <?php
                    $image_properties = array(
                        'src' => "asset/template1/images/icon2.png",
                        'width' => '20',
                    );
                    ?>
                <p  style="color: #ffffff">
                    Invite Pin BB <?=img($image_properties);?> |
                    komunitas pujian penyembahan khatolik makassar yang 
                    mengambil komitmen untuk menumbuhkan hidup kerohaniannya melalui pujian dan 
                    penyembahan didalam Roh dan kebenaran (bdk Yoh 4:23) 
                    kepada Tuhan serta Perayaan Ekaristi (Kis 2:41-47) agar dapat menghasilkan 
                    buah Roh (bdk Gal 5:22-23) yang pada akhirnya mampu melaksanakan Amanat Agung 
                    Tuhan (bdk Mat 28:19-20, Kis 1:8).</p>
            </article>
            <article class="fcol-3">
                <h3 class="color-1">Link</h3>
                <ul class="list-3">
                    <li><?= anchor("http://dailyfreshjuice.net/", "Fresh Juice <span>  - menyejukkan & menyegarkan</span>") ?></li>
                    <li><?= anchor("http://priakatolik.com/", "Pria Katolik <span>  - Komunitas online Pria Katolik</span>") ?></li>
                </ul>
            </article>
        </div>
        <div class="aligncenter">
            <span style="color: #ffffff">Jeduthun Salvation Ministry Studio </span> &copy; 2014 by TemplateMonster
        </div>
    </div>
</footer>
<script type="text/javascript"> Cufon.now();</script>
<script type="text/javascript">
    $(window).load(function() {
        $('.slider')._TMS({
            duration: 800,
            easing: 'easeOutQuart',
            preset: 'diagonalExpand',
            slideshow: 7000,
            pagNums: false,
            pagination: '.pagination',
            banners: 'fade',
            pauseOnHover: true,
            waitBannerAnimation: true
        });
    });
</script>
</body>
</html>