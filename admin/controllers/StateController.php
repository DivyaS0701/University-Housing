<?php 
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$state=$_POST['State'];


$query="INSERT INTO  states (State) values(?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('s',$state);
$stmt->execute();
echo"<script>alert('State has been added successfully');</script>";
}


?>