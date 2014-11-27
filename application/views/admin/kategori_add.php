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
                <h1>Kategori</h1>
                <p>Tambah kategori</p>
            </div>

            <div class="grid_12">
                <div class="block-border">
                    <div class="block-header"></div>

                    <?php
                    $attributes = array('class' => 'block-content form', 'id' => 'validate-form');
                    echo form_open('kategori/insert', $attributes);
                    ?>
                    <div class="_100">
                        <p><label for="textfield">Nama Kategori</label>
                            <input name="string2" class="required" type="text" value="" /></p>
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

