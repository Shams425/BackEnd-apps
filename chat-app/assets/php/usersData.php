<?php

//showing the users list from database table
while ($row = mysqli_fetch_assoc($sql)) {
    // this sql statement for showing the last message between users
    $sql2 = "SELECT * FROM chat_messages 
            WHERE 
              (receiver_id = {$row['unique_id']} OR sender_id = {$row['unique_id']})  
            AND 
              (sender_id = {$outgoing_id}  OR receiver_id = {$outgoing_id}) 
            ORDER BY 
              msg_id DESC LIMIT 1";
    $query2 = mysqli_query($data_base, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    
    if (mysqli_num_rows($query2) > 0) {
        $result = $row2['msg'];
    } else {
        $result = "No messages available";
    }

    // trimming message when it's more than 28 letters
    (strlen($result) > 28) ? $msg = substr($result, 0, 28). '...' : $msg = $result;

    //adding 'you:' text before message if the owner of the message login
    ($outgoing_id == $row2['sender_id']) ? $you = "you: " : $you = "";

    //check user online/offline
    ($row['status'] == 'offline') ? $offline = "offline" : $offline = "";

    $output .= "<a href='chat.php?unique_id={$row['unique_id']}' />
               <div class='content'>
                 <img src='../assets/php/images/{$row['img']}' alt='' />

                 <div class='details'>
                   <span>{$row['first_name']}</span>
                   <p>". $you . $msg ."</p>
                 </div>
               </div>
               <div class='showStatus " . $offline ."'>
                 <i class='fas fa-circle'></i>
               </div>
             </a>\n";
}
