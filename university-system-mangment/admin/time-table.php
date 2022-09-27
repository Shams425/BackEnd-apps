<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
  require_once "../config/config.php";
 
 	if (isset($_POST['btn_save'])) {

 		$course_code=$_POST["course_code"];

 		$semester=$_POST["semester"];

 		$timing_from=$_POST["timing_from"];
 		
 		$timing_to=$_POST["timing_to"];
 		
 		$day=$_POST["day"];
 		
 		$subject_code=$_POST["subject_code"];

 		$room_no=$_POST["room_no"];
 		
 		$query=
    "INSERT INTO 
      time_table(course_code,semester,timing_from,timing_to,day,subject_code,room_no) 
    VALUES
      ('$course_code','$semester','$timing_from','$timing_to','$day','$subject_code','$room_no')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			echo "Data has been submitted";
 		}
 		else {
 			echo "Data has not been submitted";
 		}
 	}
?>

<?php 
  // Update the time table
 
 	if (isset($_POST['btn_update'])) {

 		echo $course_code=$_POST["course_code"];

 		echo $semester=$_POST["semester"];

 		echo $timing_from=$_POST["timing_from"];
 		
 		echo $timing_to=$_POST["timing_to"];
 		
 		echo $day=$_POST["day"];
 		
 		echo $subject_code=$_POST["subject_code"];

 		echo $room_no=$_POST["room_no"];

 		$query1=
    "UPDATE 
      time_table 
    SET 
      course_code='$course_code',
      semester='$semester',
      timing_from='$timing_from',
      timing_to='$timing_to',
      day='$day',
      subject_code='$subject_code',
      room_no='$room_no' 
    WHERE 
      subject_code='$subject_code'";
 		$run1=mysqli_query($con, $query1);
 		if ($run1) {
 			echo "Data has been updated";
 		}
 		else {
 			echo "Data has not been updated";
 		}
 	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin - Time Table</title>
	</head>
	<body>
		<?php include('../common/header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Time Table Management System </h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Time Table</button>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class=" mt-3">
							<div class="row">
								<div class="col-md-8"></div>
								<div class="col-md-3 ml-5 ">
									<div class="col-md-12 pt-3 ml-5">
										<!-- Large modal -->
										<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header bg-info text-white">
														<h4 class="modal-title text-center">Add Time Table</h4>
													</div>
													<div class="modal-body">
														<form action="time-table.php" method="post">
															<div class="row mt-3">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Course Code: </label>
																		<select class="browser-default custom-select" name="course_code">
																			<option >Select Course</option>
																			<?php
                                        $query="SELECT course_code FROM courses";
                                        $run=mysqli_query($con,$query);
                                        while($row=mysqli_fetch_array($run)) {
                                          echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
                                        }
																		  ?>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Select Semester:</label>
																		<select class="browser-default custom-select" name="semester">
																			<option >Select Semester</option>
																			<?php
                                        $teacher_id=$_SESSION['teacher_id'];
                                        $query= "SELECT DISTINCT(semester) AS semester FROM course_subjects";
                                        $run= mysqli_query($con,$query);
                                        while($row=mysqli_fetch_array($run)) {
                                          echo"<option value=".$row['semester'].">".$row['semester']."</option>";
                                        }
																			?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Timing From: </label>
																		<input type="time" name="timing_from" class="form-control">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputPassword1">Timing To:</label>
																		<input type="time" name="timing_to" class="form-control">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Lecture Day: </label>
																		<select class="browser-default custom-select" name="day">
																			<option >Select Week Day</option>
																			<?php
                                        $teacher_id = $_SESSION['teacher_id'];
                                        $query = "SELECT * FROM weekdays";
                                        $run = mysqli_query($con,$query);
                                        while($row = mysqli_fetch_array($run)) {
                                          echo	"<option value=".$row['day_id'].">".$row['day_name']."</option>";
                                        }
																			?>
																		</select>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputPassword1">Please Select Subject:*</label>
																	<select class="browser-default custom-select" name="subject_code" required="">
																		<option >Select Subject</option>
																		<?php
																			$query = "SELECT * FROM course_subjects";
																			$run = mysqli_query($con,$query);
																			while($row = mysqli_fetch_array($run)) {
																			  echo"<option value=".$row['subject_code'].">".$row['subject_name']."</option>";
																			}
																		?>
																	</select>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="formp">
																		<label for="exampleInputPassword1">Enter Room No:</label>
																		<input type="text" name="room_no" class="form-control" placeholder="Room No">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn btn-primary" name="btn_save" value="Save Data">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															</div> 	
														</form>
													</div>
												</div>
										</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<table class="w-100 table-elements table-three-tr" cellpadding="3">
										<tr class="table-tr-head table-three text-white">
											<td colspan="5" class="text-center text-white"><h4>Classes Time Table</h4></td>
											<td width="10" >											
											<div class="row">
												<div class="col-md-12">
													<div class="col-md-1 mt-2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1">Update</button>
													</div>
													<!-- Large modal -->
													<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-header bg-info text-white">
																	<h4 class="modal-title text-center">Update Time Table</h4>
																</div>
																<div class="modal-body">
																	<form action="time-table.php" method="post">
																		<div class="row mt-3">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Course Code: </label>
																					<select class="browser-default custom-select" name="course_code">
																						<option >Select Course</option>
																						<?php
                                              $query = "SELECT DISTINCT(course_code) AS course_code FROM time_table";
                                              $run = mysqli_query($con,$query);
                                              while($row = mysqli_fetch_array($run)) {
                                                echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
                                              }
																					  ?>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Semester Or Years:</label>
																					<select class="browser-default custom-select" name="semester">
																						<option >Select Class Semester</option>
																						<?php
                                              $query="SELECT DISTINCT(semester) AS semester FROM time_table";
                                              $run=mysqli_query($con,$query);
                                              while($row=mysqli_fetch_array($run)) {
                                                echo	"<option value=".$row['semester'].">".$row['semester']."</option>";
                                              }
																					  ?>
																					</select>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Timing From: </label>
																					<input type="time" name="timing_from" class="form-control">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="formp">
																					<label for="exampleInputPassword1">Timing To:</label>
																					<input type="time" name="timing_to" class="form-control">
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label for="exampleInputEmail1">Lecture Day: </label>
																					<select class="browser-default custom-select" name="day">
																						<option >Select Week Day</option>
																						<?php
                                              $teacher_id= $_SESSION['teacher_id'];
                                              $query = "SELECT * FROM weekdays";
                                              $run = mysqli_query($con,$query);
                                              while($row = mysqli_fetch_array($run)) {
                                                echo"<option value=".$row['day_id'].">".$row['day_name']."</option>";
                                              }
																						?>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="formp">
																					<label for="exampleInputPassword1">Please Select Subject:*</label>
																				<select class="browser-default custom-select" name="subject_code" required="">
																					<option >Select Subject</option>
																					<?php
																						$query="SELECT subject_code FROM time_table";
																						$run=mysqli_query($con,$query);
																						while($row=mysqli_fetch_array($run)) {
																						  echo"<option value=".$row['subject_code'].">".$row['subject_code']."</option>";
																						}
																					?>
																				</select>
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="formp">
																					<label for="exampleInputPassword1">Enter Room No:</label>
																					<input type="text" name="room_no" class="form-control" placeholder="Room No">
																				</div>
																			</div>
																		</div>
																		<div class="modal-footer">
																			<input type="submit" class="btn btn-primary" name="btn_update" value="Update Data">
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																		</div> 	
																	</form>
																</div>
															</div>
													</div>
													</div>
												</div>
											</td>
										</tr>
										<tr class="table-tr-head">
											<th>I'd</th>
											<th>Class Name</th>
											<th>Timming</th>
											<th>Day</th>
											<th>Subject</th>
											<th>Room No</th>
										</tr>
										<?php  
											$query=
                      "SELECT 
                        id, course_code, TIME_FORMAT(timing_from,'%h:%i %p') AS timing_from, TIME_FORMAT(timing_to,'%h:%i %p') AS timing_to, semester,day_name,day_id, day, subject_code,room_no 
                      FROM 
                        time_table tt 
                      INNER JOIN 
                        weekdays wd ON tt.day = wd.day_id";
                        
											$run=mysqli_query($con,$query);
											while($row=mysqli_fetch_array($run)) {
												echo "<tr>";
												echo "<td>".$row["id"]."</td>";
												echo "<td>".$row["course_code"]." ".$row["semester"]."</td>";
												echo "<td>" .$row["timing_from"]."<br>".$row["timing_to"]."</td>";
												echo "<td>".$row["day_name"]."</td>";
												echo "<td>".$row["subject_code"]."</td>";
												echo "<td>".$row["room_no"]."</td>";
												echo "</tr>";
											}
										?>
									</table>
								</div>
							</div>				
						</section>
					</div>
				</div>
			</div>
		</main>
	<script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

