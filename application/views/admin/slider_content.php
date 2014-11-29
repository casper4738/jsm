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
                <h1>Slider</h1>
                <p>silakan pilih upload foto yang ingin diubah lalu tekan tombol simpan
                <br>bila foto tidak berubah silakan refresh
                <br>ukuran gambar akan diubah 800 x 431
                </p>
            </div>

            <div class="grid_12">
                <div class="block-border">
                    <div class="block-header">
                        <h1>bila foto tidak berubah silakan refresh</h1><span></span>
                    </div>

                    <?php
                    $hidden = array('simpan'=>TRUE);
                    $attributes = array('class' => 'block-content form', 'id' => 'validate-form');
                    echo form_open_multipart('admin/slider', $attributes, $hidden);
                    ?>
                    <div class="_50">
                        <p>
                            <label for="file">Upload Foto 1</label>
                            <input  type="file" name="file1"> (gif | jpg | png)
                            <br><?=$error1?>
                        </p>
                    </div>

                    <div class="_50">
                        <p>
                            <?php
                            $image_properties = array(
                                'src' => "./uploads/$slider1->id_slider$slider1->file_ext",
                                'width' => '300',
                            );
                            echo img($image_properties);
                            ?>
                        </p>
                    </div>

                    <div class="_50">
                        <p>
                            <label for="file">Upload Foto 2</label>
                            <input  type="file" name="file2"> (gif | jpg | png)  
                             <br><?=$error2?>
                        </p>
                    </div>

                    <div class="_50">
                        <p>
                            <?php
                            $image_properties = array(
                                'src' => "./uploads/$slider2->id_slider$slider2->file_ext",
                                'width' => '300',
                            );
                            echo img($image_properties);
                            ?>
                        </p>
                    </div>

                    <div class="_50">
                        <p>
                            <label for="file">Upload Foto 3</label>
                            <input  type="file" name="file3"> (gif | jpg | png)  
                             <br><?=$error3?>
                        </p>
                    </div>

                    <div class="_50">
                        <p>
                            <?php
                            $image_properties = array(
                                'src' => "./uploads/$slider3->id_slider$slider3->file_ext",
                                'width' => '300',
                            );
                            echo img($image_properties);
                            ?>
                        </p>
                    </div>

                    <div class="_50">
                        <p>
                            <label for="file">Upload Foto 4</label>
                            <input  type="file" name="file4"> (gif | jpg | png)  
                             <br><?=$error4?>
                        </p>
                    </div>

                    <div class="_50">
                        <p>
                            <?php
                            $image_properties = array(
                                'src' => "./uploads/$slider4->id_slider$slider4->file_ext",
                                'width' => '300',
                            );
                            echo img($image_properties);
                            ?>
                        </p>
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