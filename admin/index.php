<?php
include("controllers/AdminLoginController.php")
?>

<!doctype html>
<html>
    <head>
        <?php include("includes/head.php") ?>
    </head>
    <body>

        <div class="login-page bk-img" style="background-image: url(img/login-bg.jpg);">
            <div class="form-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h1 class="text-center text-bold text-light mt-4x"
                                style="background-color:black; border-radius: 20%;">Admin Area</h1>
                            <div class="well row pt-2x pb-3x bk-light">
                                <div class="col-md-8 col-md-offset-2">
                                    <form method="post" novalidate>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email | Username</label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Enter username" required>
                                            <small id="emailHelp" class="form-text text-muted">We'll never share
                                                your email with anyone else.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password" class="form-control" name="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me
                                                out</label>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                                    </form>

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