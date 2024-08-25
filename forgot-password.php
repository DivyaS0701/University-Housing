<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
	$emailaddr = $_POST['emailaddr'];
	$contact = $_POST['contact'];
	$stmt = $mysqli->prepare("SELECT emailaddr,contactNo,password FROM userregistration WHERE (emailaddr=? && contactNo=?) ");
	$stmt->bind_param('ss', $emailaddr, $contact);
	$stmt->execute();
	$stmt->bind_result($username, $emailaddr, $password);
	$rs = $stmt->fetch();
	if ($rs) {
		$pwd = $password;
	} else {
		echo "<script>alert('Invalid Email or password');</script>";
	}
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<?php include("includes/head.php") ?>
</head>

<body>

	<div class="login-page bk-img" style="background-image: url(img/login-bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="margin-top:90px;">
						<h1 class="text-center text-bold text-light mt-4x">Forgot Password</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<?php if (isset($_POST['login'])) { ?>
								<p>Yourr Password is
									<?php echo $pwd; ?><br> Change the Password After login
								</p>
								<?php } ?>
								<form action="" class="mt" method="post">
									<label for="" class="text-uppercase text-sm">Your Email</label>
									<input type="email" placeholder="Email" name="emailaddr" class="form-control mb">
									<label for="" class="text-uppercase text-sm">Your Contact no</label>
									<input type="text" placeholder="Contact no" name="contact" class="form-control mb">


									<input type="submit" name="login" class="btn btn-primary btn-block" value="login">
								</form>
							</div>
						</div>
						<div class="text-center text-light">
							<a href="index.php" class="text-light">Sign in?</a>
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
</body>

</html>