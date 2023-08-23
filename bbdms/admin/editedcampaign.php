<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Blood Donor</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

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
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body class="theme-red">
<?php include('includes/header.php');?> 
<div class="ts-main-content"> 
<?php include('includes/leftbar.php');?>
 <div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Donors</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Message</div>
	
							<div class="panel-body">
                            <?php
           include('includes/config.php');                 
$campaignname = $_POST["campaignname"];    
$organizer = $_POST["organizer"];
$date = $_POST["date"];
$location = $_POST["location"];
$description = $_POST["description"];
$id=$_POST['id'];
//update query
$qry = "UPDATE campaign SET campaignname=:campaignname, organizer=:organizer, date=:date, location=:location, description=:description WHERE id=:id";
$stmt = $dbh->prepare($qry);
$stmt->bindParam(':campaignname', $campaignname);
$stmt->bindParam(':organizer', $organizer);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':id', $id);
$result = $stmt->execute();

if (!$result) {
    $errorInfo = $stmt->errorInfo();
    echo "ERROR: " . $errorInfo[2];
}
else {
    echo"<h1>Campaign Edited Successfully<h1>";
    // header ("Location:editdonor.php");

}
?>
</div>
    </div>
    </div>
    </div>

  <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>