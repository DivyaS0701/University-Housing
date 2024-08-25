<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if (isset($_GET['del'])) {
    $id = intval($_GET['del']);
    $adn = "delete from registration where id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    echo "<script>alert('Data Deleted');</script>";
}
?>
<!doctype html>
<html lang="en" class="no-js">

    <head>
        
       <?php include('includes/head.php')?>

    </head>

    <body>
        <?php include('includes/header.php'); ?>

        <div class="ts-main-content">
            <?php include('includes/sidebar.php'); ?>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12" style="margin-top:90px;">
                            <h2 class="page-title">Manage Rooms</h2>
                            <div class="panel panel-default">
                                <div class="panel-heading">All Room Details</div>
                                <div class="panel-body">
                                    <table id="zctb" class="display table table-striped table-bordered table-hover"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student Name</th>
                                                <th>Admission</th>
                                                <th>Contact no </th>
                                                <th>Room No </th>
                                                <th>Room Type </th>
                                                <th>Dated From </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $aid = $_SESSION['id'];
                                            $ret = "SELECT * FROM registration";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute();
                                            $res = $stmt->get_result();
                                            $cnt = 1;
                                            while ($row = $res->fetch_object()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $cnt;
                                                ; ?></td>
                                                <td><?php echo $row->firstName; ?><?php echo $row->lastName; ?></td>
                                                <td><?php echo $row->regno; ?></td>
                                                <td><?php echo $row->contactno; ?></td>
                                                <td><?php echo $row->roomno; ?></td>
                                                <td><?php echo $row->room_type; ?></td>
                                                <td><?php echo $row->datefrom; ?></td>
                                                <td>

                                                    <a href="manage-students.php?del=<?php echo $row->id; ?>"
                                                        title="are you sure to delete this record?" onclick="return confirm("
                                                        Do you want to delete");"> <i class="fa fa-close"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                                $cnt = $cnt + 1;
                                            } ?>


                                        </tbody>
                                    </table>


                                </div>
                            </div>


                        </div>
                    </div>



                </div>
            </div>
        </div>

        <!-- Loading Scripts -->
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
