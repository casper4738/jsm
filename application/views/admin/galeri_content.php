<div id="main" role="main">
    <div id="title-bar">
        <ul id="breadcrumbs">
            <li><a href="dashboard.html" title="Home"><span id="bc-home"></span></a></li>
            <li class="no-hover">Data</li>
        </ul>
    </div> 
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id="main-content">
        <div class="container_12">

            <div class="grid_6">
                <h1>Galeri</h1>
                <p>Berisi foto, dokumentasi JSM</p>
            </div>


            <div class="grid_6">
                <ul class="shortcut-list" style="float: right">
                    <li>
                        <?=
                        anchor("galeri/add", img("asset/template_admin/img/icons/packs/crystal/48x48/apps/kate.png", TRUE) . " Tambah Data "
                        )
                        ?>
                    </li>
                </ul>
            </div>

            <div class="grid_12">
                <div class="block-border">
                    <div class="block-header">
                        <h1>Data</h1><span></span>
                    </div>
                    <div class="block-content">
                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    <th width="50">NO</th>
                                    <th>JUDUL FOTO</th>
                                    <th>KETERANGAN</th>
                                    <th>TANGGAL FOTO</th>
                                    <th width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                foreach ($list->result() as $row) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $index ?></td>
                                        <td><?= $row->judul_foto ?></td>
                                        <td><?= $row->keterangan ?></td>
                                        <td><?= $row->tanggal_foto ?></td>
                                        <td style="text-align: center"><?= anchor_popup("galeri/foto/$row->id_galeri", "LIHAT FOTO") ?> | 
                                            <?= anchor("galeri/edit/$row->id_galeri", "EDIT") ?> | 
                                            <?= anchor("galeri/delete/$row->id_galeri", "HAPUS") ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $index++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="clear height-fix"></div>
        </div>
    </div> 
</div> 