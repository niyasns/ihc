<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Accomodation</title>
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
</head>
<body>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <legend>Update Record</legend>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "employeeform", "name" => "employeeform");
            echo form_open("papers/update/" . $paperid, $attributes);?>
            <fieldset>

                <div class="form-group">
                    <div class="row colbox">

                        <div class="col-md-4">
                            <label for="paperid" class="control-label">Paper Id</label>
                        </div>
                        <div class="col-md-8">
                            <input id="paperid" name="paperid" placeholder="paperid" type="text" disabled="disabled" class="form-control"  value="<?php echo $paperrecord[0]->id; ?>" />
                            <span class="text-danger"><?php echo form_error('paperid'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="papername" class="control-label">Paper Name</label>
                        </div>
                        <div class="col-md-8">
                            <input id="papername" name="papername" placeholder="papername" type="text" class="form-control"  value="<?php echo set_value('papername', $paperrecord[0]->paper_name); ?>" />
                            <span class="text-danger"><?php echo form_error('papername'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="delegatename" class="control-label">Delegate Name</label>
                        </div>
                        <div class="col-md-8">
                            <input id="delegatename" name="delegatename" placeholder="delegatename" type="text" class="form-control"  value="<?php echo set_value('papername', $paperrecord[0]->delegate_name); ?>" />
                            <span class="text-danger"><?php echo form_error('delegatename'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="event" class="control-label">Event</label>
                        </div>
                        <div class="col-md-8">

                            <?php
                            $attributes = 'class = "form-control" id = "event"';
                            echo form_dropdown('event',$event, set_value('event', $paperrecord[0]->event_id), $attributes);?>

                            <span class="text-danger"><?php echo form_error('event'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-md-8 text-left">
                        <input id="btn_update" name="btn_update" type="submit" class="btn btn-primary" value="Update" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancel" />
                        <a href="<?php echo base_url() . "papers/index" ?>" class="btn btn-primary" role="button">Back</a>
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