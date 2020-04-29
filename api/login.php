<?php
include 'db/common.php';

$body = json_decode(file_get_contents('php://input'), true);

$username = $body["username"];
$password = $body["password"];

$checkUser = "SELECT
    user_username,
    user_password
    FROM
    user_info
    WHERE
    BINARY user_username = '$username' AND user_password = '$password';";

$result = $conn->query($checkUser);

if ($result->num_rows > 0) {
    $response["success"] = true;
} else {
    $response["status"] = "USER";
}

echo json_encode($response);
