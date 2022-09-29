<?php  
  session_start();
  if (!$_SESSION["LoginStudent"]) {
    header('location:../login/login.php');
  }
  require_once "../config/config.php";
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Student - Fees</title>
	</head>
	<body>
		<?php include('../common/header.php') ?>
		<?php include('../common/student-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main ">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4 class="">Student Fee Summary</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="border mt-3">
							<table class="w-100 table-striped table-hover table-dark" cellpadding="10">
								<tr>
									<th colspan="9"><h4 class="text-center">Student Fee Detail</h4 class="text-center"></th>
								</tr>
								<tr>
									<th>Voucher No.</th>
									<th>Roll No.</th>
									<th>Student Name</th>
									<th>Program</th>
									<th>Amount (Rs.)</th>
									<th>Posting Date</th>
									<th>Status</th>
								</tr>
								<?php 
								$roll_no=$_SESSION['LoginStudent'];
									$query=
                  "SELECT 
                    fee_voucher,student_fee.roll_no,first_name,middle_name,last_name,course_code,amount,date(posting_date) AS posting_date,status 
                  FROM 
                    student_fee 
                  INNER JOIN 
                    student_info ON student_fee.roll_no = student_info.roll_no 
                  WHERE 
                    student_fee.roll_no='$roll_no'";

									$run=mysqli_query($con,$query);
									while ($row=mysqli_fetch_array($run)) { ?>
									<tr>
										<td><?php echo $row['fee_voucher'] ?></td>
										<td><?php echo $row['roll_no'] ?></td>
										<td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></td>
										<td><?php echo $row['course_code'] ?></td>
										<td><?php echo $row['amount'] ?></td>
										<td><?php echo date($row['posting_date']) ?></td>
										<td><?php echo $row['status'] ?></td>
									</tr>
									<?php	
									}
								?>
							</table>				
						</section>
					</div>
				</div>
			</div>
		</main>
		<script src="../assets/js/bootstrap.min.js"></script>
	</body>
</html>