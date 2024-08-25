<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
$ai = $_SESSION['id'];
if (isset($_POST['changepwd'])) {
	$op = $_POST['oldpassword'];
	$np = $_POST['newpassword'];
	$udate = date('d-m-Y h:i:s', time());
	;
	$sql = "SELECT password FROM userregistration where password=?";
	$chngpwd = $mysqli->prepare($sql);
	$chngpwd->bind_param('s', $op);
	$chngpwd->execute();
	$chngpwd->store_result();
	$row_cnt = $chngpwd->num_rows;
	;
	if ($row_cnt > 0) {
		$con = "update userregistration set password=?,passUdateDate=?  where id=?";
		$chngpwd1 = $mysqli->prepare($con);
		$chngpwd1->bind_param('ssi', $np, $udate, $ai);
		$chngpwd1->execute();
		$_SESSION['msg'] = "Password Changed Successfully !!";
	} else {
		$_SESSION['msg'] = "Old Password and new password didnt match !!";
	}


}
?>
<!doctype html>
<html>

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

						<h2 class="page-title">Change Password </h2>

						<div class="row">

							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">
										<?php $result = "SELECT passUdateDate FROM userregistration WHERE id=?";
                                        $stmt = $mysqli->prepare($result);
                                        $stmt->bind_param('i', $ai);
                                        $stmt->execute();
                                        $stmt->bind_result($result);
                                        $stmt->fetch(); ?>

										Last Updation Date:&nbsp;
										<?php echo $result; ?>
									</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal" name="changepwd" id="change-pwd"
											onSubmit="return valid();">
											<?php if (isset($_POST['changepwd'])) { ?>
											<p style="color: red">
												<?php echo htmlentities($_SESSION['msg']); ?>
												<?php echo htmlentities($_SESSION['msg'] = ""); ?>
											</p>
											<?php } ?>
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-4 control-label">old Password </label>
												<div class="col-sm-8">
													<input type="password" value="" name="oldpassword" id="oldpassword"
														class="form-control" onBlur="checkpass()" required="required">
													<span id="password-availability-status" class="help-block m-b-none"
														style="font-size:12px;"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">New Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="newpassword"
														id="newpassword" value="" required="required">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Confirm Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" value=""
														required="required" id="cpassword" name="cpassword">
												</div>
											</div>



											<div class="col-sm-6 col-sm-offset-4">
												<input type="submit" name="changepwd" Value="Change Password"
													class="btn btn-primary">
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

	<script>
		function checkpass() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'oldpassword=' + $("#oldpassword").val(),
				type: "POST",
				success: function (data) {
					$("#password-availability-status").html(data);
					$("#loaderIcon").hide();
				},
				error: function () { }
			});
		}
	</script>
</body>

</html>