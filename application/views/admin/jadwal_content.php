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
                                anchor("sel/add_pelayanan1", img(base_url() . "asset/template_admin/img/icons/packs/fugue/24x24/address-book.png") .
                                        "SUDIANG & GABUNGAN ");
                                ?>

                            </li>
                            <li><?=
                                anchor("sel/add_pelayanan2", img(base_url() . "asset/template_admin/img/icons/packs/crystal/48x48/apps/kedit.png") .
                                        "PEDAL");
                                ?>
                            </li>
                            <li><?=
                                anchor("sel/add_pelayanan3", img(base_url() . "asset/template_admin/img/icons/packs/crystal/48x48/apps/kedit.png") .
                                        "SYAFAAT");
                                ?>
                            </li>
                            <li><?=
                                anchor("sel/add_pelayanan4", img(base_url() . "asset/template_admin/img/icons/packs/crystal/48x48/apps/kedit.png") .
                                        "POS");
                                ?>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <div class="grid_12">
                <div class="block-border" id="tab-panel-1">
                    <div class="block-header">
                        <h1>Tabs #1</h1>
                        <ul class="tabs">
                            <li><a href="#tab-1">SEL SUDIANG & GANBUNGAN</a></li>
                            <li><a href="#tab-2">PEDAL</a></li>
                            <li><a href="#tab-3">SYAFAAT</a></li>
                            <li><a href="#tab-4">POS</a></li>
                        </ul>
                    </div>
                    <div class="block-content tab-container">
                        <div id="tab-1" class="tab-content">
                            <br>
                            <table border="2" width="100%" cellpadding="5">
                                <tr>
                                    <td style="text-align: center">BLN</td>
                                    <td style="text-align: center">TGL</td>
                                    <td style="text-align: center" colspan="2">SEL SUDIANG & GABUNGAN</td>
                                </tr>
                                <?php
                                $data_array = array();
                                $total = 0;

                                $string_m = "";

                                $list_sel = array();
                                $list_sel = $this->sel_model->get_list1($tahun1, $bulan1, $tahun2, $bulan2, "SUDIANG");
                                for ($index = 0; $index < $list_sel->num_rows(); $index++) {
                                    $value = $list_sel->result()[$index];
                                    $tgl = explode("-", $value->tanggal);
                                    $string1 = "";
                                    $string2 = "";
                                    $list1[0] = $this->sel_model->get_list2($value->tanggal, "SUDIANG")->result();
                                    $list1[1] = $this->sel_model->get_list2($value->tanggal, "SUDIANG")->num_rows();
                                    $list2[0] = $this->sel_model->get_list2($value->tanggal, "GABUNGAN")->result();
                                    $list2[1] = $this->sel_model->get_list2($value->tanggal, "GABUNGAN")->num_rows();

                                    for ($i = 0; $i < $list1[1]; $i++) {
                                        $row = $list1[0][$i];
                                        $string1 = $string1 . $row->nama_sel;
                                        if ($i < $list1[1] - 1) {
                                            $string1 = $string1 . ", ";
                                        }
                                    }

                                    for ($i = 0; $i < $list2[1]; $i++) {
                                        $row = $list2[0][$i];
                                        $string2 = $string2 . $row->nama_sel;
                                        if ($i < $list2[1] - 1) {
                                            $string2 = $string2 . ", ";
                                        }
                                    }

                                    echo "<tr>";
                                    $string_s = 1;
                                    $string_x = $tgl[1];
                                    if ($string_m != $string_x) {
                                        $string_m = $string_x;
                                        $string_s = $this->sel_model->get_list3($tgl[0], $tgl[1], "SUDIANG")->num_rows();
                                        echo "<td style='transform: rotate(0deg); vertical-align:middle; text-align: center' rowspan='$string_s'>" . $this->storage->get_bulan($string_m) . "</td>";
                                    } else {
                                        
                                    }
                                    echo "<td style='text-align: center'>" . $tgl[2] . "</td>";
                                    echo "<td style='text-align: center' width='300'>$string1</td>";
                                    echo "<td style='text-align: center' width='300'>$string2</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <br>
                        </div>
                        <div id="tab-2" class="tab-content">
                            <br>
                            <table border="2" width="100%" cellpadding="5">
                                <tr>
                                    <td style="text-align: center" width="150">BLN</td>
                                    <td style="text-align: center" width="150">TGL</td>
                                    <td style="text-align: center">PEDAL</td>
                                </tr>
                                <?php
                                $data_array = array();
                                $total = 0;
                                $string_m = "";

                                $list_sel = array();
                                $list_sel = $this->sel_model->get_list1($tahun1, $bulan1, $tahun2, $bulan2, "PEDAL");
                                for ($index = 0; $index < $list_sel->num_rows(); $index++) {
                                    $value = $list_sel->result()[$index];
                                    $tgl = explode("-", $value->tanggal);
                                    $string1 = $this->sel_model->get_list2($value->tanggal, "PEDAL")->result()[0]->nama_sel;
                                    echo "<tr>";
                                    $string_s = 1;
                                    $string_x = $tgl[1];
                                    if ($string_m != $string_x) {
                                        $string_m = $string_x;
                                        $string_s = $this->sel_model->get_list3($tgl[0], $tgl[1], "PEDAL")->num_rows();
                                        echo "<td style='transform: rotate(0deg); vertical-align:middle; text-align: center' rowspan='$string_s'>" . $this->storage->get_bulan($string_m) . "</td>";
                                    } else {
                                        
                                    }
                                    echo "<td style='text-align: center'>" . $tgl[2] . "</td>";
                                    echo "<td style='text-align: center' width='300'>$string1</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <br>
                        </div>
                        <div id="tab-3" class="tab-content">
                            <br>
                            <table border="2" width="100%" cellpadding="5">
                                <tr>
                                    <td style="text-align: center" width="150">BLN</td>
                                    <td style="text-align: center" width="150">TGL</td>
                                    <td style="text-align: center">SYAFAAT</td>
                                </tr>
                                <?php
                                $data_array = array();
                                $total = 0;
                                $string_m = "";

                                $list_sel = array();
                                $list_sel = $this->sel_model->get_list1($tahun1, $bulan1, $tahun2, $bulan2, "SYAFAAT");
                                for ($index = 0; $index < $list_sel->num_rows(); $index++) {
                                    $value = $list_sel->result()[$index];
                                    $tgl = explode("-", $value->tanggal);
                                    $string1 = "";
                                    $list1[0] = $this->sel_model->get_list2($value->tanggal, "SYAFAAT")->result();
                                    $list1[1] = $this->sel_model->get_list2($value->tanggal, "SYAFAAT")->num_rows();

                                    for ($i = 0; $i < $list1[1]; $i++) {
                                        $row = $list1[0][$i];
                                        $string1 = $string1 . $row->nama_sel;
                                        if ($i < $list1[1] - 1) {
                                            $string1 = $string1 . ", ";
                                        }
                                    }

                                    echo "<tr>";
                                    $string_s = 1;
                                    $string_x = $tgl[1];
                                    if ($string_m != $string_x) {
                                        $string_m = $string_x;
                                        $string_s = $this->sel_model->get_list3($tgl[0], $tgl[1], "SYAFAAT")->num_rows();
                                        echo "<td style='transform: rotate(0deg); vertical-align:middle; text-align: center' rowspan='$string_s'>" . $this->storage->get_bulan($string_m) . "</td>";
                                    } else {
                                        
                                    }
                                    echo "<td style='text-align: center'>" . $tgl[2] . "</td>";
                                    echo "<td style='text-align: center' width='300'>$string1</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <br>
                        </div>
                        <div id="tab-4" class="tab-content">
                            <br>
                            <table border="2" width="100%" cellpadding="5">
                                <tr>
                                    <td style="text-align: center" width="150">BLN</td>
                                    <td style="text-align: center" width="150">TGL</td>
                                    <td style="text-align: center">POS</td>
                                </tr>
                                <?php
                                $data_array = array();
                                $total = 0;
                                $string_m = "";

                                $list_sel = array();
                                $list_sel = $this->sel_model->get_list1($tahun1, $bulan1, $tahun2, $bulan2, "POS");
                                for ($index = 0; $index < $list_sel->num_rows(); $index++) {
                                    $value = $list_sel->result()[$index];
                                    $tgl = explode("-", $value->tanggal);
                                    $string1 = "";
                                    $list1[0] = $this->sel_model->get_list2($value->tanggal, "POS")->result();
                                    $list1[1] = $this->sel_model->get_list2($value->tanggal, "POS")->num_rows();

                                    for ($i = 0; $i < $list1[1]; $i++) {
                                        $row = $list1[0][$i];
                                        $string1 = $string1 . $row->nama_sel;
                                        if ($i < $list1[1] - 1) {
                                            $string1 = $string1 . ", ";
                                        }
                                    }

                                    echo "<tr>";
                                    $string_s = 1;
                                    $string_x = $tgl[1];
                                    if ($string_m != $string_x) {
                                        $string_m = $string_x;
                                        $string_s = $this->sel_model->get_list3($tgl[0], $tgl[1], "POS")->num_rows();
                                        echo "<td style='transform: rotate(0deg); vertical-align:middle; text-align: center' rowspan='$string_s'>" . $this->storage->get_bulan($string_m) . "</td>";
                                    } else {
                                        
                                    }
                                    echo "<td style='text-align: center'>" . $tgl[2] . "</td>";
                                    echo "<td style='text-align: center' width='300'>$string1</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <br>
                        </div>
                    </div>
                    <div class="block-content dark-bg">
                        <p>You see an other example on the <a href="charts.html">Charts-Page</a>.</p>
                    </div>
                </div>
            </div>
            <div class="clear height-fix"></div>
        </div>
    </div> 
</div> 