<?php
  session_start();
  
  include_once "../php/config.php";
  $firstName = mysqli_real_escape_string($data_base, $_POST['firstName']);
  $lastName  = mysqli_real_escape_string($data_base, $_POST['lastName']);
  $email     = mysqli_real_escape_string($data_base, $_POST['email']);
  $password  = mysqli_real_escape_string($data_base, $_POST['password']);

  if (!empty($firstName) && !empty($lastName) && !empty($email)) {
      // email validation
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          //check if email is already exist
          $sql = mysqli_query($data_base, "SELECT email FROM users WHERE email = '{$email}'");

          if (mysqli_num_rows($sql) > 0) {
              echo "Email already exists. Please try again!!!\n";
          } else {

        //check the user uploaded image file
              if (isset($_FILES['image'])) { // check if file is uploaded
          //_FILES function returns an array with the (name,type,size, tempName,...etc)
                  $img_name = $_FILES['image']['name'];
                  $tmp_name = $_FILES['image']['tmp_name']; // temporary name for save file in our folder

                  // getting the image extension
                  $img_explode = explode('.', $img_name); // split the name into it's extension
                  $img_extension = end($img_explode);

          

                  // accepted image extension
                  $acc_img_ext = ['jpg', 'jpeg', 'png'];

                  if (in_array($img_extension, $acc_img_ext)) {
                      //using time to set unique image name
                      $now_time = time();
                      $new_img_name = $now_time.$img_name;

                      //move the new image to the image directory
                      if (move_uploaded_file($tmp_name, "images/".$new_img_name)) {
                          $status = "Active now";
                          $random_id  = rand(time(), 100000000);

                          // now insert the data into the users table
                          $ins_sql = mysqli_query(
                              $data_base,
                              "INSERT INTO 
                                      users (unique_id, first_name, last_name, email, password, img, status) 
                                      VALUES ('$random_id', '$firstName', '$lastName', '$email', '$password', '$new_img_name', '$status')"
                          );
                          if ($ins_sql) {
                              //select email row
                              $sel_email_sql= mysqli_query($data_base, "SELECT * FROM users WHERE email = '$email'");
                
                              if (mysqli_num_rows($sel_email_sql) > 0) {
                                  $row = mysqli_fetch_assoc($sel_email_sql);
                                  $_SESSION['unique_id'] = $row['unique_id']; //this session will be used by other php files
                  
                                  echo "success";
                              }
                          } else {
                              echo "something went wrong. Please try again!!!\n";
                          }
                      }
                  } else {
                      echo "Please select an image extension with .jpg, .jpeg, .png";
                  }
              } else {
                  echo "please select an image file.\n";
              }
          }
      } else {
          echo "your $email is not valid. Please try again!!!\n";
      }
  } else {
      echo "all fields are required";
  }
  ?> 