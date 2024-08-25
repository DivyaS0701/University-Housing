<?php
require_once("includes/config.php");
if (!empty($_POST["emailaddr"])) {
	$emailaddr = $_POST["emailaddr"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

		echo "error : You did not enter a valid email.";
	} else {
		$result = "SELECT count(*) FROM userRegistration WHERE emailaddr=?";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('s', $emailaddr);
		$stmt->execute();
		$stmt->bind_result($count);
		$stmt->fetch();
		$stmt->close();
		if ($count > 0) {
			echo "<span style='color:red'> Oops! That Email already exist in our database please try again .</span>";
		} else {
			echo "<span style='color:green'> Yeeeah!! That Email is available for registration .</span>";
		}
	}
}

if (!empty($_POST["oldpassword"])) {
	$pass = $_POST["oldpassword"];
	$result = "SELECT password FROM userregistration WHERE password=?";
	$stmt = $mysqli->prepare($result);
	$stmt->bind_param('s', $pass);
	$stmt->execute();
	$stmt->bind_result($result);
	$stmt->fetch();
	$opass = $result;
	if ($opass == $pass)
		echo "<span style='color:green'> Great Password</span>";
	else
		echo "<span style='color:red'> Password doesnt matched</span>";
}


if (!empty($_POST["roomno"])) {
	$roomno = $_POST["roomno"];
	$result = "SELECT count(*) FROM registration WHERE roomno=?";
	$stmt = $mysqli->prepare($result);
	$stmt->bind_param('i', $roomno);
	$stmt->execute();
	$stmt->bind_result($count);
	$stmt->fetch();
	$stmt->close();
	if ($count > 0)
		echo "<span style='color:red'>$count Seat already taken.</span>";
	else
		echo "<span style='color:green'>All Seats are Available</span>";
}
?>