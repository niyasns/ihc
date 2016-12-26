<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue List</title>
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
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped table-hover">
                <thead>
                <tr class="bg-primary">
                    <th>ID</th>
                    <th>Venue Name</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($venue_list); $i++) { ?>
                    <tr>
                        <td><?php echo $venue_list[$i]->id; ?></td>
                        <td><?php echo $venue_list[$i]->name; ?></td>
                        <td><?php echo $venue_list[$i]->lat; ?></td>
                        <td><?php echo $venue_list[$i]->long; ?></td>
                        <td><a href="<?php echo base_url() . "venues/update/" . $venue_list[$i]->id; ?>">Update</a></td>
                        <td><a href="<?php echo base_url() . "venues/index/" . $venue_list[$i]->id; ?>">Delete</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>