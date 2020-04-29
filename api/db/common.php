<?php
$conn = mysqli_connect("localhost", "root", "", "covid19");
if (!$conn) {
    mysqli_error();
    die();
}

$response = array();
$response["success"] = false;
$response["status"] = "INVALID";
