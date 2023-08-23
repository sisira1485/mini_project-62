<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Edit Details</title>

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
						<h2 class="page-title">Campaign Details</h2>
						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Edit Details</div>
									<div class="panel-body">
										<?php
										include('includes/config.php');
										$id = $_GET['id'];
										$qry = "SELECT * FROM campaign WHERE id = :id";
										$result = $dbh->prepare($qry);
										$result->bindParam(':id', $id, PDO::PARAM_INT);
										$result->execute();
										while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
										?>
											<form role="form" action="editedcampaign.php" method="post">
												<div class="box-body">
													<div class="form-group">
														<label for="exampleInputEmail1">Campaign Name</label>
														<input type="text" class="form-control" name="campaignname" value="<?php echo $row['campaignname']; ?>" placeholder="Enter Campaign Name" required>
													</div>
													<div class="form-group">
														<label for="exampleInputPassword1">Organizer Name</label>
														<input type="text" class="form-control" name="organizer" value="<?php echo $row['organizer']; ?>" placeholder="Enter Organizer's Name" required>
													</div>
													<div class="form-group">
														<label for="exampleInputPassword1">Date</label>
														<input type="date" class="form-control" name="date" value="<?php echo $row['date']; ?>" placeholder="Enter Date" required>
													</div>
													<div class="form-group">
														<label for="exampleInputPassword1">Location</label>
														<input type="text" class="form-control" name="location" value="<?php echo $row['location']; ?>" placeholder="Enter Campaign Location Details" required>
													</div>
													<div class="form-group">
														<label for="exampleInputPassword1">Short Description</label>
														<input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>" placeholder="Enter Description" required>
													</div>
												</div>
												<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-4">
														<button class="btn btn-primary" name="submit" type="submit">Submit</button>
													</div>
												</div>
											</form>
										<?php
										}
										?>
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
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html>
