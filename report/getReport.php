<?php
error_reporting(E_ERROR | E_PARSE);
include '../api/db/common.php';

require_once 'phpexcel/Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$sheet = $objPHPExcel->getActiveSheet();

//FIRST

$objWorkSheet = $objPHPExcel->createSheet(0);

$objWorkSheet->setTitle('Report');
$objWorkSheet->getColumnDimension("A")->setAutoSize(true);
$objWorkSheet->getColumnDimension("B")->setAutoSize(true);
$objWorkSheet->getColumnDimension("C")->setAutoSize(true);
$objWorkSheet->getColumnDimension("D")->setAutoSize(true);
$objWorkSheet->getColumnDimension("E")->setAutoSize(true);
$objWorkSheet->getColumnDimension("F")->setAutoSize(true);
$objWorkSheet->getColumnDimension("G")->setAutoSize(true);
$objWorkSheet->getColumnDimension("H")->setAutoSize(true);
$objWorkSheet->getColumnDimension("I")->setAutoSize(true);
$objWorkSheet->getColumnDimension("J")->setAutoSize(true);
$objWorkSheet->getColumnDimension("K")->setAutoSize(true);
$objWorkSheet->getColumnDimension("L")->setAutoSize(true);
$objWorkSheet->getColumnDimension("M")->setAutoSize(true);
$objWorkSheet->getStyle("A1:M1")->getFont()->setBold(true);

$objWorkSheet->setCellValue('A1', 'SNo.');
$objWorkSheet->setCellValue('B1', 'Name');
$objWorkSheet->setCellValue('C1', 'Age');
$objWorkSheet->setCellValue('D1', 'Sex');
$objWorkSheet->setCellValue('E1', 'Address');
$objWorkSheet->setCellValue('F1', 'Panchayat');
$objWorkSheet->setCellValue('G1', 'Ward');
$objWorkSheet->setCellValue('H1', 'Phone No.');
$objWorkSheet->setCellValue('I1', 'Institution Name');
$objWorkSheet->setCellValue('J1', 'Arrived From');
$objWorkSheet->setCellValue('K1', 'Date of Arrival');
$objWorkSheet->setCellValue('L1', 'Quarantine Started Date');
$objWorkSheet->setCellValue('M1', 'Quarantine Started Date');

$queryForFechingRecords = "SELECT
full_name,
sex,
age,
address,
state_statutes_name,
panchayat_ward_no,
contact_number,
orgin_country,
phc_area,
arrival_date,
observation_started_date,
observation_end_date
FROM
quarantine_info";

$result = mysqli_query($conn, $queryForFechingRecords);
if (mysqli_num_rows($result) > 0) {
    $count = 2;
    while ($row = mysqli_fetch_assoc($result)) {
        $sex = "";

        if ($row['sex'] == "0") {
            $sex = "Female";
        }

        if ($row['sex'] == "1") {
            $sex = "Male";
        }

        $startDate = $row['observation_started_date'];
        if ($startDate == "0000-00-00") {
            $startDate = "";
        }

        $endDate = $row['observation_end_date'];
        if ($endDate == "0000-00-00") {
            $endDate = "";
        }

        $arrivalDate = $row['arrival_date'];
        if ($arrivalDate == "0000-00-00") {
            $arrivalDate = "";
        }

        $objWorkSheet->setCellValue("A$count", $count - 1);
        $objWorkSheet->setCellValue("B$count", $row['full_name']);
        $objWorkSheet->setCellValue("C$count", $row['age']);
        $objWorkSheet->setCellValue("D$count", $sex);
        $objWorkSheet->setCellValue("E$count", $row['address']);
        $objWorkSheet->setCellValue("F$count", $row['state_statutes_name']);
        $objWorkSheet->setCellValue("G$count", $row['panchayat_ward_no']);
        $objWorkSheet->setCellValue("H$count", $row['contact_number']);
        $objWorkSheet->setCellValue("I$count", $row['phc_area']);
        $objWorkSheet->setCellValue("J$count", $row["orgin_country"]);
        $objWorkSheet->setCellValue("K$count", $arrivalDate);
        $objWorkSheet->setCellValue("L$count", $startDate);
        $objWorkSheet->setCellValue("M$count", $endDate);

        $count++;

    }
}

//SECOND
$objWorkSheet = $objPHPExcel->createSheet(1);

$objWorkSheet->setTitle('Summary');
$objWorkSheet->getColumnDimension("A")->setAutoSize(true);
$objWorkSheet->getColumnDimension("B")->setAutoSize(true);
$objWorkSheet->getColumnDimension("C")->setAutoSize(true);
$objWorkSheet->getColumnDimension("D")->setAutoSize(true);
$objWorkSheet->getColumnDimension("E")->setAutoSize(true);
$objWorkSheet->getStyle("A1:E1")->getFont()->setBold(true);

$objWorkSheet->setCellValue('A1', 'Male');
$objWorkSheet->setCellValue('B1', 'Female');
$objWorkSheet->setCellValue('C1', 'Above 60');
$objWorkSheet->setCellValue('D1', 'Below 10');
$objWorkSheet->setCellValue('E1', 'Antinatal');

$query = "SELECT _id FROM quarantine_info WHERE sex = 0;";
$result = mysqli_query($conn, $query);
$femaleCount = mysqli_num_rows($result);

$query = "SELECT _id FROM quarantine_info WHERE sex = 1;";
$result = mysqli_query($conn, $query);
$maleCount = mysqli_num_rows($result);

$query = "SELECT _id FROM quarantine_info WHERE age > 60;";
$result = mysqli_query($conn, $query);
$above60 = mysqli_num_rows($result);

$query = "SELECT _id FROM quarantine_info WHERE age < 10;";
$result = mysqli_query($conn, $query);
$lessThan10 = mysqli_num_rows($result);

$query = "SELECT _id FROM quarantine_info WHERE result = 'NAPos' AND age > 18 AND sex = 0;";
$result = mysqli_query($conn, $query);
$antinatalCount = mysqli_num_rows($result);

$objWorkSheet->setCellValue('A2', $maleCount);
$objWorkSheet->setCellValue('B2', $femaleCount);
$objWorkSheet->setCellValue('C2', $above60);
$objWorkSheet->setCellValue('D2', $lessThan10);
$objWorkSheet->setCellValue('E2', $antinatalCount);

//FILE NAME
$FILENAME = "report";

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $FILENAME . '.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
