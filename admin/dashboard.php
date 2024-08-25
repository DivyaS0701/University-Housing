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
        <?php include("includes/header.php"); ?>

        <div class="ts-main-content">
            <?php include("includes/sidebar.php"); ?>
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12" style="margin-top:90px;">

                            <div class="container" style="margin-top: 20px;">
                                <h2 class="page-title">Admin Dashboard</h2>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card" style="width: 18rem;">
                                                <div class="card-img-top" src="..." alt="Card image cap">
                                                    <div class="card-body">

                                                        <?php
                                                        $result = "SELECT count(*) FROM registration ";
                                                        $stmt = $mysqli->prepare($result);
                                                        $stmt->execute();
                                                        $stmt->bind_result($count);
                                                        $stmt->fetch();
                                                        $stmt->close();
                                                        ?>

                                                        <div class="text-center d-flex ">
                                                            <h1><?php echo $count; ?><br> Students</h1>
                                                        </div>

                                                    </div>
                                                </div>
                                                <a href="manage-students.php" class="btn btn-dark"
                                                    style="border-radius: 30%;">Full
                                                    Detail </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-img-top">
                                                    <div class="card-body">
                                                        <?php
                                                        $result1 = "SELECT count(*) FROM rooms ";
                                                        $stmt1 = $mysqli->prepare($result1);
                                                        $stmt1->execute();
                                                        $stmt1->bind_result($count1);
                                                        $stmt1->fetch();
                                                        $stmt1->close();
                                                        ?>
                                                        <div class="stat-panel-number h1 "><?php echo $count1; ?></div>
                                                        <div class="stat-panel-title text-uppercase">Total Rooms </div>
                                                    </div>
                                                </div>
                                                <a href="manage-rooms.php" class="btn btn-dark text-center"
                                                    style="border-radius: 30%;">See All
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-img-top">
                                                    <div class="card-body">
                                                        <?php
                                                        $result2 = "SELECT count(*) FROM courses ";
                                                        $stmt2 = $mysqli->prepare($result2);
                                                        $stmt2->execute();
                                                        $stmt2->bind_result($count2);
                                                        $stmt2->fetch();
                                                        $stmt2->close();
                                                        ?>
                                                        <div class="stat-panel-number h1 "><?php echo $count2; ?></div>
                                                        <div class="stat-panel-title text-uppercase">Total Courses</div>
                                                    </div>
                                                </div>
                                                <a href="manage-courses.php" class="btn btn-dark text-center"
                                                    style="border-radius: 30%;">See All &nbsp; </a>
                                            </div>
                                        </div>



                                    </div>
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




    <style>
    .foot {
        text-align: center;
        border: 1px solid black;
    }
    </style>

</html>