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
        <h1>Record</h1>
        <div class="breadcrumb">
            <a href="index.php"><i class="fas fa-home"></i></a>
        </div>
        <div class="bottom-header">
        </div>
    </div>

    <div class="content">
        <div class="modal">
            <div class="row">

                <div class="form-group mb-3 col-md-3">
                    <input id="organisation_name" type="text" placeholder="Organisation Name">
                </div>

                <div class="form-group mb-3 col-md-3 ">
                    <input id="ward_no"  type="text" placeholder="Ward Number">
                </div>

                <div class="form-group mb-3 col-md-3 ">
                    <input id="full_name"  type="text" placeholder="Full Name">
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Sex</label>
                    <label  class="custom-radio">Male <input  id="sex" name="sex" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">Female <input  name="sex" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group mb-3 col-md-3 ">
                    <input id="age" type="number" placeholder="Age">
                </div>

                <div class="form-group mb-3 col-md-3 ">
                    <input id="address" type="text" placeholder="Address">
                </div>

                <div class="form-group mb-3 col-md-3 ">
                    <input id="current_country"  type="text" placeholder="Current country">
                </div>




                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Already Registered In Norka</label>
                    <label  class="custom-radio">Yes <input  id="return_registered" name="return_registered" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input name="return_registered" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Any desease ?</label>
                    <label  class="custom-radio">Yes <input  id="any_disease" name="any_disease" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input name="any_disease" type="radio"><span class="checkmark ml-2"></label>
                </div>


                <div class="form-group mb-3 col-md-3 ">
                    <input id="disease_info" type="text" placeholder="If Yes Explain">
                </div>



                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Does home have facility for Home Quarantine</label>
                    <label  class="custom-radio">Yes <input  id="room_available" name="room_available" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input  name="room_available" type="radio"><span class="checkmark ml-2"></label>
                </div>


<label >If Yes</label>


<div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Aged Person</label>
                    <label  class="custom-radio">Yes <input  id="aged_person" name="aged_person" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input name="aged_person" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Bed Rest Person</label>
                    <label  class="custom-radio">Yes <input  id="bed_rest_person" name="bed_rest_person" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input  name="bed_rest_person" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Intensive Desease Persons</label>
                    <label  class="custom-radio">Yes <input  id="desease_people" name="desease_people" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input name="desease_people" type="radio"><span class="checkmark ml-2"></label>
                </div>


                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Pregnant Persons</label>
                    <label  class="custom-radio">Yes <input  id="pregnant_people" name="pregnant_people" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input  name="pregnant_people" type="radio"><span class="checkmark ml-2"></label>
                </div>


                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >RRT Recommendation for Home Quarintine</label>
                    <label  class="custom-radio">Yes <input  id="confirmation_from_rrt" name="confirmation_from_rrt" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input  name="confirmation_from_rrt" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >If No, Relative Home Available</label>
                    <label  class="custom-radio">Yes <input  id="relative_home_available" name="relative_home_available" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input name="relative_home_available" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >If Yes, RRT Recommended For Relative House</label>
                    <label  class="custom-radio">Yes <input  id="relative_confirmation_from_rrt" name="relative_confirmation_from_rrt" type="radio" ><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input  name="relative_confirmation_from_rrt" type="radio" ><span class="checkmark ml-2"></label>
                </div>


                <div class="form-group mb-3 col-md-3 ">
                    <input id="rrt_name"  type="text" placeholder="RRT Conviner Name and Sign">
                </div>

                <div class="form-group mb-3 col-md-3 form-group-inline ml-auto bill-actions text-right">
                    <button onclick="save()" class="btn-primary mr-2">Save</button>
                    <button class="btn-dark"> Print </button>
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
    <script src="js/add/add.js"></script>
</body>

</html>
