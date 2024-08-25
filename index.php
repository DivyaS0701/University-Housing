<?php include("controllers/LoginController.php") ?>

<!doctype html>
<html>
    <head>
        <?php include("includes/head.php") ?>
    </head>
    <body>
        <?php include('includes/header.php'); ?>
        <div class="ts-main-content">
            <?php include('includes/sidebar.php'); ?>
            <div class="content-wrapper bk-img " style="background-image: url(img/login-bg.jpg);">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12" style="margin-top:90px;">

                            <h2 class="page-title">Login page</h2>

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 ">
                                    <div class=" row pt-2x pb-3x bk-light">
                                        <div class="col-md-8 col-md-offset-2 ">
                                            <form method="post" novalidate>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        name="email" aria-describedby="emailHelp"
                                                        placeholder="Enter email" required>
                                                    <small id="emailHelp" class="form-text text-muted">We'll never share
                                                        your email with anyone else.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control"
                                                        id="exampleInputPassword1" name="password"
                                                        placeholder="Password" required>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Check me
                                                        out</label>
                                                </div>
                                                <button type="submit" name="login"
                                                    class="btn btn-primary">Login</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="text-center text-light" style="color:black;">
                                        <a href="forgot-password.php" style="color:green;">Reset password?</a>
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