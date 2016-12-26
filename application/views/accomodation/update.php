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
            <legend>Update accomodation</legend>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "employeeform", "name" => "employeeform");
            echo form_open("accomodation/update/" . $accid, $attributes);?>
            <fieldset>

                <div class="form-group">
                    <div class="row colbox">

                        <div class="col-md-4">
                            <label for="accid" class="control-label">Accomodation Id</label>
                        </div>
                        <div class="col-md-8">
                            <input id="accid" name="accid" placeholder="accid" type="text" disabled="disabled" class="form-control"  value="<?php echo $accrecord[0]->id; ?>" />
                            <span class="text-danger"><?php echo form_error('accid'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="accname" class="control-label">Accomodation Name</label>
                        </div>
                        <div class="col-md-8">
                            <input id="accname" name="accname" placeholder="accname" type="text" class="form-control"  value="<?php echo set_value('accname', $accrecord[0]->name); ?>" />
                            <span class="text-danger"><?php echo form_error('accname'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="latitude" class="control-label">Latitude</label>
                        </div>
                        <div class="col-md-8">
                            <input id="latitude" name="latitude" placeholder="latitude" type="text" class="form-control"  value="<?php echo set_value('latitude', $accrecord[0]->lat); ?>" />
                            <span class="text-danger"><?php echo form_error('latitude'); ?></span>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row colbox">
                        <div class="col-md-4">
                            <label for="longitude" class="control-label">Longitude</label>
                        </div>
                        <div class="col-md-8">
                            <input id="longitude" name="longitude" placeholder="longitude" type="text" class="form-control"  value="<?php echo set_value('longitude', $accrecord[0]->long); ?>" />
                            <span class="text-danger"><?php echo form_error('longitude'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-md-8 text-left">
                        <input id="btn_update" name="btn_update" type="submit" class="btn btn-primary" value="Update" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancel" />
                        <a href="<?php echo base_url() . "accomodation/index" ?>" class="btn btn-primary" role="button">Back</a>
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