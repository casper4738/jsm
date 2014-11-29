
<footer id="footer"><div class="container_12">
        <div class="grid_12">
            <div class="footer-icon align-center"><a class="top" href="#top"></a></div>
        </div>
    </div></footer>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url(); ?>asset/template_admin/js/libs/jquery-1.6.2.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via ant build script-->
<script defer src="<?= base_url(); ?>asset/template_admin/js/plugins.js"></script> <!-- lightweight wrapper for consolelog, optional -->
<script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery-ui-1.8.15.custom.min.js"></script> <!-- jQuery UI -->
<script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery.notifications.js"></script> <!-- Notifications  -->
<!--<script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery.uniform.min.js"></script>  Uniform (Look & Feel from forms) -->
<script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery.validate.min.js"></script> <!-- Validation from forms -->
<script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery.dataTables.min.js"></script> <!-- Tables -->
<script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery.tipsy.js"></script> <!-- Tooltips -->
<script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/excanvas.js"></script> <!-- Charts -->
<script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery.visualize.js"></script> <!-- Charts -->
<script defer src="<?= base_url(); ?>asset/template_admin/js/mylibs/jquery.slidernav.min.js"></script> <!-- Contact List -->
<script defer src="<?= base_url(); ?>asset/template_admin/js/common.js"></script> <!-- Generic functions -->
<script defer src="<?= base_url(); ?>asset/template_admin/js/script.js"></script> <!-- Generic scripts -->

<script type="text/javascript">
    $().ready(function() {
//        $.validator.setDefaults({
//            submitHandler: function(e) {
//                $.jGrowl("Form was successfully submitted.", {theme: 'success'});
//                $(e).parent().parent().fadeOut();
//            }
//        });
        var validateform = $("#validate-form").validate();
        $("#reset-validate-form").click(function() {
            validateform.resetForm();
            $.jGrowl("You resetted the form.", {theme: 'error'});
        });


        $('#table-example').dataTable();
        $("#datepicker").datepicker();
        
		$("#tab-panel-1").createTabs();
		$("#tab-panel-2").createTabs();
    });
</script>
<!-- end scripts-->

<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
     chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7 ]>
  <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

</body>
</html>