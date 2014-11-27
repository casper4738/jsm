<section id="content">
    <div class="main">
        <div class="indent-left">
            <h2><?= $row->judul_foto ?></h2>
            <?php
            $image_properties = array(
                'src' => "./asset/eltre/elfinder/files/images/$row->id_galeri$row->file_ext",
                'title' => "Judul Foto : $row->judul_foto \n "
                . "Tanggal Foto : $row->tanggal_foto \n "
                . "Tanggal Upload : $row->tanggal_post \n "
                . "By Administrator",
            );
            echo "<center>" . img($image_properties) . "</center>";
            ?>
            <br/>
            <?= $row->keterangan ?>
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

            <center>
                <?php
                $link = "https://jsm2014.monsters-sam.com/galeri/detail/" . $row->id_galeri;
                ?>
                <div class="fb-comments" width="700" data-href="<?= $link ?>" 
                     data-numposts="5" data-colorscheme="light"></div>
            </center>
        </div>
    </div>
</section>