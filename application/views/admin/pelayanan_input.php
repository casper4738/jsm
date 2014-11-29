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
            <div class="grid_8">
                <h1>Jadwal Pelayanan</h1>
                <p>check list tanggal, kemudian isi sel yang bertugas misal A1, B1 bila lebih dari satu pisahkan dengan koma</p>

            </div>
            <div class="grid_4">
                <div class="block-border">
                    <div class="block-content">
                        <div class="_50">
                            <form>
                                <p class="inline-small-label">
                                    <span class="label">TANGGAL : </span>
                                    <?php
                                    $js = 'onchange="this.form.submit()"';
                                    $options = array();
                                    for ($index = 1; $index <= 12; $index++) {
                                        $options[$index] = $this->storage->get_bulan($index);
                                    }
                                    echo form_dropdown("bulan", $options, $bulan, $js);
                                    echo " ";
                                    $options = array();
                                    for ($index = date("Y") - 3; $index <= date("Y") + 3; $index++) {
                                        $options[$index] = $index;
                                    }
                                    echo form_dropdown("tahun", $options, $tahun, $js);
                                    ?>
                                </p>
                                <noscript><input type="submit" value="Submit"></noscript>
                            </form>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="grid_12">
                <div class="block-border">
                    <div class="block-header">
                        <h1>Grid</h1><span></span>
                    </div>
                    <?php
                    $hidden = array('bulan' => $bulan, 'tahun' => $tahun);
                    $attributes = array('class' => 'block-content form', 'id' => 'validate-form');
                    echo form_open('sel/insert_pelayanan', $attributes, $hidden);
                    ?>

                    <div class="_100">
                        <p class="inline-small-label">
                            <span class="label">BULAN : <?= $this->storage->get_bulan($bulan) ?></span>
                        </p>
                    </div>
                    <div class="_100">
                        <p class="inline-small-label">
                            <span class="label">TAHUN : <?= $tahun ?></span>
                        </p>
                    </div>

                    <div class="_100">
                        <center>
                            <br><br>
                            <table border="1" cellpadding="5" >
                                <tr>
                                    <td style='text-align:center' width="60"><strong>Tanggal</strong></td>
                                    <td style='text-align:center' colspan="2"><strong>SEL SUDIANG & GABUNGAN</strong></td>
                                    <td style='text-align:center'><strong>PEDAL</strong></td>
                                    <td style='text-align:center'><strong>SYAFAAT</strong></td>
                                    <td style='text-align:center'><strong>POS</strong></td>
                                </tr>
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

                                function functionCek($data_array, $int) {
                                    for ($index = 0; $index < count($data_array); $index++) {
                                        if ($data_array[$index] == $int) {
                                            return " checked ";
                                        }
                                    }
                                    return " ";
                                }

                                function functionCek2($string, $int) {
                                    if ($string == $int) {
                                        return " checked ";
                                    }
                                    return " ";
                                }

                                for ($index = 1; $index <= $this->storage->get_jumlah_hari($bulan, $tahun); $index++) {
                                    $nomor = $index - 1;
                                    $index = sprintf('%02d', $index);

                                    $strx1 = function1($this->sel_model->get_list2("$tahun-$bulan-$index", "SUDIANG"));
                                    $strx2 = function1($this->sel_model->get_list2("$tahun-$bulan-$index", "GABUNGAN"));
                                    $strx3 = function1($this->sel_model->get_list2("$tahun-$bulan-$index", "PEDAL"));
                                    $strx4 = function1($this->sel_model->get_list2("$tahun-$bulan-$index", "SYAFAAT"));
                                    $strx5 = function1($this->sel_model->get_list2("$tahun-$bulan-$index", "POS"));
                                    
                                    echo "<tr>";
                                    echo "<td style='vertical-align:middle; text-align:center'><input type='checkbox' name='tanggal[]' value='$index' " . functionCek($data_array, $index) . " /> $index</td>";
                                    echo "<td width='150'><input type='text' name='sudiang$index []'  value='$strx1' /></td>";
                                    echo "<td width='150'><input type='text' name='gabungan$index []'  value='$strx2' /></td>";
                                    echo "<td width='150'><input type='text' name='pedal$index []'  value='$strx3' /></td>";
                                    echo "<td width='150'><input type='text' name='syafaat$index []'  value='$strx4' /></td>";
                                    echo "<td width='150'><input type='text' name='pos$index []'  value='$strx5' /></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <br><br>
                        </center>
                    </div>
                    <div class="clear"></div>
                    <div class="block-actions">
                        <ul class="actions-right">
                            <li><input type="submit" class="button" value="Simpan"></li>
                        </ul>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>

            <div class="clear height-fix"></div>
        </div>
    </div> 
</div> 