<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if (isset($_GET['del'])) {
	$id = intval($_GET['del']);
	$adn = "delete from courses where id=?";
	$stmt = $mysqli->prepare($adn);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('oops!! your data has been deleted');</script>";
}
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
                        <div class="col-md-12" style="margin-top:90px;">
                            <h2 class="page-title">Manage Course</h2>
                            <div class="panel panel-default">
                                <div class="panel-heading">Course Details</div>
                                <div class="panel-body">
                                    <table id="zctb" class="display table table-striped table-bordered table-hover"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Code</th>
                                                <th>Course Name(Short)</th>
                                                <th>Course Name(Full)</th>
                                                <th>Reg Date </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $aid = $_SESSION['id'];
                                            $ret = "select * from courses";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute();
                                            $res = $stmt->get_result();
                                            $cnt = 1;
                                            while ($row = $res->fetch_object()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $cnt;
	                                            ; ?></td>
                                                <td><?php echo $row->course_code; ?></td>
                                                <td><?php echo $row->course_sn; ?></td>
                                                <td><?php echo $row->course_fn; ?></td>
                                                <td><?php echo $row->posting_date; ?></td>
                                                <td><a href="edit-course.php?id=<?php echo $row->id; ?>"><i
                                                            class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                                    <a href="manage-courses.php?del=<?php echo $row->id; ?>"
                                                        onclick="return confirm(" are you sure you want to delete");"><i
                                                            class="fa fa-close"></i></a>
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