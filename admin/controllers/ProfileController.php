<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if (isset($_POST['update'])) {
    $email = $_POST['emailid'];
    $aid = $_SESSION['id'];
    $udate = date('Y-m-d');
    $query = "update admin set email=?,updation_date=? where id=?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssi', $email, $udate, $aid);
    $stmt->execute();
    echo "<script>alert('Email id has been successfully updated');</script>";
}

if (isset($_POST['changepwd'])) {
    $op = $_POST['oldpassword'];
    $np = $_POST['newpassword'];
    $ai = $_SESSION['id'];
    $udate = date('Y-m-d');
    $sql = "SELECT password FROM admin where password=?";
    $chngpwd = $mysqli->prepare($sql);
    $chngpwd->bind_param('s', $op);
    $chngpwd->execute();
    $chngpwd->store_result();
    $row_cnt = $chngpwd->num_rows;

    if ($row_cnt > 0) {
        $con = "update admin set password=?,updation_date=?  where id=?";
        $chngpwd1 = $mysqli->prepare($con);
        $chngpwd1->bind_param('ssi', $np, $udate, $ai);
        $chngpwd1->execute();
        $_SESSION['msg'] = "Password Changed Successfully !!";
    } else {
        $_SESSION['msg'] = "Old Password not match !!";
    }


}

?>