<?php 

session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$emailaddr=$_POST['emailaddr'];
$password=$_POST['password'];
// $newpassword = md5($password);

$query="insert into  userRegistration(regNo,firstName,lastName,gender,contactNo,emailaddr,password) values(?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('isssiss',$regno,$fname,$lname,$gender,$contactno,$emailaddr,$password);
$stmt->execute();
echo"<script>alert('Student registered successfully');</script>";
}

?>