<?php
include 'common.php';

$userInfoCreateQuery = "CREATE TABLE user_info(
    user_username VARCHAR(50),
    user_password VARCHAR(50),
    type INT
)ENGINE = INNODB;";

if (mysqli_query($conn, $userInfoCreateQuery)) {
    echo "<br>Table User Info created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$deleteAllUserQuery = 'DELETE FROM user_info';
if (mysqli_query($conn, $deleteAllUserQuery)) {
    echo "<br>Cleared Users successfully<br>";
} else {
    echo "Failed To Delete Old Users: " . mysqli_error($conn);
}

$addUserQuery = "INSERT INTO user_info(user_username, user_password,type)VALUES('admin', 'admin', 1);";
if (mysqli_query($conn, $addUserQuery)) {
    echo "<br>Added Username : admin and Password : admin<br>";
} else {
    echo "Failed To Create Users: " . mysqli_error($conn);
}

$addUserQuery = "INSERT INTO user_info(user_username, user_password,type)VALUES('user', 'user', 0);";
if (mysqli_query($conn, $addUserQuery)) {
    echo "<br>Added Username : user and Password : user<br>";
} else {
    echo "Failed To Create Users: " . mysqli_error($conn);
}

//NORKA TABLE

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
)ENGINE = INNODB;";

if (mysqli_query($conn, $personInfoCreateQuery)) {
    echo "<br>Table Person Info created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

//QUARINTINE TABLE

$quarantineInfoCreateQuery = "CREATE TABLE quarantine_info(
    _id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50),
    age INT,
    sex BOOLEAN,
    address VARCHAR(100),
    district VARCHAR(50),
    contact_number VARCHAR(50),
    passport_number VARCHAR(50),

    location VARCHAR(100),
    lat VARCHAR(50),
    lon VARCHAR(50),

    orgin_country VARCHAR(50),
    orgin_state VARCHAR(50),
    orgin_district VARCHAR(50),
    phc_area VARCHAR(50),
    phc_medical_officer_contact_number VARCHAR(50),
    place_to_vist VARCHAR(50),
    departure_date DATE,
    arrival_date DATE,
    date_of_information_received DATE,
    source_of_information VARCHAR(50),
    panchayat_ward_no VARCHAR(50),
    source_of_contact_number VARCHAR(50),
    observation_started_date DATE,
    observation_end_date DATE,
    current_health_status VARCHAR(50),
    risk_categorization BOOLEAN,
    sample_to_test_taken BOOLEAN,
    date_of_sample_taken DATE,
    result VARCHAR(50),
    travelled_with_positive_case BOOLEAN,
    remark VARCHAR(500)
)ENGINE = INNODB;";

if (mysqli_query($conn, $quarantineInfoCreateQuery)) {
    echo "<br>Table Quarantine Info created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// FAMILY DETAIL

$familyInfoCreateQuery = "CREATE TABLE family_info(
    _id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quarantine_id INT,
    under_five INT,
    five_to_ten INT,
    ten_to_seventeen INT,
    seventeen_to_fiftynine INT,
    sixty_and_above INT,
    details VARCHAR(500)
)ENGINE = INNODB;";

if (mysqli_query($conn, $familyInfoCreateQuery)) {
    echo "<br>Table Family Info created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// VISITED PLACE

$vistedPlaceInfoCreateQuery = "CREATE TABLE visited_place_info(
    _id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quarantine_id INT,
    location_name VARCHAR(100),
    lat VARCHAR(500),
    lon VARCHAR(500)
)ENGINE = INNODB;";

if (mysqli_query($conn, $vistedPlaceInfoCreateQuery)) {
    echo "<br>Table Visited Place Info created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// PRIMARY CONTACT DETAIL

$primaryContactInfoCreateQuery = "CREATE TABLE primary_contact_info(
    _id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quarantine_id INT,
    name VARCHAR(100),
    mobile_no VARCHAR(100),
    age INT,
    location VARCHAR(500),
    lat VARCHAR(500),
    lon VARCHAR(500)
)ENGINE = INNODB;";

if (mysqli_query($conn, $primaryContactInfoCreateQuery)) {
    echo "<br>Table Primary Contact Info created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// SECONDARY CONTACT DETAIL

$secondaryContactInfoCreateQuery = "CREATE TABLE secondary_contact_info(
    _id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quarantine_id INT,
    name VARCHAR(100),
    mobile_no VARCHAR(100),
    age INT,
    location VARCHAR(500),
    lat VARCHAR(500),
    lon VARCHAR(500)
)ENGINE = INNODB;";

if (mysqli_query($conn, $secondaryContactInfoCreateQuery)) {
    echo "<br>Table Secondary Contact Info created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
