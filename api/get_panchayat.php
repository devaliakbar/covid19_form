<?php
include 'db/common.php';

$district = $_GET['district'];
$type = $_GET['type'];

$query = "SELECT * FROM panchayat_list WHERE district = '" . $district . "' AND type = '" . $type . "'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $response["success"] = true;
    $temp = array();
    $cursorArray = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $temp['name'] = $row["name"];
        array_push($cursorArray, $temp);
    }
    $response["panchayat_list"] = $cursorArray;
} else {
    $response["status"] = $query;
}

echo json_encode($response);
