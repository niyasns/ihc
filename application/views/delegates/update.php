<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Delegate details</title>
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
        $(document).ready(function() {
            $("#date").datepicker({ dateFormat: 'dd/mm/yy' }).val();
            $("#btn_update").click(function(){
                $('#datepicker').val("");
        });
    </script>

</head>
<body>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <legend>Update Delegates table</legend>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "delegateform", "name" => "delegateform");
            echo form_open("delegates/update" . $delid, $attributes);?>
            <fieldset>

                <div class="form-group">
                    <div class="row colbox">

                        <div class="col-md-4">
                            <label for="delegateid" class="control-label">Delegate id</label>
                        </div>
                        <div class="col-md-8">
                            <input id="delegateid" name="delegateid" placeholder="delegateid" type="text" disabled="disabled" class="form-control"  value="<?php echo $delrecord[0]->id; ?>" />
                            <span class="text-danger"><?php echo form_error('delegateid'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="delegatename" class="control-label">Employee Name</label>
                        </div>
                        <div class="col-md-8">
                            <input id="delegatename" name="delegatename" placeholder="delegatename" type="text" class="form-control"  value="<?php echo set_value('delegatename', $delrecord[0]->name); ?>" />
                            <span class="text-danger"><?php echo form_error('delegatename'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="gender" class="control-label">Gender</label>
                        </div>
                        <div class="col-md-8">
                            <input id="gender" name="gender" placeholder="gender" type="text" class="form-control"  value="<?php echo set_value('gender', $delrecord[0]->gender); ?>" />
                            <span class="text-danger"><?php echo form_error('gender'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="mobile" class="control-label">Mobile No</label>
                        </div>
                        <div class="col-md-8">
                            <input id="mobile" name="mobile" placeholder="mobile" type="text" class="form-control"  value="<?php echo set_value('mobile', $delrecord[0]->mobile); ?>" />
                            <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="roomno" class="control-label">Room No</label>
                        </div>
                        <div class="col-md-8">
                            <input id="roomno" name="roomno" placeholder="roomno" type="text" class="form-control"  value="<?php echo set_value('roomno', $delrecord[0]->room_no); ?>" />
                            <span class="text-danger"><?php echo form_error('roomno'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="accomodation" class="control-label">Accomodation</label>
                        </div>
                        <div class="col-md-8">

                            <?php
                            $attributes = 'class = "form-control" id = "department"';
                            echo form_dropdown('accomodation',$accomodation,set_value('accomodation', $delrecord[0]->accomodation_id),$attributes);?>
                            <span class="text-danger"><?php echo form_error('accomodation'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="salary" class="control-label">Membership id</label>
                        </div>
                        <div class="col-md-8">
                            <input id="memid" name="memid" placeholder="memid" type="text" class="form-control"  value="<?php echo set_value('memid', $delrecord[0]->mem_id); ?>" />
                            <span class="text-danger"><?php echo form_error('memid'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-md-8 text-left">
                        <input id="btn_update" name="btn_update" type="submit" class="btn btn-primary" value="Update" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancel" />
                        <a href="<?php echo base_url() . "delegates/index" ?>" class="btn btn-primary" role="button">Back</a>
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
