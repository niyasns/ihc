<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events List </title>
    <!--link the bootstrap css file-->
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

</head>
<body>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-11 ">
            <table class="table table-striped table-hover">
                <thead>
                <tr class="bg-primary">
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Time Start </th>
                    <th>Time End</th>
                    <th>Venue</th>
                    <th>Date</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($events_list); $i++) { ?>
                    <tr>
                        <td><?php echo $events_list[$i]->id; ?></td>
                        <td><?php echo $events_list[$i]->name; ?></td>
                        <td><?php echo $events_list[$i]->time_start; ?></td>
                        <td><?php echo $events_list[$i]->time_end; ?></td>
                        <td><?php echo $events_list[$i]->venue_name; ?></td>
                        <td><?php echo $events_list[$i]->date; ?></td>
                        <td><a href="<?php echo base_url() . "/events/update/" . $events_list[$i]->id; ?>">Update</a></td>
                        <td><a href="<?php echo base_url() . "/events/delete/" . $events_list[$i]->id; ?>">Delete</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>