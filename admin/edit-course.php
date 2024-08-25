<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if ($_POST['submit']) {
	$coursecode = $_POST['cc'];
	$coursesn = $_POST['cns'];
	$coursefn = $_POST['cnf'];
	$id = $_GET['id'];
	$query = "update courses set course_code=?,course_sn=?,course_fn=? where id=?";
	$stmt = $mysqli->prepare($query);
	$rc = $stmt->bind_param('sssi', $coursecode, $coursesn, $coursefn, $id);
	$stmt->execute();
	echo "<script>alert('Course has been Updated successfully');</script>";
}

?>
<!doctype html>
<html lang="en" class="no-js">
	<head>
		<?php include("includes/head.php") ?>
		<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
		<script type="text/javascript" src="js/validation.min.js"></script>
	</head>
	<body>
		<?php include('includes/header.php'); ?>
		<div class="ts-main-content">
			<?php include('includes/sidebar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12" style="margin-top:90px;">

							<h2 class="page-title">Edit Course </h2>

							<div class="row">
								<div class="col-md-12" >
									<div class="panel panel-default">
										<div class="panel-heading">Edit courses</div>
										<div class="panel-body">
											<form method="post" class="form-horizontal">
												<?php
                                                $id = $_GET['id'];
                                                $ret = "select * from courses where id=?";
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->bind_param('i', $id);
                                                $stmt->execute(); //ok
                                                $res = $stmt->get_result();
                                                //$cnt=1;
                                                while ($row = $res->fetch_object()) {
                                                ?>
												<div class="hr-dashed"></div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Course Code </label>
													<div class="col-sm-8">
														<input type="text" name="cc"
															value="<?php echo $row->course_code; ?>"
															class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Course Name (Short)</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="cns" id="cns"
															value="<?php echo $row->course_sn; ?>" required="required">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Course Name(Full)</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="cnf"
															value="<?php echo $row->course_fn; ?>">
													</div>
												</div>


												<?php } ?>
												<div class="col-sm-8 col-sm-offset-2">

													<input class="btn btn-primary" type="submit" name="submit"
														value="Update Course">
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
