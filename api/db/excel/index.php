<?php
include '../common.php';

if (!$conn) {
    mysqli_error();
    die();
}
mysqli_query($conn, "DELETE FROM country_list");
mysqli_query($conn, "DELETE FROM panchayat_list");

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
// If you need to parse XLS files, include php-excel-reader
require 'php-excel-reader/excel_reader2.php';

require 'SpreadsheetReader.php';

$Reader = new SpreadsheetReader('country.xls');
$Reader->ChangeSheet(0);

$a = 0;
echo "<html><body>";

foreach ($Reader as $Row) {
    if ($a == 0) {
        $a = 1;
    } else {
        $country = trim($Row[0]);
        insertCountry($country);
    }

}

$Reader = new SpreadsheetReader('state.xls');
$Reader->ChangeSheet(3);

$a = 0;
echo "<html><body>";

foreach ($Reader as $Row) {
    if ($a == 0) {
        $a = 1;
    } else {
        $panchayat = trim($Row[2]);
        insertPan($panchayat, trim($Row[0]), "Panchayat");
    }

}

echo "<html><body>";
insertPan("Kochi", "Ernakulam", "Corporation");
insertPan("Thiruvananthapuram", "Thiruvananthapuram", "Corporation");
insertPan("Kozhikode", "Kozhikode", "Corporation");
insertPan("Kollam", "Kollam", "Corporation");
insertPan("Thrissur", "Thrissur", "Corporation");
insertPan("Kannur", "Kannur", "Corporation");

$Reader->ChangeSheet(2);

$a = 0;
echo "<html><body>";

foreach ($Reader as $Row) {
    if ($a == 0) {
        $a = 1;
    } else {
        $panchayat = trim($Row[1]);
        insertPan($panchayat, trim($Row[0]), "Municipality");
    }

}

echo "</body></html>";
function insertCountry($name)
{
    include '../common.php';

    if (!$conn) {
        mysqli_error();
        die();
    }
    $insertQuery = "INSERT INTO country_list( name ) VALUES ('" . mysql_escape_mimic($name) . "');";
    if (mysqli_query($conn, $insertQuery)) {
        echo "<br>$name Inserted Successfully";
    }

}

function insertPan($name, $district, $type)
{
    include '../common.php';

    if (!$conn) {
        mysqli_error();
        die();
    }
    $insertQuery = "INSERT INTO panchayat_list( name,district,type ) VALUES ('" . mysql_escape_mimic($name) . "', '" . mysql_escape_mimic($district) . "', '" . mysql_escape_mimic($type) . "');";
    if (mysqli_query($conn, $insertQuery)) {
        echo "<br>$name Inserted Successfully";
    }

}

function mysql_escape_mimic($inp)
{
    if (is_array($inp)) {
        return array_map(__METHOD__, $inp);
    }

    if (!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }

    return $inp;
}
