<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Event</title>
    <!--link the bootstrap css file-->
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url('assets/js/jquery-3.1.1.js'); ?>"></script>

    <!-- link jquery ui css-->
    <link href="<?php echo base_url('assets/css/jquery-ui.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!--load jquery ui js file-->
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>


    <style type="text/css">
        .colbox {
            margin-left: 0px;
            margin-right: 0px;
        }
    </style>

    <script type="text/javascript">
        //load datepicker control onfocus
        $(function() {
            $("#date").datepicker({ dateFormat: 'dd/mm/yy' }).val();
        });
    </script>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
            <legend>Add Event Details</legend>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "eventform", "name" => "eventform");
            echo form_open("events/create", $attributes);?>
            <fieldset>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="name" class="control-label">Event Name</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="name" name="name" placeholder="name" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                            <span class="text-danger"><?php echo form_error('name'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="timestart" class="control-label">Start time</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="timestart" name="timestart" placeholder="timestart" type="text" class="form-control"  value="<?php echo set_value('timestart'); ?>" />
                            <span class="text-danger"><?php echo form_error('timestart'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="timeend" class="control-label">End time</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="timeend" name="timeend" placeholder="timeend"type="text" class="form-control"  value="<?php echo set_value('timeend'); ?>" />
                            <span class="text-danger"><?php echo form_error('timeend'); ?></span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="venueid" class="control-label">Venue </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">

                            <?php
                            $attributes = 'class = "form-control" id = "venueid"';
                            echo form_dropdown('venueid',$venue,set_value('venueid'),$attributes);?>
                            <span class="text-danger"><?php echo form_error('venueid'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="date" class="control-label">Date</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="date" name="date" placeholder="date" type="text" class="form-control"  value="<?php echo set_value('date'); ?>" />
                            <span class="text-danger"><?php echo form_error('date'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                        <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Insert" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancel" />
                    </div>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>
</body>
</html>
