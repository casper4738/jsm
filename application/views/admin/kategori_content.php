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
                <h1>Kategori</h1>
                <p>Berisi kategori / jenis  dari berita / artikel</p>
            </div>


            <div class="grid_6">
                <ul class="shortcut-list" style="float: right">
                    <li>
                        <?=
                        anchor("kategori/add", img("asset/template_admin/img/icons/packs/crystal/48x48/apps/kate.png", TRUE) . " Tambah Data "
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
                                    <th>Nama Kategori</th>
                                    <th width="70"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                foreach ($list->result() as $row) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center"><?= $index ?></td>
                                        <td><?= $row->nama_kategori ?></td>
                                        <td><?= anchor("kategori/edit/$row->id_kategori", "EDIT") ?> | 
                                            <?= anchor("kategori/delete/$row->id_kategori", "HAPUS") ?>
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