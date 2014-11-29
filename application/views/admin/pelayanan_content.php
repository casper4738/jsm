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
            <form>
                <div class="grid_6">
                    <div class="block-border">
                        <div class="block-content">
                            <div class="_50">
                                <p class="inline-small-label">
                                    <span class="label">DARI : </span>
                                    <?php
                                    $js = 'onchange="this.form.submit()"';
                                    $options = array();
                                    for ($index = 1; $index <= 12; $index++) {
                                        $options[$index] = $this->storage->get_bulan($index);
                                    }
                                    echo form_dropdown("bulan1", $options, $bulan1, $js);
                                    ?>
                                    <?php
                                    $options = array();
                                    for ($index = date("Y") - 3; $index <= date("Y") + 3; $index++) {
                                        $options[$index] = $index;
                                    }
                                    echo form_dropdown("tahun1", $options, $tahun1, $js);
                                    ?>
                                </p>
                            </div>

                            <div class="_50">
                                <p class="inline-small-label">
                                    <span class="label">SAMPAI : </span>
                                    <?php
                                    $js = 'onchange="this.form.submit()"';
                                    $options = array();
                                    for ($index = 1; $index <= 12; $index++) {
                                        $options[$index] = $this->storage->get_bulan($index);
                                    }
                                    echo form_dropdown("bulan2", $options, $bulan2, $js);
                                    ?>
                                    <?php
                                    $options = array();
                                    for ($index = date("Y") - 3; $index <= date("Y") + 3; $index++) {
                                        $options[$index] = $index;
                                    }
                                    echo form_dropdown("tahun2", $options, $tahun2, $js);
                                    ?>
                                </p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <noscript><input type="submit" value="Submit"></noscript>
            </form>
            <div class="grid_6">
                <div class="block-border">
                    <div class="block-content">
                        <ul class="shortcut-list">
                            <li><?=
                                anchor("sel/add_pelayanan", img(base_url() . "asset/template_admin/img/icons/packs/crystal/48x48/apps/kedit.png") .
                                        "PELAYANAN");
                                ?>
                            </li>
                            <li><?=
                                anchor("sel/add_english_mass", img(base_url() . "asset/template_admin/img/icons/packs/crystal/48x48/apps/kedit.png") .
                                        "ENGLISH MASS");
                                ?>
                            </li>
                            <li><?=
                                anchor("sel/add_doa_malam", img(base_url() . "asset/template_admin/img/icons/packs/crystal/48x48/apps/kedit.png") .
                                        "DOA MALAM");
                                ?>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <?php
            function function1($array) {
                $stringx = "";
                for ($i = 0; $i < $array->num_rows(); $i++) {
                    $row = $array->result()[$i];
                    $stringx = $stringx . trim($row->nama_sel);
                    if ($i < $array->num_rows() - 1) {
                        $stringx = $stringx . ", ";
                    }
                }
                return $stringx;
            }
            ?>

            <div class="grid_12">
                <div class="block-border" id="tab-panel-1">
                    <div class="block-header">
                        <h1>Tabs #1</h1>
                        <ul class="tabs">
                            <li><a href="#tab-1">PELAYANAN</a></li>
                            <li><a href="#tab-2">ENGLISH MASS</a></li>
                            <li><a href="#tab-3">DOA MALAM</a></li>
                        </ul>
                    </div>
                    <div class="block-content tab-container">
                        <div id="tab-1" class="tab-content">
                            <br>
                            <?php include 'function1.php'; ?>
                            <br>
                        </div>
                        <div id="tab-2" class="tab-content">
                            <br>
                            <?php include 'function2.php'; ?>
                            <br>
                        </div>
                        <div id="tab-3" class="tab-content">
                            <br>
                            <?php include 'function3.php'; ?>
                            <br>
                        </div>
                    </div>
                    <div class="block-content dark-bg">
                        <p>.</p>
                    </div>
                </div>
            </div>
            <div class="clear height-fix"></div>
        </div>
    </div> 
</div> 