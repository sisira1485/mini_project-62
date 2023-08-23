<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
?>
    <!doctype html>
    <html lang="en" class="no-js">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="theme-color" content="#3e454c">

        <title>BBDMS | Admin Dashboard</title>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Font awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Sandstone Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Bootstrap Datatables -->
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <!-- Bootstrap social button library -->
        <link rel="stylesheet" href="css/bootstrap-social.css">
        <!-- Bootstrap select -->
        <link rel="stylesheet" href="css/bootstrap-select.css">
        <!-- Bootstrap file input -->
        <link rel="stylesheet" href="css/fileinput.min.css">
        <!-- Awesome Bootstrap checkbox -->
        <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
        <!-- Admin Stye -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.2.1/css/highcharts.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.2.1/highcharts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.2.1/highcharts-3d.js"></script>

    <style>
    </style>
    </head>

    <body>
        <?php include('includes/header.php'); ?>

        <div class="ts-main-content">
            <?php include('includes/leftbar.php'); ?>
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row">


                        <div class="col-md-12">
                            <h2 class="page-title">Dashboard</h2>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-body bk-primary text-light">
                                                    <div class="stat-panel text-center">
                                                        <?php
                                                        $sql = "SELECT id from tblbloodgroup";
                                                        $query = $dbh->prepare($sql);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        $bg = $query->rowCount();
                                                        ?>
                                                        <div class="stat-panel-number h1 "><?php echo htmlentities($bg); ?></div>
                                                        <div class="stat-panel-title text-uppercase">Listed Blood Groups</div>
                                                    </div>
                                                </div>
                                                <a href="manage-bloodgroup.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-body bk-success text-light">
                                                    <div class="stat-panel text-center">
                                                        <?php
                                                        $sql1 = "SELECT id from tblblooddonars";
                                                        $query1 = $dbh->prepare($sql1);
                                                        $query1->execute();
                                                        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                                                        $regbd = $query1->rowCount();
                                                        ?>
                                                        <div class="stat-panel-number h1 "><?php echo htmlentities($regbd); ?></div>
                                                        <div class="stat-panel-title text-uppercase">Registered Blood Group</div>
                                                    </div>
                                                </div>
                                                <a href="donor-list.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-body bk-info text-light">
                                                    <div class="stat-panel text-center">
                                                        <?php
                                                        $sql6 = "SELECT id from tblcontactusquery";
                                                        $query6 = $dbh->prepare($sql6);
                                                        $query6->execute();
                                                        $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
                                                        $query = $query6->rowCount();
                                                        ?>
                                                        <div class="stat-panel-number h1 "><?php echo htmlentities($query); ?></div>
                                                        <div class="stat-panel-title text-uppercase">Total Queries</div>
                                                    </div>
                                                </div>
                                                <a href="manage-conactusquery.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="panel panel-danger">
                                                <div class="panel-body bk-info text-light">
                                                    <div class="stat-panel text-center">
                                                        <?php
                                                        $sql6 = "SELECT ID  from tblbloodrequirer";
                                                        $query6 = $dbh->prepare($sql6);
                                                        $query6->execute();
                                                        $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
                                                        $totalrequests = $query6->rowCount();
                                                        ?>
                                                        <div class="stat-panel-number h1 "><?php echo htmlentities($totalrequests); ?></div>
                                                        <div class="stat-panel-title text-uppercase">Total Blood Requests Received</div>
                                                    </div>
                                                </div>
                                                <a href="requests-received.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                        </div>

                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Loading Scripts -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/fileinput.js"></script>
        <script src="js/main.js"></script>

        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       <!-- Include the Highcharts library -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<!-- Add a container for the chart -->
<div id="pie-chart-container"></div>

<!-- Create the chart using Highcharts -->
 <script>
        // Define a custom color palette
     
        // Define a custom dark color palette
        var colors = ['#242424', '#484848', '#696969', '#909090', '#B6B6B6', '#DADADA', '#F4F4F4'];

        // Fetch blood group data from the server
        $.ajax({
            url: 'fetch-bloodgroup-data.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var bloodGroups = [];
                var bloodGroupCounts = [];

                // Extract blood group and count values from the data
                for (var i in data) {
                    bloodGroups.push(data[i].BloodGroup);
                    bloodGroupCounts.push(data[i].Count);
                }

                // Create the pie chart with custom colors
                Highcharts.chart('pie-chart-container', {
                    chart: {
                        type: 'pie',
                        options3d: {
                            height:200,
                            weight:200,
                            enabled: true,
                            alpha: 45,
                            beta: 0
                        }
                    },
                    title: {
                        text: 'Blood Group Distribution'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            height:200,
                            weight:200,
                            depth: 35,
                            dataLabels: {
                                enabled: true,
                                format: '{point.name}: {point.percentage:.1f}%'
                            },
                            colors: colors // Apply the custom color palette
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Blood Group Distribution',
                        data: bloodGroups.map(function(group, index) {
                            return {
                                name: group,
                                y: bloodGroupCounts[index]
                            };
                        })
                    }]
                });
            }
        });
    </script>


    </body>

    </html>
<?php } ?>
