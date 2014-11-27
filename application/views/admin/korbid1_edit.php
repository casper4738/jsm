<div id="main" role="main">
    <div id="title-bar">
        <ul id="breadcrumbs">
            <li><a href="dashboard.html" title="Home"><span id="bc-home"></span></a></li>
            <li class="no-hover">Forms</li>
        </ul>
    </div> 
    <div class="shadow-bottom shadow-titlebar"></div>
    <div id="main-content">
        <div class="container_12">

            <div class="grid_12">
                <h1><?=$jenis?></h1>
                <p>Edit Jadwal Tugas <?=$jenis?></p>
            </div>

            <div class="grid_12">
                <div class="block-border">
                    <div class="block-header"></div>

                    <?php
                    $hidden = array('string1' => $id, 'string2' => $par);
                    $attributes = array('class' => 'block-content form', 'id' => 'validate-form');
                    echo form_open('korbid/update', $attributes, $hidden);
                    ?>
                    <div class="inline-small-label _50">
                        <p class="inline-small-label">
                            <span class="label">Tanggal Tugas</span>
                            <input id="datepicker" name="string3" class="required" type="text" value="<?=date("m/d/Y", strtotime($korbid->tanggal))?>" />
                        </p>
                    </div>
                    <div class="_100">
                        <p><label for="textarea">Singer</label>
                            <textarea name="string4" class="required" rows="5" cols="40"><?=$korbid->singer?></textarea></p>
                    </div>
                    <div class="_100">
                        <p><label for="textarea">Pemusik</label>
                            <textarea name="string5" class="required" rows="5" cols="40"><?=$korbid->pemusik?></textarea></p>
                    </div>
                    <div class="_100">
                        <p><label for="textarea">Atur Alat</label>
                            <textarea name="string6" class="required" rows="5" cols="40"><?=$korbid->atur_alat?></textarea></p>
                    </div>

                    <div class="clear"></div>
                    <div class="block-actions">
                        <ul class="actions-left">
                            <li><input type="reset" class="button red" id="reset-validate-form"  value="Reset"></li>
                        </ul>
                        <ul class="actions-right">
                            <li><input type="submit" class="button" value="Simpan"></li>
                        </ul>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
            <div class="clear height-fix"></div>
        </div></div> 
</div>

