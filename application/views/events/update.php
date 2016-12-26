<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event table</title>


    <script src="<?php echo base_url('assets/css/material.min.css'); ?>"></script>


    <script src="<?php echo base_url('assets/js/jquery-3.1.1.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/material.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/moment-with-locales.min.js'); ?>"></script>


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--link the bootstrap css file-->
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />


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



        $(document).ready(function()

        {
            $('#datepicker').datepicker({ dateFormat: 'dd/mm/yy',minDate: new Date('1999/10/25') }).val();
            $("#btn_update").click(function(){
                $('#datepicker').val("");
            })

        });
    </script>

</head>
<body>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <legend>Update Event Table</legend>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "eventform", "name" => "eventform");
            echo form_open("events/update/" . $eventid, $attributes);?>
            <fieldset>

                <div class="form-group">
                    <div class="row colbox">

                        <div class="col-md-4">
                            <label for="eventid" class="control-label">Event ID</label>
                        </div>
                        <div class="col-md-8">
                            <input id="eventid" name="eventid" placeholder="event id" type="text" disabled="disabled" class="form-control"  value="<?php echo $eventrecord[0]->id; ?>" />
                            <span class="text-danger"><?php echo form_error('employeeno'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="eventname" class="control-label">Name</label>
                        </div>
                        <div class="col-md-8">
                            <input id="eventname" name="eventname" placeholder="event name" type="text" class="form-control"  value="<?php echo set_value('eventname', $eventrecord[0]->name); ?>" />
                            <span class="text-danger"><?php echo form_error('eventname'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="starttime" class="control-label">Start time</label>
                        </div>
                        <div class="col-md-8">
                            <input id="starttime" name="starttime" placeholder="start time" type="text" class="form-control"  value="<?php echo set_value('starttime', $eventrecord[0]->time_start); ?>" />
                            <span class="text-danger"><?php echo form_error('starttime'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="endtime" class="control-label">End time</label>
                        </div>
                        <div class="col-md-8">
                            <input id="endtime" name="endtime" placeholder="End name" type="text" class="form-control"  value="<?php echo set_value('endtime', $eventrecord[0]->time_end); ?>" />
                            <span class="text-danger"><?php echo form_error('endtime'); ?></span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="venueid" class="control-label">Venue Name</label>
                        </div>
                        <div class="col-md-8">

                            <?php
                            $attributes = 'class = "form-control" id = "venueid"';
                            echo form_dropdown('venueid',$venue,set_value('venueid', $eventrecord[0]->venue_id),$attributes);?>
                            <span class="text-danger"><?php echo form_error('venueid'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="date" class="control-label">Date</label>
                        </div>
                        <div class="col-md-8">
                            <input id="date" name="date" placeholder="date" type="text" class="form-control"  value="<?php echo set_value('hireddate', @date('d-m-Y', @strtotime($eventrecord[0]->date))); ?>" />
                        <span class="text-danger"><?php echo form_error('date'); ?></span>

                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
        </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-md-8 text-left">
                        <input id="btn_update" name="btn_update" type="submit" class="btn btn-primary" value="Update" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancel" />
                        <a href="<?php echo base_url() . "events/index" ?>" class="btn btn-primary" role="button">Back</a>
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