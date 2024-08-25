<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>
<!doctype html>
<html>

    <head>
        
        <?php include("includes/head.php") ?>
        
    </head>

    <body>
        <?php include('includes/header.php'); ?>

        <div class="ts-main-content">
            <?php include('includes/sidebar.php'); ?>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default " style="margin-top:90px;">
                                <div class="panel-heading ">User Access Logs</div>
                                <div class="panel-body">
                                    <table id="zctb" class="display table table-striped table-bordered table-hover"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User Id</th>
                                                <th>User Email</th>
                                                <th>IP</th>
                                                <th>Login Time</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $aid = $_SESSION['id'];
                                            $ret = "CALL `getStudentlog`();";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute();
                                            $res = $stmt->get_result();
                                            $cnt = 1;
                                            while ($row = $res->fetch_object()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $cnt;
	                                            ; ?></td>
                                                <td><?php echo $row->userId; ?></td>
                                                <td><?php echo $row->userEmail; ?></td>
                                                <td><?php echo $row->userIp; ?></td>
                                                <td><?php echo $row->loginTime; ?></td>
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