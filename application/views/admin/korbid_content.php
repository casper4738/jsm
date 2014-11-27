
<script src="<?= base_url() ?>asset/eltre/js/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url() ?>asset/eltre/js/jquery-ui-1.8.13.custom.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url() ?>asset/eltre/js/elrte.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?= base_url() ?>asset/eltre/css/elrte.min.css" type="text/css" media="screen" charset="utf-8">
<script src="<?= base_url() ?>asset/eltre/js/i18n/elrte.ru.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>asset/eltre/elfinder/css/elfinder.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>asset/eltre/elfinder/css/theme.css">
<script type="text/javascript" src="<?= base_url() ?>asset/eltre/elfinder/js/elfinder.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>asset/eltre/elfinder/js/i18n/elfinder.ru.js"></script>


<script type="text/javascript" charset="utf-8">
    $().ready(function() {
        $('#textarea').elrte({
            fmOpen: function(callback) {
                $('<div/>').dialogelfinder({
                    url: '<?= base_url() ?>asset/eltre/elfinder/php/connector.php', 
                    commandsOptions: {
                        getfile: {
                            oncomplete: 'destroy'
                        }
                    },
                    getFileCallback: callback 
                });
            }
        });
    });
</script>


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
                <h1>Kordinator Bidang Music</h1>
                <p>Kordinator Bidang</p>
            </div>

            <div class="grid_12">
                <div class="block-border">
                    <div class="block-header"></div>

                    <?php
                    $hidden = array('string1' => $id);
                    $attributes = array('class' => 'block-content form', 'id' => 'validate-form');
                    echo form_open('korbid/update', $attributes, $hidden);
                    ?>
                    <textarea id="textarea"  name="string2" class="required" rows="7" cols="40"><?= $korbid->tugas?></textarea>
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

