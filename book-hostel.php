<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
    $roomno=$_POST['room'];
    $room_type=$_POST['room_type'];
    $feespmt=$_POST['fees'];
    $mealplan=$_POST['mealplan'];
    $datefrom=$_POST['datefrom'];
    $duration=$_POST['duration'];
    // $admission_decision=$_POST['admission_decision'];
    $regno=$_POST['regno'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender'];
    $contactno=$_POST['contact'];
    $emailaddr=$_POST['emailaddr'];
    $emerge_cntno=$_POST['econtact'];
    $parent=$_POST['parent'];
    $prelation=$_POST['prelation'];
    $pcontact=$_POST['pcontact'];
    $addr=$_POST['addr'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $postcode=$_POST['postcode'];
    // $health_record=$_POST['health_record'];
    $query="INSERT INTO  registration(roomno,room_type,fees,mealplan,datefrom,duration,regno,firstName,lastName,gender,contactno,emailaddr,econtactno,parent,prelation,pcontact,addr,city,state,postcode) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc=$stmt->bind_param('iiiisissssisissiissi',$roomno,$room_type,$feespmt,
    $mealplan,$datefrom,$duration,$regno,$fname,$lname,$gender,$contactno,$emailaddr,
    $emerge_cntno,$parent,$prelation,$pcontact,$addr,$city,$state,$postcode);
    $stmt->execute();
    
echo"<script>alert('Student Succssfully register');</script>";
}
?>

<!doctype html>
<html lang="en" class="no-js">
    <head>
        <?php include("includes/head.php") ?>

    </head>
    <body>
        <?php include('includes/header.php');?>
        <div class="ts-main-content">
            <?php include('includes/sidebar.php');?>
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12" style="margin-top:90px;">

                            <h2 class="page-title">Room Booking </h2>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Kindly fill your details</div>
                                        <div class="panel-body">
                                            <form method="post" action="" class="form-horizontal">
                                                <?php
                                                    $uid=$_SESSION['login'];
                                                    $stmt=$mysqli->prepare("SELECT emailaddr FROM registration WHERE emailaddr=? ");
                                                    $stmt->bind_param('s',$uid);
                                                    $stmt->execute();
                                                    $stmt -> bind_result($emailaddr);
                                                    $rs=$stmt->fetch();
                                                    $stmt->close();
                                                    if($rs)
                                                    { ?>
                                                <h3 class="text-warning"style="" align="center">Hey! You have aleady secured a room. </h3>
                                                <?php }
				                                    else{
							                                echo "";
							                            }			
							                    ?>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">
                                                        <h4 style="color: green" align="center">Room Information </h4>
                                                    </label>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Room no. </label>
                                                    <div class="col-sm-8">
                                                        <select name="room" id="room" class="form-control"
                                                            onChange="room_type(this.value);"
                                                            onBlur="checkAvailability()" required>
                                                            <option value="">Select Room</option>
                                                            <?php $query ="SELECT * FROM rooms";
                                                                $stmt2 = $mysqli->prepare($query);
                                                                $stmt2->execute();
                                                                $res=$stmt2->get_result();
                                                                while($row=$res->fetch_object())
                                                                {
                                                                ?>
                                                            <option value="<?php echo $row->room_no;?>">
                                                                <?php echo $row->room_no;?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span id="room-availability-status"
                                                            style="font-size:12px;"></span>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Room Type</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="room_type" id="room_type"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Monthly Fee</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="fees" id="fpm" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Meal Plan</label>
                                                    <div class="col-sm-8">
                                                        <input type="radio" value="0" name="mealplan" checked="checked">
                                                        Food Excluded
                                                        <input type="radio" value="1" name="mealplan">Food included(2000
                                                        extra)
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Dated From</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="datefrom" id="stayf"
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
                                                    <label class="col-sm-2 control-label">Total Amount</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="ta" id="ta"
                                                            class="result form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">
                                                        <h4 style="color: green" align="center">Personal info </h4>
                                                    </label>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">course </label>
                                                    <div class="col-sm-8">
                                                        <select name="course" id="course" class="form-control" required>
                                                            <option value="">Select Course</option>
                                                            <?php $query ="SELECT * FROM courses";
                                                                $stmt2 = $mysqli->prepare($query);
                                                                $stmt2->execute();
                                                                $res=$stmt2->get_result();
                                                                while($row=$res->fetch_object())
                                                                {
                                                                ?>
                                                            <option value="<?php echo $row->course_fn;?>">
                                                                <?php echo $row->course_fn;?>&nbsp;&nbsp;(<?php echo $row->course_sn;?>)
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <?php	
                                                    $aid=$_SESSION['id'];
                                                    $ret="select * from userregistration where id=?";
                                                    $stmt= $mysqli->prepare($ret) ;
                                                    $stmt->bind_param('i',$aid);
                                                    $stmt->execute() ;
                                                    $res=$stmt->get_result();
                                                    
                                                    while($row=$res->fetch_object())
                                                    {
                                                ?>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Registration No : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="regno" id="regno" class="form-control"
                                                            value="<?php echo $row->regNo;?>" readonly>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">First Name : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="fname" id="fname" class="form-control"
                                                            value="<?php echo $row->firstName;?>" readonly>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Last Name : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="lname" id="lname" class="form-control"
                                                            value="<?php echo $row->lastName;?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Gender : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="gender"
                                                            value="<?php echo $row->gender;?>" class="form-control"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Contact No : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="contact" id="contact"
                                                            value="<?php echo $row->contactNo;?>" class="form-control"
                                                            readonly>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Email address : </label>
                                                    <div class="col-sm-8">
                                                        <input type="email" name="emailaddr" id="email"
                                                            class="form-control" value="<?php echo $row->emailaddr;?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <?php } ?>
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
                                                        <input type="text" name="parent" id="gname" class="form-control"
                                                            required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Parent Relation : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="prelation" id="grelation"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Parent Contact no : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="pcontact" id="gcontact"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">
                                                        <h4 style="color: green" align="center">Personal Address
                                                        </h4>
                                                    </label>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Address : </label>
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
                                                            <?php $query ="SELECT * FROM states";
                                                                    $stmt2 = $mysqli->prepare($query);
                                                                    $stmt2->execute();
                                                                    $res=$stmt2->get_result();
                                                                    while($row=$res->fetch_object())
                                                                    {
                                                                    ?>
                                                            <option value="<?php echo $row->State;?>">
                                                                <?php echo $row->State;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Postcode : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="postcode" id="postcode"
                                                            class="form-control" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">
                                                        <h4 style="color: green" align="center">Student Health Records
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

                                                <div class="col-sm-6 col-sm-offset-4">

                                                    <input type="submit" name="submit" Value="Book"
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
                $('#address').val($('#address').val());
                $('#city').val($('#city').val());
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


    <script type="text/javascript">
    $(document).ready(function() {
        $('#duration').keyup(function() {
            var fetch_dbid = $(this).val();
            $.ajax({
                type: 'POST',
                url: "ins-amt.php?action=userid",
                data: {
                    userinfo: fetch_dbid
                },
                success: function(data) {
                    $('.result').val(data);
                }
            });


        })
    });
    </script>

</html>
