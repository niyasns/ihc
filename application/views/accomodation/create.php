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
</html>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
            <legend>Add Accomodation Details</legend>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "accomodationform", "name" => "accomodationform");
            echo form_open("accomodation/create", $attributes);?>
            <fieldset>


                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="accomname" class="control-label">Accomodation Name</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="accomname" name="accomname" placeholder="accomname" type="text" class="form-control"  value="<?php echo set_value('accomname'); ?>" />
                            <span class="text-danger"><?php echo form_error('accomname'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="latitude" class="control-label">Latitude</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="latitude" name="latitude" placeholder="latitude" type="text" class="form-control"  value="<?php echo set_value('latitude'); ?>" />
                            <span class="text-danger"><?php echo form_error('latitude'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-lg-4 col-sm-4">
                            <label for="longitude" class="control-label">Longitude</label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <input id="longitude" name="longitude" placeholder="longitude" type="text" class="form-control" value="<?php echo set_value('longitude'); ?>" />
                            <span class="text-danger"><?php echo form_error('longitude'); ?></span>
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