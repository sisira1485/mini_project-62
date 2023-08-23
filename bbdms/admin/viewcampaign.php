<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['hidden'])) {
		$qry = "select * from campaign";
		$result = $dbh->query($qry);
		echo "<table border='2' id='donor'>
				<tr>
					<th>ID</th>
					<th>Name of Campaign</th>
					<th>Name of Organizer</th>
					<th>Campaign Date</th>
					<th>Locations</th>
					<th>Short Description</th>
				</tr>";
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>
					<td>" . $row['id'] . "</td>
					<td>" . $row['campaignname'] . "</td>
					<td>" . $row['organizer'] . "</td>
					<td>" . $row['date'] . "</td>
					<td>" . $row['location'] . "</td>
					<td>" . $row['description'] . "</td>
				</tr>";
		}
		echo "</table>";
	}
}
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

	<title>BBDMS | Campaign </title>

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
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
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
						<h2 class="page-title">Campaigns</h2>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">View Campaigns</div>
							<a href="download-records.php" style="font-size:16px;" class="btn btn-info">Download Campaign List</a>
							<div class="panel-body">
								<?php if ($error) { ?>
									<div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
								<?php } else if ($msg) { ?>
									<div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
								<?php } ?>

								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>ID</th>
											<th>Name of Campaign</th>
											<th>Name of Organizer</th>
											<th>Campaign Date</th>
											<th>Locations</th>
											<th>Description</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = "SELECT * FROM campaign";
										$query = $dbh->prepare($sql);
										$query->execute();
										$results = $query->fetchAll(PDO::FETCH_OBJ);
										$cnt = 1;
										if ($query->rowCount() > 0) {
											foreach ($results as $result) {
												?>
												<tr>
													<td><?php echo htmlentities($cnt); ?></td>
													<td><?php echo htmlentities($result->id); ?></td>
													<td><?php echo htmlentities($result->campaignname); ?></td>
													<td><?php echo htmlentities($result->organizer); ?></td>
													<td><?php echo htmlentities($result->date); ?></td>
													<td><?php echo htmlentities($result->location); ?></td>
													<td><?php echo htmlentities($result->description); ?></td>
												</tr>
												<?php $cnt = $cnt + 1;
											}
										} ?>
									</tbody>
								</table>
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
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
