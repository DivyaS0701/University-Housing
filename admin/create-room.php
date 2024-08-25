<?php
include("controllers/RoomController.php")
?>
<!doctype html>
<html lang="en" class="no-js">
    <head>
        <?php
        include("includes/head.php");
        ?>
    </head>
    <body>
        <?php include('includes/header.php'); ?>
        <div class="ts-main-content">
            <?php include('includes/sidebar.php'); ?>
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12" style="margin-top:90px;">

                            <h2 class="page-title">Add a Room </h2>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Add a Room</div>
                                        <div class="panel-body">
                                            <?php if (isset($_POST['submit'])) { ?>
                                            <p style="color: green">
                                                <?php echo ($_SESSION['msg']); ?><?php echo ($_SESSION['msg'] = ""); ?>
                                            </p>
                                            <?php } ?>
                                            <form method="post" class="form-horizontal">

                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Select room_type </label>
                                                    <div class="col-sm-8">
                                                        <Select name="room_type" class="form-control" required>
                                                            <option value="">Select Seater</option>
                                                            <option value="1">Single Seater</option>
                                                            <option value="2">Two Seater</option>
                                                            <option value="3">Three Seater</option>
                                                            <option value="4">Four Seater</option>
                                                            <option value="5">Five Seater</option>
                                                        </Select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Room No.</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="rmno" id="rmno"
                                                            value="" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Fee(Per Student)</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="fees" id="fees"
                                                            value="" required="required">
                                                    </div>
                                                </div>

                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <input class="btn btn-primary" type="submit" name="submit"
                                                        value="Create Room ">
                                                </div>
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
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/fileinput.js"></script>
        <script src="js/chartData.js"></script>
        <script src="js/main.js"></script>
        </script>
    </body>

</html>
