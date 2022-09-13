<?php  
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../login/login.php');
}
require_once "../config/config.php";
?>

<?php 
	if (isset($_GET['roll_no'])) {
		$roll_no=$_GET['roll_no'];
		$query1="DELETE FROM student_info WHERE roll_no='$roll_no'";
		$run1=mysqli_query($con,$query1);
		if ($run1) {
			header('Location: student.php');
		}
		else{
			echo "Record not deleted. Frist of all delete record  from the child table then you can delete from here ";
			header('Refresh: 5; url=student.php');
		}
	}
?>
<?php 
//Delete Course
	if (isset($_GET['course_code'])) {
		$course_code=$_GET['course_code'];
		$query2="DELETE FROM courses WHERE course_code='$course_code'";
		$run2=mysqli_query($con,$query2);
		if ($run2) {
			header('Location: courses.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>

<?php 
// Delete Subject
	if (isset($_GET['subject_code'])) {
		$subject_code=$_GET['subject_code'];
		$query3="DELETE FROM course_subjects WHERE subject_code='$subject_code'";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
			header('Location: subjects.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<?php 
// Delete Teacher
	if (isset($_GET['teacher_id'])) {
		$teacher_id=$_GET['teacher_id'];
		$query3="DELETE FROM teacher_info WHERE teacher_id='$teacher_id'";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
			header('Location: teacher.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
