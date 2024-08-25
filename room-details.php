<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>
<!doctype html>
<html lang="en" class="no-js">

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
                            <h2 class="page-title">Rooms Details</h2>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table id="zctb" class="table table-bordered " cellspacing="0" width="100%">


                                        <tbody>
                                            <?php
                                            $aid = $_SESSION['login'];
                                            $ret = "select * from registration where emailaddr=?";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->bind_param('s', $aid);
                                            $stmt->execute();
                                            $res = $stmt->get_result();
                                            $cnt = 1;
                                            while ($row = $res->fetch_object()) {
                                            ?>

                                            <tr>
                                                <td colspan="4">
                                                    <h4>Room Details</h4>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="6"><b>Reg Date. :<?php echo $row->postingDate; ?></b></td>
                                            </tr>



                                            <tr>
                                                <td><b>Room no :</b></td>
                                                <td><?php echo $row->roomno; ?></td>
                                                <td><b>Room Type :</b></td>
                                                <td><?php echo $row->room_type; ?></td>
                                                <td><b>Accomodation Fee :</b></td>
                                                <td><?php echo $fpm = $row->fees; ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Meal Plan:</b></td>
                                                <td>
                                                    <?php if ($row->mealplan == 0) {
                                                    echo "Food Excluded";
                                                } else {
                                                    echo "Food Included";
                                                }
                                                ; ?></td>
                                                <td><b>Dated From :</b></td>
                                                <td><?php echo $row->datefrom; ?></td>
                                                <td><b>Duration:</b></td>
                                                <td><?php echo $dr = $row->duration; ?> Months</td>
                                            </tr>

                                            <tr>
                                                <td colspan="6"><b>Total Fee :
                                                        <?php if ($row->mealplan == 1) {
                                                    $fd = 2000;
                                                    echo (($dr * $fpm) +( $fd*$dr));
                                                } else {
                                                    echo $dr * $fpm;
                                                }
                                                        ?></b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <h4>Personal Info Info</h4>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><b>Reg No. :</b></td>
                                                <td><?php echo $row->regno; ?></td>
                                                <td><b>Full Name :</b></td>
                                                <td><?php echo $row->firstName; ?><?php echo $row->lastName; ?>
                                                </td>
                                                <td><b>Email :</b></td>
                                                <td><?php echo $row->emailaddr; ?></td>
                                            </tr>


                                            <tr>
                                                <td><b>Contact No. :</b></td>
                                                <td><?php echo $row->contactno; ?></td>
                                                <td><b>Gender :</b></td>
                                                <td><?php echo $row->gender; ?></td>
                                                <td><b>Health Record :</b></td>
                                                <td><?php echo $row->health_record; ?></td>
                                            </tr>


                                            <tr>
                                                <td><b>Emergency Contact</b></td>
                                                <td><?php echo $row->econtactno; ?></td>
                                                <td><b>parent Name :</b></td>
                                                <td><?php echo $row->parent; ?></td>
                                                <td><b>parent Relation :</b></td>
                                                <td><?php echo $row->prelation; ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Parent Contact</b></td>
                                                <td colspan="6"><?php echo $row->pcontact; ?></td>
                                            </tr>

                                            <tr>
                                                <td colspan="6">
                                                    <h4>Addresses</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Addres</b></td>
                                                <td colspan="2">
                                                    <?php echo $row->addr; ?><br />
                                                    <?php echo $row->city; ?>,
                                                    <?php echo $row->postcode; ?><br />
                                                    <?php echo $row->state; ?>


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

        <!-- Scripts always position at the bottom of code -->
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
