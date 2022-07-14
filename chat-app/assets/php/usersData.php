<?php

//showing the users list from database table
while ($row = mysqli_fetch_assoc($sql)) {
    $output .= "<a href='chat.php?unique_id={$row['unique_id']}' />
               <div class='content'>
                 <img src='../assets/php/images/{$row['img']}' alt='' />

                 <div class='details'>
                   <span>{$row['first_name']}</span>
                   <p>Message for testing</p>
                 </div>
               </div>
               <div class='showStatus'>
                 <i class='fas fa-circle'></i>
               </div>
             </a>\n";
}
