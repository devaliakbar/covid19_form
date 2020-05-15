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
        insert($country, "country_list");
    }

}

$Reader = new SpreadsheetReader('state.xls');
$Reader->ChangeSheet(7);

$a = 0;
echo "<html><body>";

foreach ($Reader as $Row) {
    if ($a == 0) {
        $a = 1;
    } else {
        $panchayat = trim($Row[2]);
        insert($panchayat, "panchayat_list");
    }

}

$Reader->ChangeSheet(6);

$a = 0;
echo "<html><body>";

foreach ($Reader as $Row) {
    if ($a == 0) {
        $a = 1;
    } else {
        $panchayat = trim($Row[0]);
        insert($panchayat, "panchayat_list");
    }

}

$Reader->ChangeSheet(5);

$a = 0;
echo "<html><body>";

foreach ($Reader as $Row) {
    if ($a == 0) {
        $a = 1;
    } else {
        $panchayat = trim($Row[1]);
        insert($panchayat, "panchayat_list");
    }

}

echo "</body></html>";
function insert($name, $tableName)
{
    include '../common.php';

    if (!$conn) {
        mysqli_error();
        die();
    }
    $insertQuery = "INSERT INTO $tableName( name ) VALUES ('" . mysql_escape_mimic($name) . "');";
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
