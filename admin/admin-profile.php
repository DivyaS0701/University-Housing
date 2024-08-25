<?php
include("controllers/ProfileController.php")

    ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <?php

        include('includes/head.php');
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

                        <h2 class="page-title">Admin Profile</h2>
                        <?php
                            $aid = $_SESSION['id'];
                            $ret = "select * from admin where id=?";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->bind_param('i', $aid);
                            $stmt->execute();
                            $res = $stmt->get_result();

                            while ($row = $res->fetch_object()) {
                            ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Admin profile details</div>
                                    <div class="panel-body">
                                        <form method="post" class="form-horizontal">

                                            <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Username </label>
                                                <div class="col-sm-10">
                                                    <input type="text" value="<?php echo $row->username; ?>" disabled
                                                        class="form-control"><span class="help-block m-b-none">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="emailid" id="emailid"
                                                        value="<?php echo $row->email; ?>" required="required">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Reg Date</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $row->reg_date; ?>" disabled>
                                                </div>
                                            </div>



                                            <div class="col-sm-8 col-sm-offset-2">

                                                <input style="border-radius:30%;" class="btn btn-primary" type="submit"
                                                    name="update" value="Update Profile">
                                            </div>
                                    </div>

                                    </form>

                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Change Password</div>
                                    <div class="panel-body">
                                        <form method="post" class="form-horizontal" name="changepwd" id="change-pwd"
                                            onSubmit="return valid();">

                                            <?php if (isset($_POST['changepwd'])) { ?>

                                            <p style="color: green">
                                                <?php echo ($_SESSION['msg']); ?>
                                                <?php echo ($_SESSION['msg'] = ""); ?>
                                            </p>
                                            <?php } ?>
                                            <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Current Password </label>
                                                <div class="col-sm-8">
                                                    <input type="password" value="" name="oldpassword" id="oldpassword"
                                                        class="form-control" onBlur="checkpass()" required="required">
                                                    <span id="password-availability-status" class="help-block m-b-none"
                                                        style="font-size:12px;"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">New Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="newpassword"
                                                        id="newpassword" value="" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Confirm Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" value=""
                                                        required="required" id="cpassword" name="cpassword">
                                                </div>
                                            </div>



                                            <div class="col-sm-6 col-sm-offset-4">

                                                <input style="border-radius:30%;" type="submit" name="changepwd"
                                                    Value="Change Password" class="btn btn-primary">
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'emailid=' + $("#emailid").val(),
                type: "POST",
                success: function (data) {
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () { }
            });
        }
    </script>
    <script>
        function checkpass() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'oldpassword=' + $("#oldpassword").val(),
                type: "POST",
                success: function (data) {
                    $("#password-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () { }
            });
        }
    </script>
</body>

</html>