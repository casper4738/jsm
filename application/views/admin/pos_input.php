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
                <p>check list tanggal, kemudian pilih sel dapat dipilih lebih dari satu</p>
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
                    echo form_open('sel/insert_pelayanan4', $attributes, $hidden);
                    ?>

                    <div class="_50">
                        <p class="inline-small-label">
                            <span class="label">BULAN : <?= $this->storage->get_bulan($bulan) ?></span>
                        </p>
                    </div>
                    <div class="_50">
                        <p class="inline-small-label">
                            <span class="label">TAHUN : <?= $tahun ?></span>
                        </p>
                    </div>

                    <div class="_100">
                        <center>
                            <br><br>
                            <table border="1" >
                                <tr>
                                    <td style='text-align:center' width="60"><strong>Tanggal</strong></td>
                                    <td style='text-align:center'  ><strong>POS</strong></td>
                                </tr>
                                <?php

                                function functionCek($data_array, $int) {
                                    for ($index = 0; $index < count($data_array); $index++) {
                                        if ($data_array[$index] == $int) {
                                            return " checked ";
                                        }
                                    }
                                    return " ";
                                }

                                $sel = array("A", "B", "C", "D", "E");
                                for ($index = 1; $index < 31; $index++) {
                                    $index = sprintf('%02d', $index);
                                    echo "<tr>";
                                    echo "<td style='vertical-align:middle; text-align:center'><input type='checkbox' name='tanggal[]' value='$index' " . functionCek($data_array, $index) . " /> $index</td>";
                                    echo "<td>";
                                    echo "<table cellpadding='5'>";
                                    for ($i = 0; $i < count($sel); $i++) {
                                        echo "<tr>";
                                        $data_arrayx = array();
                                        foreach ($this->sel_model->get_list2("$tahun-$bulan-$index", "POS")->result() as $value) {
                                            $data_arrayx[] = $value->nama_sel;
                                        }
                                        for ($j = 1; $j <= 6; $j++) {
                                            echo "<td width='35'><input type='checkbox' name='pos$index []'  value='$sel[$i]$j' " . functionCek($data_arrayx, "$sel[$i]$j") . "/> $sel[$i]$j</td>";
                                        }
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                    echo "</td>";
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