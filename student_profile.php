<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
$aid = $_SESSION['id'];
if (isset($_POST['update'])) {
    $regno = $_POST['regno'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $contactno = $_POST['contact'];
    $udate = date('d-m-Y h:i:s', time());
    $query = "update  userRegistration set regNo=?,firstName=?,lastName=?,gender=?,contactNo=?,updationDate=? where id=?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssisi', $regno, $fname,$lname, $gender, $contactno, $udate, $aid);
    $stmt->execute();
    echo "<script>alert('Profile updated Succssfully');</script>";
}
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
                    <?php
                    $aid = $_SESSION['id'];
                    $ret = "select * from userregistration where id=?";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->bind_param('i', $aid);
                    $stmt->execute();
                    $res = $stmt->get_result();

                    while ($row = $res->fetch_object()) {
                    ?>
                    <div class="row">
                        <div class="col-md-12" style="margin-top:90px;">
                            

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" >

                                            Last Updation date : &nbsp; <?php echo $row->updationDate; ?>
                                        </div>


                                        <div class="panel-body">
                                            <form method="post" action="" name="registration" class="form-horizontal"
                                                onSubmit="return valid();">



                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Registration No : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="regno" id="regno" class="form-control"
                                                            required="required" value="<?php echo $row->regNo; ?>">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">First Name : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="fname" id="fname" class="form-control"
                                                            value="<?php echo $row->firstName; ?>" required="required">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Last Name : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="lname" id="lname" class="form-control"
                                                            value="<?php echo $row->lastName; ?>" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Gender : </label>
                                                    <div class="col-sm-8">
                                                        <select name="gender" class="form-control" required="required">
                                                            <option value="<?php echo $row->gender; ?>">
                                                                <?php echo $row->gender; ?></option>
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
                                                            class="form-control" maxlength="10"
                                                            value="<?php echo $row->contactNo; ?>" required="required">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Email: </label>
                                                    <div class="col-sm-8">
                                                        <input type="email" name="emailaddr" id="email"
                                                            class="form-control" value="<?php echo $row->emailaddr; ?>"
                                                            readonly>
                                                        <span id="user-availability-status"
                                                            style="font-size:12px;"></span>
                                                    </div>
                                                </div>
                                                <?php } ?>





                                                <div class="col-sm-6 col-sm-offset-4">

                                                    <input type="submit" name="update" Value="Update Profile"
                                                        class="btn btn-primary">
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
    <script type="text/javascript">
        $( document ).ready( function () {
            $( 'input[type="checkbox"]' ).click( function () {
                if ( $( this ).prop( "checked" ) == true ) {
                    $( '#paddress' ).val( $( '#address' ).val() );
                    $( '#pcity' ).val( $( '#city' ).val() );
                    $( '#pstate' ).val( $( '#state' ).val() );
                    $( '#ppincode' ).val( $( '#pincode' ).val() );
                }

            } );
        } );
    </script>
    <script>
        function checkAvailability() {

            $( "#loaderIcon" ).show();
            jQuery.ajax( {
                url: "check_availability.php",
                data: 'emailid=' + $( "#email" ).val(),
                type: "POST",
                success: function ( data ) {
                    $( "#user-availability-status" ).html( data );
                    $( "#loaderIcon" ).hide();
                },
                error: function () { }
            } );
        }
    </script>

</html>
