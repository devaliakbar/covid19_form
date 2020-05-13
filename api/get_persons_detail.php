<?php
include 'db/common.php';

$query = '';
if (isset($_GET['q'])) {
    $query = $_GET['q'];
}

$queryForFechingRecords = "SELECT * FROM person_info WHERE _id = '" . $query . "'";

$result = mysqli_query($conn, $queryForFechingRecords);
if (mysqli_num_rows($result) > 0) {
    $response["success"] = true;

    $temp = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $temp['_id'] = $row["_id"];
        $temp['organisation_name'] = $row["organisation_name"];
        $temp['ward_no'] = $row["ward_no"];
        $temp['full_name'] = $row["full_name"];
        $temp['sex'] = $row["sex"];
        $temp['age'] = $row["age"];
        $temp['phone'] = $row["phone"];
        $temp['address'] = $row["address"];
        $temp['current_country'] = $row["current_country"];
        $temp['return_registered'] = $row["return_registered"];
        $temp['any_disease'] = $row["any_disease"];
        $temp['disease_info'] = $row["disease_info"];
        $temp['room_available'] = $row["room_available"];
        $temp['aged_person'] = $row["aged_person"];
        $temp['bed_rest_person'] = $row["bed_rest_person"];
        $temp['desease_people'] = $row["desease_people"];
        $temp['pregnant_people'] = $row["pregnant_people"];
        $temp['confirmation_from_rrt'] = $row["confirmation_from_rrt"];
        $temp['relative_home_available'] = $row["relative_home_available"];
        $temp['relative_confirmation_from_rrt'] = $row["relative_confirmation_from_rrt"];
        $temp['rrt_name'] = $row["rrt_name"];
    }

    $response["person_details"] = $temp;
} else {
    $response["status"] = "EMPTY";
}

echo json_encode($response);
