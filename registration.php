<?php include("controllers/RegisterController.php"); ?>

<!doctype html>
<html lang="en" class="no-js">
    <head>
        <?php include("includes/head.php")?>
    </head>
    <body>
        <?php include('includes/header.php');?>
        <div class="ts-main-content">
            <?php include('includes/sidebar.php');?>
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12" style="margin-top:90px;">

                            <h2 class="page-title">Student Registration Form </h2>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Kindly Fill your Details</div>
                                        <div class="panel-body">
                                            <form method="post" action="" name="registration" class="form-horizontal"
                                                onSubmit="return valid();">



                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Admission No : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="regno" id="regno" class="form-control"
                                                            required="required">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">First Name : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="fname" id="fname" class="form-control"
                                                            required="required">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Last Name : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="lname" id="lname" class="form-control"
                                                            required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Gender : </label>
                                                    <div class="col-sm-8">
                                                        <select name="gender" class="form-control" required="required">
                                                            <option value="">Select Gender</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Contact No : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="contact" id="contact"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Email: </label>
                                                    <div class="col-sm-8">
                                                        <input type="email" name="emailaddr" id="email"
                                                            class="form-control" onBlur="checkAvailability()"
                                                            required="required">
                                                        <span id="user-availability-status"
                                                            style="font-size:12px;"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Password: </label>
                                                    <div class="col-sm-8">
                                                        <input type="password" name="password" id="password"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Confirm Password : </label>
                                                    <div class="col-sm-8">
                                                        <input type="password" name="cpassword" id="cpassword"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>




                                                <div class="col-sm-6 col-sm-offset-4">
                                                    
                                                    <input type="submit" name="submit" Value="Register"
                                                        class="btn btn-dark">
                                                </div>
                                            </form>

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
    <?php include("scripts/registerscript.js")?>

</html>
