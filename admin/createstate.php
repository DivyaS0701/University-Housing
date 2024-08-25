<?php
include("controllers/StateController.php");
?>
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
                        <div class="col-md-12">

                            <h2 class="page-title">Add states </h2>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Add states</div>
                                        <div class="panel-body">
                                            <form method="post" class="form-horizontal">

                                                <div class="hr-dashed"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">State </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" value="" name="State" class="form-control"
                                                            required>
                                                    </div>
                                                </div>


                                                <div class="col-sm-8 col-sm-offset-2">

                                                    <input class="btn btn-primary" type="submit" name="submit"
                                                        value="Add state">
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