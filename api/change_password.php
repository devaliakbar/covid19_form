<?php
include 'db/common.php';

$body = json_decode(file_get_contents('php://input'), true);

$username = $body["username"];
$current = $body["current"];
$newP = $body["newP"];

$checkUser = "SELECT
    user_username,
    user_password
    FROM
    user_info
    WHERE
    BINARY user_username = '$username' AND user_password = '$current';";

$result = $conn->query($checkUser);

if ($result->num_rows > 0) {

    $updateNewPassword = "UPDATE
    user_info
SET
    user_password = '$newP'
WHERE
    user_username = '$username'";

    if (mysqli_query($conn, $updateNewPassword)) {
        $response["success"] = true;
    } else {
        $response["status"] = "FAIL";
    }
} else {
    $response["status"] = "USER";
}

echo json_encode($response);
