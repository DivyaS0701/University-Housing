<?php 

session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//student & room registration
if(isset($_POST['submit']))
{
$roomno=$_POST['room'];
$room_type=$_POST['room_type'];
$feespmt=$_POST['fees'];
$mealplan=$_POST['mealplan'];
$datefrom=$_POST['datefrom'];
$duration=$_POST['duration'];
// $admission_decision=$_POST['admission_decision'];
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$emailaddr=$_POST['emailaddr'];
$emerge_cntno=$_POST['econtact'];
$parent=$_POST['parent'];
$prelation=$_POST['prelation'];
$pcontact=$_POST['pcontact'];
$addr=$_POST['addr'];
$city=$_POST['city'];
$state=$_POST['state'];
$postcode=$_POST['postcode'];
$health_record=$_POST['health_record'];

$query="INSERT INTO  registration(roomno,room_type,fees,mealplan,datefrom,duration,regno,firstName,lastName,gender,contactno,emailaddr,econtactno,parent,prelation,pcontact,addr,city,state,postcode,health_record) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('iiiisissssisissiissis',$roomno,$room_type,$feespmt,
$mealplan,$datefrom,$duration,$regno,$fname,$lname,$gender,$contactno,$emailaddr,
$emerge_cntno,$parent,$prelation,$pcontact,$addr,$city,$state,$postcode,$health_record);
$stmt->execute();
$stmt->close();


$query1="insert into  userregistration(regNo,firstName,lastName,gender,contactNo,emailaddr,password) values(?,?,?,?,?,?,?)";
$stmt1= $mysqli->prepare($query1);
$stmt1->bind_param('isssiss',$regno,$fname,$lname,$gender,$contactno,$emailaddr,$contactno);
$stmt1->execute();
echo"<script>alert('Student has been Succssfully registered');</script>";
}


 ?>