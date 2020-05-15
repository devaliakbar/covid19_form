<?php
if (isset($_COOKIE['keep_login'])) {
    if ($_COOKIE['keep_login'] == 'false') {
        header("Location: login.php");
        exit();
    }
    $a_type = $_COOKIE['type'];
} else {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Quarantine Form</title>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBC0qDIqeNTbOwEtKjvvjNsEQPYmsEYJ_k"></script>

</head>

<body>

    <main class="quarantine-form ">

        <div class="header">
            <h1>Quarantine Form</h1>
            <div class="breadcrumb">
                <a href="#" onclick="window.location.replace('quarantine_form_list.php')"><i class="fas fa-home"></i></a>
            </div>
            <div class="bottom-header">
            </div>
        </div>

        <div class="content">
            <div class="modal">

                <div class="basic-info">
                    <div class="row">

                        <div class="form-group mb-3 col-md-3">
                            <label class="mb-2">Name</label>
                            <input id="full_name" type="text" placeholder="Name" disabled>
                        </div>

                        <div class="form-group mb-3 col-md-1">
                            <label class="mb-2">Age</label>
                            <input id="age" type="number" placeholder="Age" disabled>
                        </div>

                        <div class="form-group radio-inline col-auto mb-3 col-md-3">
                            <label class="">Gender : </label>

                            <label class="custom-radio">Male <input id="sex" name="sex" type="radio" disabled><span class="checkmark ml-2"></label>
                            <label class="custom-radio">Female <input name="sex" type="radio" disabled><span class="checkmark ml-2"></label>
                        </div>

                        <div class="form-group mb-3 col-md-2">
                            <label class="mb-2">Contact No</label>
                            <input id="contact_number" type="number" placeholder="Contact No" disabled>
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">District</label>
                            <input disabled id="district" type="text" placeholder="District">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Address</label>
                            <input disabled disabled id="address" type="text" placeholder="Address">
                        </div>

                        <div class="form-group mb-3 col-md-2">
                            <label class="mb-2">State Statutes</label>
                            <select id="state_statutes" disabled>
                                <option value="" selected>State Statutes</option>
                                <option value="Municipality">Municipality</option>
                                <option value="Corporation">Corporation</option>
                                <option value="Panchayat">Panchayat</option>
                            </select>
                        </div>


                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">State Statutes Name</label>
                            <input id="state_statutes_name" type="text" placeholder="State Statutes Name" disabled>
                        </div>

                        <div class="form-group mb-3 col-md-2">
                            <label class="mb-2">Location</label>
                            <input disabled id="location" type="text" placeholder="Location">
                        </div>
                        <div class="form-group mb-3 col-md-2">
                            <label class="mb-2">Passport No / Adhar Card No</label>
                            <input disabled id="passport_number" type="text" placeholder="Passport No / Adhar Card No">
                        </div>
                        <div class="col-12 pb-3">
                            <hr class="my-4">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Place to visit</label>
                            <select disabled id="place_to_vist">
                                <option value="" selected>Place to visit</option>
                                <option value="Inter District">Inter District</option>
                                <option value="Inter State">Inter State</option>
                                <option value="International">International</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Arrive From</label>
                            <input disabled id="orgin_country" type="text" placeholder="Arrive From">
                        </div>

                        <!-- <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Origin State</label>
                            <input disabled id="orgin_state" type="text" placeholder="Origin State">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Origin District</label>
                            <input disabled id="orgin_district" type="text" placeholder="Origin District">
                        </div> -->

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">PHC / Area</label>
                            <input disabled id="phc_area" type="text" placeholder="PHC / Area">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">PHC Medical Officer Contact No</label>
                            <input disabled id="phc_medical_officer_contact_number" type="number" placeholder="PHC Medical Officer Contact No">
                        </div>



                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Departure Date</label>
                            <input disabled id="departure_date" type="date" placeholder="Departure Date">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Arrival Date</label>
                            <input disabled id="arrival_date" type="date" placeholder="Arrival Date">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Date of Information Received</label>
                            <input disabled id="date_of_information_received" type="date" placeholder="Date of Information Received">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Source Of Information</label>
                            <select disabled id="source_of_information">
                                <option value="" selected>Source Of Information</option>
                                <option value="Airport">Airport</option>
                                <option value="Check Post">Check Post</option>
                                <option value="DMO Office">DMO Office</option>
                                <option value="Ward Member">Ward Member</option>
                                <option value="Junior Health Inspector(JHI)">Junior Health Inspector(JHI)</option>
                                <option value="Junior Public Health Nurse">Junior Public Health Nurse</option>
                                <option value="ASHA Worker">ASHA Worker</option>
                                <option value="Volunteers">Volunteers</option>
                            </select>
                        </div>

                        <div class="col-12 pb-3">
                            <hr class="my-4">
                        </div>


                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Panchayat Ward No.</label>
                            <input disabled id="panchayat_ward_no" type="text" placeholder="Panchayat Ward No.">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Source of Contact Number</label>
                            <input disabled id="source_of_contact_number" type="number" placeholder="Source of Contact Number">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Observation Started Date</label>
                            <input disabled id="observation_started_date" type="date" placeholder="Observation Started Date">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Observation End Date</label>
                            <input disabled id="observation_end_date" type="date" placeholder="Observation End Date">
                        </div>



                        <div class="form-group radio-inline col-auto mb-3 col-md-4">
                            <label class="">Current Health Status : </label>

                            <label class="custom-radio">Symptomatic<input disabled id="current_health_status" name="current_health_status" type="radio"><span class="checkmark ml-2"></label>
                            <label class="custom-radio">Asymptomatic<input disabled name="current_health_status" type="radio"><span class="checkmark ml-2"></label>
                        </div>

                        <div class="form-group radio-inline col-auto mb-3 col-md-4">
                            <label class="">Risk Categorization : </label>

                            <label class="custom-radio">High <input disabled id="risk_categorization" name="risk_categorization" type="radio"><span class="checkmark ml-2"></label>
                            <label class="custom-radio">Low <input disabled name="risk_categorization" type="radio"><span class="checkmark ml-2"></label>
                        </div>

                        <div class="form-group radio-inline col-auto mb-3 col-md-4">
                            <label class="">Sample to test Taken : </label>

                            <label class="custom-radio">Yes <input disabled id="sample_to_test_taken" name="sample_to_test_taken" type="radio"><span class="checkmark ml-2"></label>
                            <label class="custom-radio">No <input disabled name="sample_to_test_taken" type="radio"><span class="checkmark ml-2"></label>
                        </div>

                        <div class="form-group mb-3 col-md-2">
                            <label class="mb-2">Date of Sample Taken</label>
                            <input disabled id="date_of_sample_taken" type="date" placeholder="Date of Sample Taken">
                        </div>


                        <div class="form-group mb-3 col-md-2">
                            <label class="mb-2">Result</label>
                            <select disabled id="result">
                                <option value="" selected>Result</option>
                                <option value="NAPos">NAPos</option>
                                <option value="Neg">Neg</option>
                                <option value="Pending">Pending</option>
                                <option value="Discharged">Discharged</option>
                                <option value="Released">Released</option>
                            </select>
                        </div>

                        <div class="form-group radio-inline col-auto mb-3 col-md-3 align-self-start pt-4">
                            <label class="">Travelled with Positive Case : </label>

                            <label class="custom-radio">Yes <input disabled id="travelled_with_positive_case" name="travelled_with_positive_case" type="radio"><span class="checkmark ml-2"></label>
                            <label class="custom-radio">No <input disabled name="travelled_with_positive_case" type="radio"><span class="checkmark ml-2"></label>
                        </div>
                        <div class="form-group mb-3 col-md-5 ">
                            <label class="mb-2">Remark</label>
                            <textarea disabled id="remark" rows="5"></textarea>
                        </div>

                        <div class="col-12">
                            <hr class="mt-4">
                        </div>
                        <div class="col-12">

                            <div id="if_positive_only" >

                                <div class="row">
                                    <div class="mb-2 col-md-12 ">
                                        <label class="mb-3 mt-4"><b>Family Info</b></label>
                                    </div>

                                    <div class="form-group mb-3 col-md-2">
                                        <label class="mb-2">Under 5</label>
                                        <input disabled id="under_five" type="number" placeholder="Under 5">
                                    </div>

                                    <div class="form-group mb-3 col-md-2">
                                        <label class="mb-2">Between 5 - 10</label>
                                        <input disabled id="five_to_ten" type="number" placeholder="Between 5 - 10">
                                    </div>

                                    <div class="form-group mb-3 col-md-2">
                                        <label class="mb-2">Between 10 - 17</label>
                                        <input disabled id="ten_to_seventeen" type="number" placeholder="Between 10 - 17">
                                    </div>

                                    <div class="form-group mb-3 col-md-2">
                                        <label class="mb-2">Between 17 - 59</label>
                                        <input disabled id="seventeen_to_fiftynine" type="number" placeholder="Between 17 - 59">
                                    </div>

                                    <div class="form-group mb-3 col-md-2">
                                        <label class="mb-2">60 and above</label>
                                        <input disabled id="sixty_and_above" type="number" placeholder="60 and above">
                                    </div>

                                    <div class="form-group mb-3 col-md-6 ">
                                        <label class="mb-2">Details</label>
                                        <textarea disabled id="details" rows="5"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <hr class="mt-4">
                                    </div>


                                    <div class="mb-2 col-md-12 ">
                                        <label class="mt-4"><b>Visited Places</b></label>
                                    </div>

                                    <div class="form-group mb-3 col-md-4 borderd-add-list">
                                        <!-- <label class="mb-2">Name of the Location</label>
<div class="add-group"><input disabled id="visited_location" type="text" placeholder="Name of the Location"><button onclick="addVisitedPlace()">+</button></div> -->
                                        <div class="add-list">

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr class="mt-4">
                                    </div>



                                    <div class="mb-2 col-md-12 ">
                                        <label class="mb-3 mt-4"><b>Primary Contact Persons</b></label>
                                    </div>

                                    <!-- <div class="col-12 add-row-group">
<div class="row no-gutters all-form-group-wrap">
    <div class="form-group mb-3 col-md-3">
        <label class="mb-2">Name </label>
        <input disabled id="p_name" type="text" placeholder="Name">
    </div>
    <div class="form-group mb-3 col-md-3">
        <label class="mb-2">Mobile Number</label>
        <input id="p_mobile" type="number" placeholder="Mobile Number">
    </div>
    <div class="form-group mb-3 col-md-3">
        <label class="mb-2">Location</label>
        <input id="p_location" type="text" placeholder="Location">
    </div>
    <div class="form-group mb-3 col-md-3 add-btn-wrap">
        <label class="mb-2">Age</label>
        <input id="p_age" type="number" placeholder="Age">
        <button onclick="addPrimaryContactPerson()">+</button>
    </div>
</div>
</div> -->

                                    <div class="col-12">
                                        <div class="table-responsive modal-responsive">

                                            <table class="resizable editable data-table">
                                                <thead>
                                                    <tr>
                                                        <th class="">Name</th>
                                                        <th class="">Mobile Number</th>
                                                        <th class="">Age</th>
                                                        <th class="">Location</th>


                                                    </tr>
                                                </thead>
                                                <tbody id="primary_contact_tbl">

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr class="mt-4">
                                    </div>

                                    <div class="mb-2 col-md-12 ">
                                        <label class="mb-3 mt-4"><b>Secondary Contact Persons</b></label>
                                    </div>


                                    <!-- <div class="col-12 add-row-group">
<div class="row no-gutters all-form-group-wrap">
    <div class="form-group mb-3 col-md-3">
        <label class="mb-2">Name </label>
        <input id="s_name" type="text" placeholder="Name">
    </div>
    <div class="form-group mb-3 col-md-3">
        <label class="mb-2">Mobile Number</label>
        <input id="s_mobile" type="number" placeholder="Mobile Number">
    </div>
    <div class="form-group mb-3 col-md-3">
        <label class="mb-2">Location</label>
        <input id="s_location" type="text" placeholder="Location">
    </div>
    <div class="form-group mb-3 col-md-3 add-btn-wrap">
        <label class="mb-2">Age</label>
        <input id="s_age" type="number" placeholder="Age">
        <button onclick="addSecondaryContactPerson()">+</button>
    </div>
</div>
</div> -->

                                    <div class="col-12">
                                        <div class="table-responsive modal-responsive">

                                            <table class="resizable editable data-table">
                                                <thead>
                                                    <tr>
                                                        <th class="">Name</th>
                                                        <th class="">Mobile Number</th>
                                                        <th class="">Age</th>
                                                        <th class="">Location</th>


                                                    </tr>
                                                </thead>
                                                <tbody id="secondary_contact_tbl">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-12">
                            <div style="height: 500px;" id="map" class="map-wrapper mt-4">



                                <!-- <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9045.724588914265!2d-73.91995050493409!3d40.83568454670568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2f43aac16e2ff%3A0xac8fb867da716282!2sJoker%20Stairs!5e0!3m2!1sen!2sin!4v1588811071682!5m2!1sen!2sin" height="450" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                            </div>
                        </div>


                        <?php
                        if ($a_type == "1") {

                            echo ' <div class="sticky-buttons">

    <button onclick="deleteReport()" class="btn-primary mb-3 preview_btn">Delete</button>

    <button onclick="editInfo()" class="btn-primary mb-3">Edit</button>

</div>';
                        }

                        ?>




                    </div>
                </div>



            </div>
        </div>



    </main>

    <div class="loader">
        <div class="spinner"></div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/resizableColumns.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/quarantine_report/report.js"></script>
</body>

</html>