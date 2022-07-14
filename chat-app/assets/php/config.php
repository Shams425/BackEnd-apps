<?php

$data_base = mysqli_connect("localhost", "root", "", "chat");

if (!$data_base) {
    echo "connecting to data_base" . mysqli_connect_error();
}
