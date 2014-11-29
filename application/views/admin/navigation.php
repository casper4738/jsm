<!-- Begin of Navigation -->
<nav id="nav">
    <ul class="menu collapsible shadow-bottom">
        <li><?=
            anchor("admin/slider", img("asset/template_admin/img/icons/packs/fugue/16x16/dashboard.png") .
                    "Slider Beranda<span class='badge'>4</span>")
            ?>
        </li>
        <li><?=
            anchor("admin/tentang", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                    "Tentang JSM")
            ?>
        </li>
        <li><?=
            anchor("admin/galeri", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                    "Galeri")
            ?>
        </li>
        <li>
            <?=
            anchor("", img("asset/template_admin/img/icons/packs/fugue/16x16/clipboard-list.png") .
                    "Kordinator Bidang<span class='badge red'>3</span>");
            ?>
            <ul class="sub">
                <li><?=
                    anchor("admin/korbid/music", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                            "Music")
                    ?>
                </li>
                <li><?=
                    anchor("admin/korbid/choir", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                            "Choir")
                    ?>
                </li>
                <li><?=
                    anchor("admin/korbid/multimedia", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                            "Multimedia")
                    ?>
                </li>

            </ul>
        </li>
        <li>
            <?=
            anchor("admin/pelayanan", img("asset/template_admin/img/icons/packs/fugue/16x16/clipboard-list.png") .
                    "Jadwal Pelayanan<span class='badge red'>3</span>");
            ?>
        </li>
        <li><?=
            anchor("admin/event", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                    "Event")
            ?>
        </li>
        <li>
            <?=
            anchor("", img("asset/template_admin/img/icons/packs/fugue/16x16/clipboard-list.png") .
                    "Berita<span class='badge red'>2</span>");
            ?>
            <ul class="sub">
                <li><?=
                    anchor("admin/berita", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                            "Berita")
                    ?>
                </li>
                <li><?=
                    anchor("admin/kategori", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                            "Kategori")
                    ?>
                </li>

            </ul>
        </li>

    </ul>
</nav> <!--! end of #nav -->