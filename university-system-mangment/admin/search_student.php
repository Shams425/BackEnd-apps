<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"]) {
		header('location:../login/login.php');
	}
  require_once "../config/config.php";

	if(isset($_POST["btnSearch"])) {
		$userId = $_POST['search'];
    $query="SELECT * FROM login WHERE user_id='$userId' ";
    $result=mysqli_query($con,$query);
    if (mysqli_num_rows($result)>0) {
      while ($row=mysqli_fetch_array($result)) {
        echo $_SESSION['LoginStudent']=$row['user_id'];
        header('Location: ../student/student-index.php');
      }
    } else { 
      header("Location: student.php");
    }
	}
?>