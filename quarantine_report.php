<?php
if (isset($_COOKIE['keep_login'])) {
    if ($_COOKIE['keep_login'] == 'false') {
        header("Location: login.php");
        exit();
    }
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
    <title>Record</title>
</head>

<body>

    <main class="payments-page">

        <div class="header">
            <h1>Basic Info</h1>
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
                            <input id="organisation_name" type="text" placeholder="Name">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Age</label>
                            <input id="ward_no" type="text" placeholder="Age">
                        </div>

                        <div class="form-group radio-inline col-auto mb-3 col-md-3">
                            <label class="">Gender : </label>

                            <label class="custom-radio">Male <input id="sex" name="sex" type="radio"><span class="checkmark ml-2"></label>
                            <label class="custom-radio">Female <input name="sex" type="radio"><span class="checkmark ml-2"></label>
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Contact No</label>
                            <input id="address" type="text" placeholder="Contact No">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">District</label>
                            <input id="age" type="number" placeholder="District">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Address</label>
                            <input id="" type="text" placeholder="Address">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Location</label>
                            <input id="" type="text" placeholder="Location">
                        </div>
                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Passport No</label>
                            <input id="" type="text" placeholder="Passport No">
                        </div>
                        <div class="col-12 pb-3">
                            <hr class="my-4">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Origin Country</label>
                            <input id="" type="text" placeholder="Origin Country">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Origin State</label>
                            <input id="" type="text" placeholder="Origin State">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Origin District</label>
                            <input id="" type="text" placeholder="Origin District">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">PHC Area</label>
                            <input id="" type="text" placeholder="PHC Area">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Place to visit</label>
                            <select name="">
                                <option selected disabled>Place to visit</option>
                                <option value="month">Inter District</option>
                                <option value="between">Inter State</option>
                                <option value="between">International</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Departure Date</label>
                            <input id="" type="text" placeholder="Departure Date">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Arrival Date</label>
                            <input id="" type="text" placeholder="Arrival Date">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Date of Information Received</label>
                            <input id="" type="text" placeholder="Date of Information Received">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Source Of Information</label>
                            <select name="">
                                <option selected disabled>Source Of Information</option>
                                <option value="month">Airport</option>
                                <option value="between">Check post</option>
                                <option value="between">DMO Office</option>
                                <option value="between">Ward Member</option>
                                <option value="between">Junior Health Inspector(JHI)</option>
                                <option value="between">Junior Public Health Nurse</option>
                                <option value="between">ASHA Worker</option>
                                <option value="between">Volunteers</option>
                            </select>
                        </div>

                        <div class="col-12 pb-3">
                            <hr class="my-4">
                        </div>


                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Panchayat Ward No.</label>
                            <input id="" type="text" placeholder="Panchayat Ward No.">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Source of Contact Number</label>
                            <input id="" type="text" placeholder="Source of Contact Number">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Observation Started Date</label>
                            <input id="" type="text" placeholder="Observation Started Date">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Observation End Date</label>
                            <input id="" type="text" placeholder="Observation End Date">
                        </div>



                        <div class="form-group radio-inline col-auto mb-3 col-md-4">
                            <label class="">Current Health Status : </label>

                            <label class="custom-radio">Symptomatic<input name="Status" type="radio"><span class="checkmark ml-2"></label>
                            <label class="custom-radio">Asymptomatic<input name="Status" type="radio"><span class="checkmark ml-2"></label>
                        </div>

                        <div class="form-group radio-inline col-auto mb-3 col-md-4">
                            <label class="">Risk Categorization : </label>

                            <label class="custom-radio">High <input name="Risk" type="radio"><span class="checkmark ml-2"></label>
                            <label class="custom-radio">Low <input name="Risk" type="radio"><span class="checkmark ml-2"></label>
                        </div>

                        <div class="form-group radio-inline col-auto mb-3 col-md-4">
                            <label class="">Sample to test Taken : </label>

                            <label class="custom-radio">Yes <input name="test_Taken" type="radio"><span class="checkmark ml-2"></label>
                            <label class="custom-radio">No <input name="test_Taken" type="radio"><span class="checkmark ml-2"></label>
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Date of Sample Taken</label>
                            <input id="" type="date" placeholder="Date of Sample Taken">
                        </div>


                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Result</label>
                            <select name="">
                                <option selected disabled>Result</option>
                                <option value="month">NAPos</option>
                                <option value="between">Neg</option>
                                <option value="between">Pending</option>
                                <option value="between">Discharged</option>
                                <option value="between">Released</option>
                            </select>
                        </div>

                        <div class="form-group radio-inline col-auto mb-3 col-md-3 align-self-start pt-4">
                            <label class="">Travelled with Positive Case : </label>

                            <label class="custom-radio">Yes <input name="test_Taken" type="radio"><span class="checkmark ml-2"></label>
                            <label class="custom-radio">No <input name="test_Taken" type="radio"><span class="checkmark ml-2"></label>
                        </div>
                        <div class="form-group mb-3 col-md-6 ">
                            <label class="mb-2">Details</label>
                            <textarea name="" id="" rows="5"></textarea>
                        </div>

                        <div class="col-12">
                            <hr class="mt-4">
                        </div>

                        <div class="mb-2 col-md-12 ">
                            <label class="mb-3 mt-4"><b>Family Info</b></label>
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Under 5</label>
                            <input id="" type="text" placeholder="Under 5">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Between 5 - 10</label>
                            <input id="" type="text" placeholder="Between 5 - 10">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">Between 17 - 59</label>
                            <input id="" type="text" placeholder="Between 17 - 59">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <label class="mb-2">59 and above</label>
                            <input id="" type="text" placeholder="59 and above">
                        </div>

                        <div class="form-group mb-3 col-md-6 ">
                            <label class="mb-2">Details</label>
                            <textarea name="" id="" rows="5"></textarea>
                        </div>

                        <div class="col-12">
                            <hr class="mt-4">
                        </div>


                        <div class="mb-2 col-md-12 ">
                            <label class="mb-3 mt-4"><b>Visited Places</b></label>
                        </div>

                        <div class="form-group mb-3 col-md-4">
                            <label class="mb-2">Name of the Location</label>
                            <div class="add-group"><input id="" type="text" placeholder="Name of the Location"><button>+</button></div>
                            <div class="add-list">
                                <div class="item">Ernakulam<span class="close">X</span></div>
                                <div class="item">Alapuzha<span class="close">X<span></span></span></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="mt-4">
                        </div>

                        <div class="mb-2 col-md-12 ">
                            <label class="mb-3 mt-4"><b>Primary Contact Persons</b></label>
                        </div>

                        <div class="col-12 add-row-group">
                            <div class="row no-gutters all-form-group-wrap">
                                <div class="form-group mb-3 col-md-3">
                                    <label class="mb-2">Name </label>
                                    <input id="" type="text" placeholder="Name">
                                </div>
                                <div class="form-group mb-3 col-md-3">
                                    <label class="mb-2">Mobile Number</label>
                                    <input id="" type="text" placeholder="Name">
                                </div>
                                <div class="form-group mb-3 col-md-3">
                                    <label class="mb-2">Location</label>
                                    <input id="" type="text" placeholder="Location">
                                </div>
                                <div class="form-group mb-3 col-md-3 add-btn-wrap">
                                    <label class="mb-2">Age</label>
                                    <input id="" type="text" placeholder="Age">
                                    <button>+</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="table-responsive modal-responsive">

                                <table class="resizable editable data-table">
                                    <thead>
                                        <tr>
                                            <th class="">Name</th>
                                            <th class="">Mobile Number</th>
                                            <th class="">Location</th>
                                            <th class="">Age</th>
                                            <th class="trash"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Muneer</td>
                                            <td>64466554</td>
                                            <td>conctetur</td>
                                            <td>24</td>
                                            <td><button><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>Muneer</td>
                                            <td>64466554</td>
                                            <td>conctetur</td>
                                            <td>24</td>
                                            <td><button><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>Muneer</td>
                                            <td>64466554</td>
                                            <td>conctetur</td>
                                            <td>24</td>
                                            <td><button><i class="fa fa-trash" aria-hidden="true"></i></button></td>

                                        </tr>
                                        <tr>
                                            <td>Muneer</td>
                                            <td>64466554</td>
                                            <td>conctetur</td>
                                            <td>24</td>
                                            <td><button><i class="fa fa-trash" aria-hidden="true"></i></button></td>

                                        </tr>
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


                        <div class="col-12 add-row-group">
                            <div class="row no-gutters all-form-group-wrap">
                                <div class="form-group mb-3 col-md-3">
                                    <label class="mb-2">Name </label>
                                    <input id="" type="text" placeholder="Name">
                                </div>
                                <div class="form-group mb-3 col-md-3">
                                    <label class="mb-2">Mobile Number</label>
                                    <input id="" type="text" placeholder="Name">
                                </div>
                                <div class="form-group mb-3 col-md-3">
                                    <label class="mb-2">Location</label>
                                    <input id="" type="text" placeholder="Location">
                                </div>
                                <div class="form-group mb-3 col-md-3 add-btn-wrap">
                                    <label class="mb-2">Age</label>
                                    <input id="" type="text" placeholder="Age">
                                    <button>+</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="table-responsive modal-responsive">

                                <table class="resizable editable data-table">
                                    <thead>
                                        <tr>
                                            <th class="">Name</th>
                                            <th class="">Mobile Number</th>
                                            <th class="">Location</th>
                                            <th class="">Age</th>
                                            <th class="trash"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Muneer</td>
                                            <td>64466554</td>
                                            <td>conctetur</td>
                                            <td>24</td>
                                            <td><button><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>Muneer</td>
                                            <td>64466554</td>
                                            <td>conctetur</td>
                                            <td>24</td>
                                            <td><button><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>Muneer</td>
                                            <td>64466554</td>
                                            <td>conctetur</td>
                                            <td>24</td>
                                            <td><button><i class="fa fa-trash" aria-hidden="true"></i></button></td>

                                        </tr>
                                        <tr>
                                            <td>Muneer</td>
                                            <td>64466554</td>
                                            <td>conctetur</td>
                                            <td>24</td>
                                            <td><button><i class="fa fa-trash" aria-hidden="true"></i></button></td>

                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="map-wrapper mt-4">
                                <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9045.724588914265!2d-73.91995050493409!3d40.83568454670568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2f43aac16e2ff%3A0xac8fb867da716282!2sJoker%20Stairs!5e0!3m2!1sen!2sin!4v1588811071682!5m2!1sen!2sin" height="450" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>

                        <div class="sticky-buttons">

                            <button onclick="save()" class="btn-primary mb-3">Preview</button>

                            <button onclick="save()" class="btn-primary">Save</button>
                        </div>

                        <!-- <div class="form-group col-auto ml-auto">
                            <button onclick="save()" class="btn-primary">Submit</button>
                            <button onclick="showReport()" class="btn-dark print mx-3"> Print </button>
                            <button onclick="deleteRecord()" class="btn-dark dlt"> Delete </button>
                        </div> -->

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
    <script src="js/quarantine_add/add.js"></script>
</body>

</html>