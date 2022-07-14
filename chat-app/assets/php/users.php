<?php
 session_start();

 if (!isset($_SESSION['unique_id'])) {
     header('location: login.php');
 }

 include_once "config.php";
 $sql = mysqli_query($data_base, "SELECT * FROM users");
 $output = "";

 if (mysqli_num_rows($sql) == 1) {
     $output .= "No users are available.";
 } elseif (mysqli_num_rows($sql) > 0) {
    
     //include the file that has the users
     include "usersData.php";
 }

 

 echo $output;
