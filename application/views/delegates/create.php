<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Delegate</title>
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
            <legend>Add Delegate Details</legend>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "delegateform", "name" => "delegateform");
            echo form_open("delegates/create", $attributes);?>
            <fieldset>

                <div class="form-group">
                    <div class="row colbox">

                        <div class="col-lg-4 col-sm-4">
                            <label for="delegateid" class="control-label">Delegate Id</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="delegateid" name="delegateid" placeholder="delegateid" disabled="disabled" class="form-control"  value="<?php print_r($idlast); ?>" />
                            <span class="text-danger"><?php echo form_error('delegateid'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="delegatename" class="control-label">Delegate Name</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="delegatename" name="delegatename" placeholder="delegatename" type="text" class="form-control"  value="<?php echo set_value('delegatename'); ?>" />
                            <span class="text-danger"><?php echo form_error('delegatename'); ?></span>
                        </div>
                    </div>
                </div>

                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-4 col-sm-4">
                                <label for="gender" class="control-label">Gender</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input id="gender" name="gender" placeholder="gender" type="text" class="form-control"  value="<?php echo set_value('gender'); ?>" />
                                <span class="text-danger"><?php echo form_error('gender'); ?></span>
                            </div>
                        </div>
                    </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="mobile" class="control-label">Mobile</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="mobile" name="mobile" placeholder="mobile" type="text" class="form-control"  value="<?php echo set_value('mobile'); ?>" />
                            <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="roomno" class="control-label">Mobile</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="roomno" name="roomno" placeholder="roomno" type="text" class="form-control"  value="<?php echo set_value('roomno'); ?>" />
                            <span class="text-danger"><?php echo form_error('roomno'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="accomodationid" class="control-label">Accomodation </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">

                            <?php
                            $attributes = 'class = "form-control" id = "accomodationid"';
                            echo form_dropdown('accomodationid',$accomodation,set_value('accomodationid'),$attributes);?>
                            <span class="text-danger"><?php echo form_error('accomodationid'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="memid" class="control-label">Membership Id</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="memid" name="memid" placeholder="memid" type="text" class="form-control" value="<?php echo set_value('memid'); ?>" />
                            <span class="text-danger"><?php echo form_error('memid'); ?></span>
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
