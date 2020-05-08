<?php
include 'db/common.php';

$query = '';
if (isset($_GET['q'])) {
    $query = $_GET['q'];
}

$quarantineSuccess = false;

$queryForFechingRecords = "SELECT * FROM quarantine_info WHERE _id = '" . $query . "'";

$result = mysqli_query($conn, $queryForFechingRecords);
if (mysqli_num_rows($result) > 0) {
    $response["success"] = true;

    $temp = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $temp['_id'] = $row["_id"];
        $temp['full_name'] = $row["full_name"];
        $temp['age'] = $row["age"];
        $temp['sex'] = $row["sex"];
        $temp['address'] = $row["address"];
        $temp['district'] = $row["district"];
        $temp['contact_number'] = $row["contact_number"];
        $temp['passport_number'] = $row["passport_number"];
        $temp['location'] = $row["location"];
        $temp['lat'] = $row["lat"];
        $temp['lon'] = $row["lon"];
        $temp['orgin_country'] = $row["orgin_country"];
        $temp['orgin_state'] = $row["orgin_state"];
        $temp['orgin_district'] = $row["orgin_district"];
        $temp['phc_area'] = $row["phc_area"];
        $temp['phc_medical_officer_contact_number'] = $row["phc_medical_officer_contact_number"];
        $temp['place_to_vist'] = $row["place_to_vist"];
        $temp['departure_date'] = $row["departure_date"];
        $temp['arrival_date'] = $row["arrival_date"];
        $temp['date_of_information_received'] = $row["date_of_information_received"];
        $temp['source_of_information'] = $row["source_of_information"];
        $temp['panchayat_ward_no'] = $row["panchayat_ward_no"];
        $temp['source_of_contact_number'] = $row["source_of_contact_number"];
        $temp['observation_started_date'] = $row["observation_started_date"];
        $temp['observation_end_date'] = $row["observation_end_date"];
        $temp['current_health_status'] = $row["current_health_status"];
        $temp['risk_categorization'] = $row["risk_categorization"];
        $temp['sample_to_test_taken'] = $row["sample_to_test_taken"];
        $temp['date_of_sample_taken'] = $row["date_of_sample_taken"];
        $temp['result'] = $row["result"];
        $temp['travelled_with_positive_case'] = $row["travelled_with_positive_case"];
        $temp['remark'] = $row["remark"];
    }

    $response["quarantine_details"] = $temp;
    $quarantineSuccess = true;
} else {
    $response["status"] = "EMPTY";
}

if ($quarantineSuccess) {
    //PICKING FAMILY
    $queryForFechingRecords = "SELECT * FROM family_info WHERE quarantine_id = '" . $query . "'";
    $result = mysqli_query($conn, $queryForFechingRecords);
    if (mysqli_num_rows($result) > 0) {
        $temp = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $temp['under_five'] = $row["under_five"];
            $temp['five_to_ten'] = $row["five_to_ten"];
            $temp['ten_to_seventeen'] = $row["ten_to_seventeen"];
            $temp['seventeen_to_fiftynine'] = $row["seventeen_to_fiftynine"];
            $temp['sixty_and_above'] = $row["sixty_and_above"];
            $temp['details'] = $row["details"];
        }
        $response["family"] = $temp;
    }

//PICKING VISITED PLACES
    $queryForFechingRecords = "SELECT * FROM visited_place_info WHERE quarantine_id = '" . $query . "'";
    $result = mysqli_query($conn, $queryForFechingRecords);
    if (mysqli_num_rows($result) > 0) {
        $cursorArray = array();
        $temp = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $temp['location_name'] = $row["location_name"];
            $temp['lat'] = $row["lat"];
            $temp['lon'] = $row["lon"];
            array_push($cursorArray, $temp);
        }
        $response["visited"] = $cursorArray;
    }

    //PRIMARY CONTACT PERSONS
    $queryForFechingRecords = "SELECT * FROM primary_contact_info WHERE quarantine_id = '" . $query . "'";
    $result = mysqli_query($conn, $queryForFechingRecords);
    if (mysqli_num_rows($result) > 0) {
        $cursorArray = array();
        $temp = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $temp['name'] = $row["name"];
            $temp['mobile_no'] = $row["mobile_no"];
            $temp['age'] = $row["age"];
            $temp['location'] = $row["location"];
            $temp['lat'] = $row["lat"];
            $temp['lon'] = $row["lon"];
            array_push($cursorArray, $temp);
        }
        $response["primary_contact"] = $cursorArray;
    }

    //SECONDARY CONTACT PERSONS
    $queryForFechingRecords = "SELECT * FROM secondary_contact_info WHERE quarantine_id = '" . $query . "'";
    $result = mysqli_query($conn, $queryForFechingRecords);
    if (mysqli_num_rows($result) > 0) {
        $cursorArray = array();
        $temp = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $temp['name'] = $row["name"];
            $temp['mobile_no'] = $row["mobile_no"];
            $temp['age'] = $row["age"];
            $temp['location'] = $row["location"];
            $temp['lat'] = $row["lat"];
            $temp['lon'] = $row["lon"];
            array_push($cursorArray, $temp);
        }
        $response["secondary_contact"] = $cursorArray;
    }

}

echo json_encode($response);
