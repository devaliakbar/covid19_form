<?php
include 'db/common.php';

//FOR TRANSACTION
mysqli_autocommit($conn, false);

$body = json_decode(file_get_contents('php://input'), true);

$mainFormSuccess = false;

//SAVING QUARANTINE MAIN FORM DATA
$departureDate = $body['departure_date'] == "" ? "0000-00-00" : $body['departure_date'];
$arrivalDate = $body['arrival_date'] == "" ? "0000-00-00" : $body['arrival_date'];
$informationRecievedDate = $body['date_of_information_received'] == "" ? "0000-00-00" : $body['date_of_information_received'];
$observationStartedDate = $body['observation_started_date'] == "" ? "0000-00-00" : $body['observation_started_date'];
$observationEndDate = $body['observation_end_date'] == "" ? "0000-00-00" : $body['observation_end_date'];
$sampleTakenDate = $body['date_of_sample_taken'] == "" ? "0000-00-00" : $body['date_of_sample_taken'];

$addQuarantineRecordQuery = "INSERT INTO `quarantine_info`(
    `full_name`,
    `age`,
    `sex`,
    `address`,
    `district`,
    `contact_number`,
    `passport_number`,
    `location`,
    `lat`,
    `lon`,
    `orgin_country`,
    `orgin_state`,
    `orgin_district`,
    `phc_area`,
    `phc_medical_officer_contact_number`,
    `place_to_vist`,
    `departure_date`,
    `arrival_date`,
    `date_of_information_received`,
    `source_of_information`,
    `panchayat_ward_no`,
    `source_of_contact_number`,
    `observation_started_date`,
    `observation_end_date`,
    `current_health_status`,
    `risk_categorization`,
    `sample_to_test_taken`,
    `date_of_sample_taken`,
    `result`,
    `travelled_with_positive_case`,
    `remark`
)
VALUES(
'" . $body['full_name'] . "',
'" . $body['age'] . "',
'" . $body['sex'] . "',
'" . $body['address'] . "',
'" . $body['district'] . "',
'" . $body['contact_number'] . "',
'" . $body['passport_number'] . "',
'" . $body['location'] . "',
'" . $body['lat'] . "',
'" . $body['lon'] . "',
'" . $body['orgin_country'] . "',
'" . $body['orgin_state'] . "',
'" . $body['orgin_district'] . "',
'" . $body['phc_area'] . "',
'" . $body['phc_medical_officer_contact_number'] . "',
'" . $body['place_to_vist'] . "',
'" . $departureDate . "',
'" . $arrivalDate . "',
'" . $informationRecievedDate . "',
'" . $body['source_of_information'] . "',
'" . $body['panchayat_ward_no'] . "',
'" . $body['source_of_contact_number'] . "',
'" . $observationStartedDate . "',
'" . $observationEndDate . "',
'" . $body['current_health_status'] . "',
'" . $body['risk_categorization'] . "',
'" . $body['sample_to_test_taken'] . "',
'" . $sampleTakenDate . "',
'" . $body['result'] . "',
'" . $body['travelled_with_positive_case'] . "',
'" . $body['remark'] . "'
)";

if (mysqli_query($conn, $addQuarantineRecordQuery)) {
    $response["id"] = mysqli_insert_id($conn);
    $mainFormSuccess = true;
} else {
    $response["status"] = "MAIN";
}

//SAVING FAMLY INFO
$familyInfoSuccess = false;
if ($mainFormSuccess) {
    $insertFamilyQuery = "INSERT INTO `family_info`(
        `quarantine_id`,
        `under_five`,
        `five_to_ten`,
        `ten_to_seventeen`,
        `seventeen_to_fiftynine`,
        `sixty_and_above`,
        `details`
    )
    VALUES(
        '" . $response["id"] . "',
        '" . $body["under_five"] . "',
        '" . $body["five_to_ten"] . "',
        '" . $body["ten_to_seventeen"] . "',
        '" . $body["seventeen_to_fiftynine"] . "',
        '" . $body["sixty_and_above"] . "',
        '" . $body["details"] . "'
    )";

    if (mysqli_query($conn, $insertFamilyQuery)) {
        $familyInfoSuccess = true;
    } else {
        $response["status"] = "FAMILY";
    }

}

//SAVING VISITED PLACE
$visitedPlaceSuccess = true;

if ($familyInfoSuccess) {
    $visitedPlaceArr = $body['visitedLocation'];
    foreach ($visitedPlaceArr as $visitedPlace) {
        $insertVisitedPlaceQuery = "INSERT INTO `visited_place_info`(
            `quarantine_id`,
            `location_name`,
            `lat`,
            `lon`
        )
        VALUES(
            '" . $response["id"] . "',
            '" . $visitedPlace["location_name"] . "',
            '" . $visitedPlace["lat"] . "',
            '" . $visitedPlace["lon"] . "'
        )";
        if (!mysqli_query($conn, $insertVisitedPlaceQuery)) {
            $response["status"] = "VISITED";
            $visitedPlaceSuccess = false;
            break;
        }
    }
} else {
    $visitedPlaceSuccess = false;
}

//SAVING PRIMARY CONTACT
$primaryContactSuccess = true;

if ($visitedPlaceSuccess) {
    $primaryContactPersonsArr = $body['primaryContactList'];
    foreach ($primaryContactPersonsArr as $primaryContactPerson) {
        $inserPrimaryContactQuery = "INSERT INTO `primary_contact_info`(
            `quarantine_id`,
            `name`,
            `mobile_no`,
            `age`,
            `location`,
            `lat`,
            `lon`
        )
        VALUES(
        '" . $response["id"] . "',
        '" . $primaryContactPerson["name"] . "',
        '" . $primaryContactPerson["mobile_no"] . "',
        '" . $primaryContactPerson["age"] . "',
        '" . $primaryContactPerson["location"] . "',
        '" . $primaryContactPerson["lat"] . "',
        '" . $primaryContactPerson["lon"] . "'
        )";
        if (!mysqli_query($conn, $inserPrimaryContactQuery)) {
            $response["status"] = "PRIMARY";
            $primaryContactSuccess = false;
            break;
        }
    }
} else {
    $primaryContactSuccess = false;
}

//SAVING SECONDARY CONTACT
$secondaryContactSuccess = true;

if ($primaryContactSuccess) {
    $secondaryContactPersonsArr = $body['secondaryConatctList'];

    foreach ($secondaryContactPersonsArr as $secondaryContactPerson) {
        $inserSecondaryContactQuery = "INSERT INTO `secondary_contact_info`(
            `quarantine_id`,
            `name`,
            `mobile_no`,
            `age`,
            `location`,
            `lat`,
            `lon`
        )
        VALUES(
        '" . $response["id"] . "',
        '" . $secondaryContactPerson["name"] . "',
        '" . $secondaryContactPerson["mobile_no"] . "',
        '" . $secondaryContactPerson["age"] . "',
        '" . $secondaryContactPerson["location"] . "',
        '" . $secondaryContactPerson["lat"] . "',
        '" . $secondaryContactPerson["lon"] . "'
        )";
        if (!mysqli_query($conn, $inserSecondaryContactQuery)) {
            $response["status"] = "SECONDARY";
            $secondaryContactSuccess = false;
            break;
        }
    }

} else {
    $secondaryContactSuccess = false;
}

//CHECKING FINAL CONDITION
if ($mainFormSuccess && $familyInfoSuccess && $visitedPlaceSuccess && $primaryContactSuccess && $secondaryContactSuccess) {
    //FOR TRANSACTION
    mysqli_commit($conn);

    $response["success"] = true;
} else {
    //FOR TRANSACTION
    mysqli_rollback($conn);
}

echo json_encode($response);
