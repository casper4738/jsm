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
                                anchor("sel/add_doa_malam", img(base_url() . "asset/template_admin/img/icons/packs/fugue/24x24/address-book.png") .
                                        "USHER & SYAFAAT");
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
                            <li><a href="#tab-1">USHER & SYAFAAT</a></li>
                        </ul>
                    </div>
                    <div class="block-content tab-container">
                        <div id="tab-1" class="tab-content">
                            <br>
                            <table border="2" width="100%" cellpadding="5">
                                <tr>
                                    <td style="text-align: center">BLN</td>
                                    <td style="text-align: center">TGL</td>
                                    <td style="text-align: center" colspan="2">USHER & SYAFAAT</td>
                                </tr>
                                <?php
                                $data_array = array();
                                $total = 0;

                                $string_m = "";

                                $list_sel = array();
                                $array1 = array();
                                $array2 = array();
                                foreach ($this->sel_model->get_list1($tahun1, $bulan1, $tahun2, $bulan2, "PDB")->result() as $value) {
                                    $array1[] = $value->tanggal;
                                }
                                foreach ($this->sel_model->get_list1($tahun1, $bulan1, $tahun2, $bulan2, "SYAFAAT_MALAM")->result() as $value) {
                                    $array2[] = $value->tanggal;
                                }
                                $list_sel = array_unique(array_merge($array1, $array2));

                                foreach ($list_sel as $value) {
                                    $tgl = explode("-", $value);
                                    $string1 = $this->sel_model->get_list2($value, "PDB")->row()->nama_sel;
                                    $string2 = $this->sel_model->get_list2($value, "SYAFAAT_MALAM")->row()->nama_sel;

                                    echo "<tr>";
                                    $string_s = 1;
                                    $string_x = $tgl[1];
                                    if ($string_m != $string_x) {
                                        $string_m = $string_x;
                                        $string_s1 = $this->sel_model->get_list3($tgl[0], $tgl[1], "PDB")->num_rows();
                                        $string_s2 = $this->sel_model->get_list3($tgl[0], $tgl[1], "SYAFAAT_MALAM")->num_rows();
                                        $string_s = max(array($string_s1, $string_s2));
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