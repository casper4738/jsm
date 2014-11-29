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

<section id="content">
    <div class="main">
        <div class="indent-left">
            <center><h3><?= $title ?></h3></center>
            <br/><br/>
            <center>
                <form>
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

                    <noscript><input type="submit" value="Submit"></noscript>
                </form>

                <br/><br/>
                <a href="#" onClick ="$('#new_table').tableExport({type: 'png', escape: 'false'});">
                    <?php
                    $image_properties = array(
                        'src' => "./asset/export/icons/png.png",
                        'title' => 'export',
                        'width' => '64',
                    );
                    echo "<center><strong>SAVE JADWAL </strong><br>" . img($image_properties) . "</center>";
                    ?>
                    <br/><br/>
                    <table id="new_table" class="table table-striped">
                        <tr>
                            <td style="text-align: center" width="150">BLN</td>
                            <td style="text-align: center" width="100">TGL</td>
                            <td style="text-align: center">ENGLISH MASS</td>
                        </tr>
                        <?php
                        $data_array = array();
                        $total = 0;

                        $string_m = "";

                        $list_sel = array();
                        $arrayx = array();
                        foreach ($this->sel_model->get_list1($tahun1, $bulan1, $tahun2, $bulan2, "ENGLISH_MASS")->result() as $value) {
                            $arrayx[] = $value->tanggal;
                        }
                        $list_sel = array_unique($arrayx);
                        sort($list_sel);
                        foreach ($list_sel as $value) {
                            $tgl = explode("-", $value);

                            $strx1 = function1($this->sel_model->get_list2($value, "ENGLISH_MASS"));

                            echo "<tr>";
                            $string_s = 1;
                            $string_x = $tgl[1];
                            if ($string_m != $string_x) {
                                $string_m = $string_x;
                                $string_s = $this->sel_model->get_list3($tgl[0], $tgl[1], "ENGLISH_MASS")->num_rows();
                                echo "<td style='transform: rotate(0deg); vertical-align:middle; text-align: center' rowspan='$string_s'>" . $this->storage->get_bulan($string_m) . "</td>";
                            } else {
                                
                            }
                            echo "<td style='text-align: center'>" . $tgl[2] . "</td>";
                            echo "<td style='text-align: center' width='300'>$strx1</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
            </center>
        </div>
    </div>
</section>