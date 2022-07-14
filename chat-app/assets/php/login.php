<?php

session_start();
include_once "config.php";
$email     = mysqli_real_escape_string($data_base, $_POST['email']);
$password  = mysqli_real_escape_string($data_base, $_POST['password']);


if (!empty($email) && !empty($password)) {
    $sql = mysqli_query($data_base, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['unique_id'] = $row['unique_id'];
        echo"success";
    } else {
        echo "email or password is incorrect";
    }
} else {
    echo "all inputs are required";
}
