<?php
  session_start();
  if (isset($_SESSION['unique_id'])) {
      include_once "config.php";

      $outgoing_id = mysqli_real_escape_string($data_base, $_POST['sender']);
      $incoming_id = mysqli_real_escape_string($data_base, $_POST['receiver']);
      $message = mysqli_real_escape_string($data_base, $_POST['message']);

      if (!empty($message)) {
          $ins_sql = mysqli_query($data_base, "INSERT INTO chat_messages (sender_id, receiver_id, msg)
                                               VALUES ({$outgoing_id}, {$incoming_id}, '{$message}')") or die(); //the quotes in the message variable are important because it's text only
          echo "success";
      }
  } else {
      header('Location: ../login.php');
  }
