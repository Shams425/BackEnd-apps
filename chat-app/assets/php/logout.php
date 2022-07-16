<?php
  session_start();
  if (isset($_SESSION['unique_id'])) {
      include_once "config.php";

      $logout_id = mysqli_real_escape_string($data_base, $_GET['logout_id']);
      if (isset($logout_id)) { //once user has logged out status will update to offline
          $status = "offline";

          //we will update the status again to online if logged in successfully
          $sql = mysqli_query($data_base, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
          if ($sql) {
              session_unset();
              session_destroy();
              header("Location: ../../pages/login.php");
          } else {
              header("Location: ../../pages/users.php");
          }
      } else {
          header("Location: ../../pages/login.php");
      }
  }
