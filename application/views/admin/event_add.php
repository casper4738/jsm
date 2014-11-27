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
                <h1>Event</h1>
                <p>Tambah event</p>
            </div>

            <div class="grid_12">
                <div class="block-border">
                    <div class="block-header"></div>

                    <?php
                    $hidden = array('string1' => $id);
                    $attributes = array('class' => 'block-content form', 'id' => 'validate-form');
                    echo form_open('event/insert', $attributes, $hidden);
                    ?>
                    <div class="_100">
                        <p><label for="textfield">Nama Event</label>
                            <input name="string2" class="required" type="text" value="" /></p>
                    </div>
                    <div class="_100">
                        <p><label for="textarea">Info Event</label>
                            <textarea name="string3" class="required" rows="7" cols="40"></textarea></p>
                    </div>
                    <div class="_50">
                        <p class="inline-small-label">
                            <span class="label">Tanggal Event</span>
                            <input id="datepicker" name="string4" class="required" type="text" value="" />
                        </p>
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
        </div></div> 
</div>

