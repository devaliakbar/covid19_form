<?php
include 'common.php';

$userInfoCreateQuery = "CREATE TABLE user_info(
    user_username VARCHAR(50),
    user_password VARCHAR(50)
);";

if (mysqli_query($conn, $userInfoCreateQuery)) {
    echo "<br>Table User Info created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$personInfoCreateQuery = "CREATE TABLE person_info(
    _id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    organisation_name VARCHAR(50),
    ward_no VARCHAR(50),
    full_name VARCHAR(50),
    sex BOOLEAN,
    age INT,
    address VARCHAR(100),
    current_country VARCHAR(50),
    return_registered BOOLEAN,
    any_disease BOOLEAN,
    disease_info VARCHAR(100),
    room_available BOOLEAN,
    aged_person BOOLEAN,
    bed_rest_person BOOLEAN,
    desease_people BOOLEAN,
    pregnant_people BOOLEAN,
    confirmation_from_rrt BOOLEAN,
    relative_home_available BOOLEAN,
    relative_confirmation_from_rrt BOOLEAN,
    rrt_name VARCHAR(50)
);";

if (mysqli_query($conn, $personInfoCreateQuery)) {
    echo "<br>Table Person Info created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
