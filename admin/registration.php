<?php
include("controllers/RegisterController.php")
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

                            <h2 class="page-title">Student Registration </h2>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Fill all Info</div>
                                        <div class="panel-body">
                                            <form method="post" action="" class="form-horizontal">


                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">
                                                        <h4 style="color: green" align="left">Room Related info </h4>
                                                    </label>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Room no. </label>
                                                    <div class="col-sm-8">
                                                        <select name="room" id="room" class="form-control"
                                                            onChange="getroom_type(this.value);"
                                                            onBlur="checkAvailability()" required>
                                                            <option value="">Select Room</option>
                                                            <?php $query = "SELECT * FROM rooms";
                                                            $stmt2 = $mysqli->prepare($query);
                                                            $stmt2->execute();
                                                            $res = $stmt2->get_result();
                                                            while ($row = $res->fetch_object()) {
                                                            ?>
                                                            <option value="<?php echo $row->room_no; ?>">
                                                                <?php echo $row->room_no; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span id="room-availability-status"
                                                            style="font-size:12px;"></span>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">room_type</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="room_type" id="room_type"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Fees Per Month</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="fees" id="fees" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Meal Plan</label>
                                                    <div class="col-sm-8">
                                                        <input type="radio" value="0" name="mealplan" checked="checked">
                                                        Without Food
                                                        <input type="radio" value="1" name="mealplan"> With Food(2000
                                                        EPM)
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Date From</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="datefrom" id="datefrom"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Duration</label>
                                                    <div class="col-sm-8">
                                                        <select name="duration" id="duration" class="form-control">
                                                            <option value="">Select Duration in Month</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>

                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">
                                                        <h4 style="color: green" align="left">Personal info </h4>
                                                    </label>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Admission</label>
                                                    <div class="col-sm-8">
                                                        <select name="course" id="course" class="form-control" required>
                                                            <option value="">Admit status</option>
                                                            <?php $query = "SELECT * FROM admittedtable";
                                                            $stmt2 = $mysqli->prepare($query);
                                                            $stmt2->execute();
                                                            $res = $stmt2->get_result();
                                                            while ($row = $res->fetch_object()) {
                                                            ?>
                                                            <option value="<?php echo $row->decision; ?>">
                                                                <?php echo $row->decision; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Registration No : </label>
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
                                                    <label class="col-sm-2 control-label">Email : </label>
                                                    <div class="col-sm-8">
                                                        <input type="emailaddr" name="emailaddr" id="emailaddr"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Emergency Contact: </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="econtact" id="econtact"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Parent Name : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="parent" id="parent"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Parent Relation : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="prelation" id="prelation"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Parent Contact no : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="pcontact" id="pcontact"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">
                                                        <h4 style="color: green" align="left">address </h4>
                                                    </label>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">address : </label>
                                                    <div class="col-sm-8">
                                                        <textarea rows="5" name="addr" id="addr" class="form-control"
                                                            required="required"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">City : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="city" id="city" class="form-control"
                                                            required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">State </label>
                                                    <div class="col-sm-8">
                                                        <select name="state" id="state" class="form-control" required>
                                                            <option value="">Select State</option>
                                                            <?php $query = "SELECT * FROM states";
                                                            $stmt2 = $mysqli->prepare($query);
                                                            $stmt2->execute();
                                                            $res = $stmt2->get_result();
                                                            while ($row = $res->fetch_object()) {
                                                            ?>
                                                            <option value="<?php echo $row->State; ?>">
                                                                <?php echo $row->State; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">postcode : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="postcode" id="postcode"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">
                                                        <h4 style="color: green" align="left">Student Health Records
                                                        </h4>
                                                    </label>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label">Vaccinated ? </label>
                                                    <div class="col-sm-4">
                                                        <input type="checkbox" name="adcheck" value="" />
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Health Status </label>
                                                    <div class="col-sm-8">
                                                        <select name="health_status" id="pstate" class="form-control"
                                                            required>
                                                            <option value="">Select Status</option>
                                                            <?php $query = "SELECT * FROM healthrecordstable";
                                                            $stmt2 = $mysqli->prepare($query);
                                                            $stmt2->execute();
                                                            $res = $stmt2->get_result();
                                                            while ($row = $res->fetch_object()) {
                                                            ?>
                                                            <option value="<?php echo $row->health_status; ?>">
                                                                <?php echo $row->health_status; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Health record : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="health_record" id="hr"
                                                            class="form-control">
                                                    </div>
                                                </div>


                                                <div class="col-sm-6 col-sm-offset-4">
                                                    <input type="submit" name="submit" Value="Register Student"
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
    <script type="text/javascript">
    $(document).ready(function() {
        $('input[type="checkbox"]').click(function() {
            if ($(this).prop("checked") == true) {
                $('#health_record').val($('#addr').val());
                $('#vaccinated').val($('#city').val());
                $('#pstate').val($('#state').val());
                $('#postcode').val($('#postcode').val());
            }

        });
    });
    </script>
    <script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'roomno=' + $("#room").val(),
            type: "POST",
            success: function(data) {
                $("#room-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>


</html>
