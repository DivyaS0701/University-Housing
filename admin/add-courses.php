<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$coursecode=$_POST['cc'];
$coursesn=$_POST['cns'];
$coursefn=$_POST['cnf'];

$query="insert into  courses (course_code,course_sn,course_fn) values(?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sss',$coursecode,$coursesn,$coursefn);
$stmt->execute();
echo"<script>alert('Course has been added successfully');</script>";
}

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
					<div class="col-md-12" style="margin-top:90px;">
					
						<h2 class="page-title">Add Courses </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add courses</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Course Code </label>
												<div class="col-sm-8">
													<input type="text" value="" name="cc"  class="form-control"> </div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Course Name (Short)</label>
												<div class="col-sm-8">
	<input type="text" class="form-control" name="cns" id="cns" value="" required="required">
						 
												</div>
											</div>
<div class="form-group">
									<label class="col-sm-2 control-label">Course Name(Full)</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="cnf" value="" >
												</div>
											</div>



												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Add course">
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
