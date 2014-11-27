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
                <h1>Event</h1>
                <p>Berisi info event</p>
            </div>


            <div class="grid_6">
                <ul class="shortcut-list" style="float: right">
                    <li>
                        <?=
                        anchor("event/add", img("asset/template_admin/img/icons/packs/crystal/48x48/apps/kate.png", TRUE) . " Tambah Data "
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
                                    <th width="200">Nama Event</th>
                                    <th>Info Event</th>
                                    <th width="100">Tanggal Event</th>
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
                                        <td><?= $row->judul_event ?></td>
                                        <td><?= $row->isi_event ?></td>
                                        <td><?= $row->tanggal_event ?></td>
                                        <td><?= anchor("event/edit/$row->id_event", "EDIT") ?> | 
                                            <?= anchor("event/delete/$row->id_event", "HAPUS") ?>
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