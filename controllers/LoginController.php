<?php 
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
// $encpass = md5($password);
$stmt=$mysqli->prepare("SELECT emailaddr,password,id FROM userregistration WHERE emailaddr=? and password=? ");
	$stmt->bind_param('ss',$email,$password);
	$stmt->execute();
	$stmt -> bind_result($email,$password,$id);
	$rs=$stmt->fetch();
	$stmt->close();
	$_SESSION['id']=$id;
	$_SESSION['login']=$email;
	$uip=$_SERVER['REMOTE_ADDR'];
	$ldate=date('d/m/Y h:i:s', time());
	if($rs)
		{
    $uid=$_SESSION['id'];
    $uemail=$_SESSION['login'];
include("./includes/geoplugin.php");
if($log)
{
header("location:dashboard.php");
				}
}else{
	echo "<script>alert('Invalid Email or password. please try again!!');</script>";
		}
		  }


?>