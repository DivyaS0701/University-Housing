<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
    $room_type = $_POST['room_type'];
    $roomno = $_POST['rmno'];
    $fees = $_POST['fees'];
    $sql = "SELECT room_no FROM rooms where room_no=?";
    $stmt1 = $mysqli->prepare($sql);
    $stmt1->bind_param('i', $roomno);
    $stmt1->execute();
    $stmt1->store_result();
    $row_cnt = $stmt1->num_rows;
    ;
    if ($row_cnt > 0) {
        echo "<script>alert('Room already exist');</script>";
    } else {
        $query = "insert into  rooms (room_type,room_no,fees) values(?,?,?)";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('iii', $room_type, $roomno, $fees);
        $stmt->execute();
        echo "<script>alert('Room has been added successfully');</script>";
    }
}

?>
