<?php
include 'db/common.php';

$body = json_decode(file_get_contents('php://input'), true);

if (mysqli_query($conn, "DELETE FROM family_info WHERE quarantine_id = '" . $body['id'] . "'")) {

    if (mysqli_query($conn, "DELETE FROM primary_contact_info WHERE quarantine_id = '" . $body['id'] . "'")) {

        if (mysqli_query($conn, "DELETE FROM secondary_contact_info WHERE quarantine_id = '" . $body['id'] . "'")) {

            if (mysqli_query($conn, "DELETE FROM visited_place_info WHERE quarantine_id = '" . $body['id'] . "'")) {

                if (mysqli_query($conn, "DELETE FROM quarantine_info WHERE _id = '" . $body['id'] . "'")) {
                    //FOR TRANSACTION
                    mysqli_commit($conn);
                    $response["success"] = true;
                } else {
                    //FOR TRANSACTION
                    mysqli_rollback($conn);
                }

            } else {
                //FOR TRANSACTION
                mysqli_rollback($conn);
            }

        } else {
            //FOR TRANSACTION
            mysqli_rollback($conn);
        }

    } else {
        //FOR TRANSACTION
        mysqli_rollback($conn);
    }

} else {
    //FOR TRANSACTION
    mysqli_rollback($conn);
}

echo json_encode($response);
