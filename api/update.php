<?php
include 'db/common.php';

$body = json_decode(file_get_contents('php://input'), true);

$updateRecordQuery = "UPDATE
`person_info`
SET
`organisation_name` = '" . $body['organisation_name'] . "',
`ward_no` = '" . $body['ward_no'] . "',
`full_name` = '" . $body['full_name'] . "',
`sex` = '" . $body['sex'] . "',
`age` = '" . $body['age'] . "',
`address` = '" . $body['address'] . "',
`current_country` = '" . $body['current_country'] . "',
`return_registered` ='" . $body['return_registered'] . "',
`any_disease` = '" . $body['any_disease'] . "',
`disease_info` = '" . $body['disease_info'] . "',
`room_available` = '" . $body['room_available'] . "',
`aged_person` = '" . $body['aged_person'] . "',
`bed_rest_person` = '" . $body['bed_rest_person'] . "',
`desease_people` = '" . $body['desease_people'] . "',
`pregnant_people` = '" . $body['pregnant_people'] . "',
`confirmation_from_rrt` = '" . $body['confirmation_from_rrt'] . "',
`relative_home_available` = '" . $body['relative_home_available'] . "',
`relative_confirmation_from_rrt` ='" . $body['relative_confirmation_from_rrt'] . "',
`rrt_name` = '" . $body['rrt_name'] . "'
WHERE
`_id` = '" . $body['id'] . "'";

if (mysqli_query($conn, $updateRecordQuery)) {
    $response["success"] = true;
} else {
    $response["status"] = "FAILED";
}

echo json_encode($response);
