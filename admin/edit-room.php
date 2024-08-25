<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if ($_POST['submit']) {
	$seater = $_POST['room_type'];
	$fees = $_POST['fees'];
	$id = $_GET['id'];
	$query = "update rooms set room_type=?,fees=? where id=?";
	$stmt = $mysqli->prepare($query);
	$rc = $stmt->bind_param('iii', $room_type, $fees, $id);
	$stmt->execute();
	echo "<script>alert('Room Details has been Updated successfully');</script>";
}

?>
<!doctype html>
<html lang="en" class="no-js">
	<head>
		<?php include("includes/head.php") ?>
	</head>
	<body>
		<?php include('includes/header.php'); ?>
		<div class="ts-main-content">
			<?php include('includes/sidebar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12" style="margin-top:90px;">

							<h2 class="page-title">Edit Room Details </h2>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Edit Room Details</div>
										<div class="panel-body">
											<form method="post" class="form-horizontal">
												<?php
                                                $id = $_GET['id'];
                                                $ret = "select * from rooms where id=?";
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->bind_param('i', $id);
                                                $stmt->execute();
                                                $res = $stmt->get_result();

                                                while ($row = $res->fetch_object()) {
                                                ?>
												<div class="hr-dashed"></div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Room Type </label>
													<div class="col-sm-8">
														<input type="text" name="room_type"
															value="<?php echo $row->room_type; ?>" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Room no </label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="rmno" id="rmno"
															value="<?php echo $row->room_no; ?>" disabled>
														<span class="help-block m-b-none">
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Fees (PM) </label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="fees"
															value="<?php echo $row->fees; ?>">
													</div>
												</div>


												<?php } ?>
												<div class="col-sm-8 col-sm-offset-2">

													<input class="btn btn-primary" type="submit" name="submit"
														value="Update Room Details ">
												</div>
										</div>

										</form>

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
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>

		</script>
	</body>

</html>
