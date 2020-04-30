<?php
include 'db/common.php';

$body = json_decode(file_get_contents('php://input'), true);

$deleteRecordQuery = "DELETE
FROM
    `person_info`
WHERE
    _id = '" . $body['id'] . "'";

if (mysqli_query($conn, $deleteRecordQuery)) {
    $response["success"] = true;
} else {
    $response["status"] = "FAILED";
}

echo json_encode($response);
