<?php
include_once "config.php";

$search_term = mysqli_real_escape_string($data_base, $_POST['searchTerm']);
$output = "";

$sql = mysqli_query(
    $data_base,
    "SELECT * FROM users WHERE 
  first_name LIKE '%{$search_term}%' OR 
  last_name LIKE '%{$search_term}%'"
);

if (mysqli_num_rows($sql) > 0) {
    include "usersData.php";
    echo $output;
} else {
    $output .= "No User found related to your search.\n";
    echo $output;
}
