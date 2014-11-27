<link href='<?= base_url(); ?>asset/calendar/lib/cupertino/jquery-ui.min.css' rel='stylesheet' />
<script src="<?= base_url(); ?>asset/calendar/lib/moment.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>asset/calendar/lib/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>asset/calendar/fullcalendar.min.js" type="text/javascript"></script>

<script type="text/javascript">

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            theme: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
            },
            buttonIcons: false,
            editable: false,
            eventLimit: true,
            events: <?= $data_json ?>,
            loading: function(bool) {
                $('#loading').toggle(bool);
            }
        });

    });

</script>
<style >


    #script-warning {
        display: none;
        background: #eee;
        border-bottom: 1px solid #ddd;
        padding: 0 10px;
        line-height: 40px;
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        color: red;
    }

    #loading {
        display: none;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    #calendar {
        width: 100%;
        margin: 0 auto;
    }

</style>


<section id="content">
    <div class="main">
        <div class="indent-left">
            <center><h3><?= $title ?></h3></center>
            <br/><br/>

            <div id='script-warning'>
                <code>Data error</code> cek data.
            </div>
            <div id='loading'>loading...</div>
            <div id='calendar'></div>
        </div>
    </div>
</section>