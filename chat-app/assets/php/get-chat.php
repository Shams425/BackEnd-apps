<?php
  session_start();
  if (isset($_SESSION['unique_id'])) {
      include_once "config.php";

      $outgoing_id = mysqli_real_escape_string($data_base, $_POST['sender']);
      $incoming_id = mysqli_real_escape_string($data_base, $_POST['receiver']);
      $output = "";

      $sql = "SELECT * FROM chat_messages 
              WHERE 
                (sender_id = {$outgoing_id} 
                AND 
                receiver_id = {$incoming_id})
              OR 
                (sender_id = {$incoming_id} 
                AND 
                receiver_id = {$outgoing_id})
              ORDER BY msg_id ASC";
      
      $query = mysqli_query($data_base, $sql);
      if (mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
              if ($row['sender_id'] === $outgoing_id) { //this if means that he is the sender
                  $output .= '<div class="chat sending">
                                <div class="details">
                                  <p>' . $row['msg'] . '</p>
                                </div>
                              </div>';
              } else { //this means that he is the receive
                  $output .= '<div class="chat receiving">
                            <img src="../php/images/1657657636wallpaperflare.com_wallpaper(22).jpg" />
                            <div class="details">
                              <p>' . $row['msg'] . '</p>
                            </div>
                          </div>';
              }
          }
          echo $output;
      } else {
          header('Location: ../login.php');
      }
  }
