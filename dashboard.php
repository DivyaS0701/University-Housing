<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

?>
<!doctype html>
<html lang="en" class="no-js">

    <head>
        <?php include("includes/head.php")?>
    </head>

    <body>
        <?php include("includes/header.php"); ?>

        <div class="ts-main-content">
            <?php include("includes/sidebar.php"); ?>
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12" style="margin-top:70px;">


                            <div class="container" style="margin-top: 15px;">
                                <h2 class="page-title">Dashboard</h2>
                            </div>

                            <div class="row">
                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3" style="margin: 20px;" >
                                                <div class="card" style="width: 18rem;">
                                                    <img class="card-img-top" src="img/prof.png" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Profile Settings</h5>
                                                        <p class="card-text">Hey You can manage your Profile settings.
                                                        </p>
                                                        <a style="border-radius: 30%; background-color: green;"
                                                            href="student_profile.php"
                                                            class="btn btn-primary">Profile</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3" style="margin:20px;" >
                                                <div class="card " style="width: 18rem;">
                                                    <img class="card-img-top" src="img/room.jpeg" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Manage Room</h5>
                                                        <p class="card-text">manage rooms from here!!.</p>
                                                        <a style="border-radius: 30%; background-color: green;"
                                                            href="room-details.php" class="btn btn-primary">My Room</a>
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