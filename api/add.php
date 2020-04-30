<?php
include 'db/common.php';

$body = json_decode(file_get_contents('php://input'), true);

$addRecordQuery = "INSERT INTO `person_info`(
    `organisation_name`,
    `ward_no`,
    `full_name`,
    `sex`,
    `age`,
    `address`,
    `current_country`,
    `return_registered`,
    `any_disease`,
    `disease_info`,
    `room_available`,
    `aged_person`,
    `bed_rest_person`,
    `desease_people`,
    `pregnant_people`,
    `confirmation_from_rrt`,
    `relative_home_available`,
    `relative_confirmation_from_rrt`,
    `rrt_name`
)
VALUES(
   '" . $body['organisation_name'] . "',
   '" . $body['ward_no'] . "',
   '" . $body['full_name'] . "',
   '" . $body['sex'] . "',
   '" . $body['age'] . "',
   '" . $body['address'] . "',
   '" . $body['current_country'] . "',
   '" . $body['return_registered'] . "',
   '" . $body['any_disease'] . "',
   '" . $body['disease_info'] . "',
   '" . $body['room_available'] . "',
   '" . $body['aged_person'] . "',
   '" . $body['bed_rest_person'] . "',
   '" . $body['desease_people'] . "',
   '" . $body['pregnant_people'] . "',
   '" . $body['confirmation_from_rrt'] . "',
   '" . $body['relative_home_available'] . "',
   '" . $body['relative_confirmation_from_rrt'] . "',
   '" . $body['rrt_name'] . "'
);";

if (mysqli_query($conn, $addRecordQuery)) {
    $response["id"] = mysqli_insert_id($conn);
    $response["success"] = true;
} else {
    $response["status"] = "FAILED";
}

echo json_encode($response);
