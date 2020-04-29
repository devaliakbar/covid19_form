<?php
include 'db/common.php';

$query = '';
if (isset($_GET['q'])) {
    $query = $_GET['q'];
}

$queryForFechingRecords = "SELECT _id, full_name, sex, age, address, current_country FROM person_info";
if ($query != '') {
    $queryForFechingRecords = $queryForFechingRecords . " WHERE full_name LIKE '" . $query . "%'";
}

$result = mysqli_query($conn, $queryForFechingRecords);
if (mysqli_num_rows($result) > 0) {
    $response["success"] = true;
    $cursorArray = array();
    $temp = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $temp['_id'] = $row["_id"];
        $temp['full_name'] = $row["full_name"];
        $temp['sex'] = $row["sex"];
        $temp['age'] = $row["age"];
        $temp['address'] = $row["address"];
        $temp['current_country'] = $row["current_country"];

        array_push($cursorArray, $temp);
    }
    $response["persons"] = $cursorArray;
} else {
    $response["status"] = "EMPTY";
}

echo json_encode($response);
