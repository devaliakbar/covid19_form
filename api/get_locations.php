<?php
include 'db/common.php';

$result = mysqli_query($conn, "SELECT * FROM country_list");

if (mysqli_num_rows($result) > 0) {
    $temp = array();
    $cursorArray = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $temp['name'] = $row["name"];
        array_push($cursorArray, $temp);
    }
    $response["country_list"] = $cursorArray;

    $pResult = mysqli_query($conn, "SELECT * FROM panchayat_list");

    if (mysqli_num_rows($pResult) > 0) {
        $response["success"] = true;
        $temp = array();
        $cursorArray = array();

        while ($row = mysqli_fetch_assoc($pResult)) {
            $temp['name'] = $row["name"];
            array_push($cursorArray, $temp);
        }
        $response["panchayat_list"] = $cursorArray;
    }
}

echo json_encode($response);
