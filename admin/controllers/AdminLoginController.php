<?php 
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	// $newpass = md5($password);
	$stmt = $mysqli->prepare("SELECT username,email,password,id FROM admin WHERE (userName=?|| email=?) and password=? ");
	$stmt->bind_param('sss', $username, $username, $password);
	$stmt->execute();
	$stmt->bind_result($username, $username, $password, $id);
	$rs = $stmt->fetch();
	$_SESSION['id'] = $id;
	$uip = $_SERVER['REMOTE_ADDR'];
	$ldate = date('d/m/Y h:i:s', time());
	if ($rs) {

		header("location:admin-profile.php");
	} else {
		echo "<script>alert('Invalid Username or password contact sys admin for help');</script>";
	}
}

?>
