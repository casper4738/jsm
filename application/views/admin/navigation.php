<!-- Begin of Navigation -->
<nav id="nav">
    <ul class="menu collapsible shadow-bottom">
        <li><?=
            anchor("admin/dashboard", img("asset/template_admin/img/icons/packs/fugue/16x16/dashboard.png") .
                    "Dashboard<span class='badge'>2</span>")
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
        <li><?=
            anchor("admin/event", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                    "Event")
            ?>
        </li>
        <li><?=
            anchor("admin/tentang", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                    "Tentang JSM")
            ?>
        </li>
        <li class="sub">
            <?=
            anchor("", img("asset/template_admin/img/icons/packs/fugue/16x16/clipboard-list.png") .
                    "Jadwal Tugas Sel<span class='badge red'>5</span>");
            ?>
            <ul class="sub">
                <li><?=
                    anchor("admin/sel/A", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                            "Sel A")
                    ?>
                </li>
                <li><?=
                    anchor("admin/sel/B", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                            "Sel B")
                    ?>
                </li>
                <li><?=
                    anchor("admin/sel/C", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                            "Sel C")
                    ?>
                </li>
                <li><?=
                    anchor("admin/sel/D", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                            "Sel D")
                    ?>
                </li>
                <li><?=
                    anchor("admin/sel/E", img("asset/template_admin/img/icons/packs/fugue/16x16/table.png") .
                            "Sel E")
                    ?>
                </li>

            </ul>
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

    </ul>
</nav> <!--! end of #nav -->