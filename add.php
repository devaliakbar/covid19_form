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
    <title>Home</title>
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
                    <input  type="text" placeholder="Organisation Name">
                </div>

                <div class="form-group mb-3 col-md-3 ">
                    <input  type="text" placeholder="Ward Number">
                </div>

                <div class="form-group mb-3 col-md-3 ">
                    <input  type="text" placeholder="Full Name">
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Sex</label>
                    <label  class="custom-radio">Male <input  id="sex" name="sex" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">Female <input id="sex" name="sex" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group mb-3 col-md-3 ">
                    <input  type="text" placeholder="Age">
                </div>

                <div class="form-group mb-3 col-md-3 ">
                    <input  type="text" placeholder="Address">
                </div>

                <div class="form-group mb-3 col-md-3 ">
                    <input  type="text" placeholder="Current country">
                </div>




                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Already Registered In Norka</label>
                    <label  class="custom-radio">Yes <input  id="registered_norka" name="registered_norka" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input id="registered_norka" name="registered_norka" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Any desease ?</label>
                    <label  class="custom-radio">Yes <input  id="deseases" name="deseases" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input id="deseases" name="deseases" type="radio"><span class="checkmark ml-2"></label>
                </div>


                <div class="form-group mb-3 col-md-3 ">
                    <input  type="text" placeholder="If Yes Explain">
                </div>



                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Does home have facility for Home Quarantine</label>
                    <label  class="custom-radio">Yes <input  id="home_quarantine" name="home_quarantine" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input id="home_quarantine" name="home_quarantine" type="radio"><span class="checkmark ml-2"></label>
                </div>


<label >If Yes</label>


<div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Aged Person</label>
                    <label  class="custom-radio">Yes <input  id="aged_persons" name="aged_persons" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input id="aged_persons" name="aged_persons" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Bed Rest Person</label>
                    <label  class="custom-radio">Yes <input  id="bed_persons" name="bed_persons" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input id="bed_persons" name="bed_persons" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Intensive Desease Persons</label>
                    <label  class="custom-radio">Yes <input  id="desease_persons" name="desease_persons" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input id="desease_persons" name="desease_persons" type="radio"><span class="checkmark ml-2"></label>
                </div>


                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >Pregnant Persons</label>
                    <label  class="custom-radio">Yes <input  id="pregnant_persons" name="pregnant_persons" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input id="pregnant_persons" name="pregnant_persons" type="radio"><span class="checkmark ml-2"></label>
                </div>


                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >RRT Recommendation for Home Quarintine</label>
                    <label  class="custom-radio">Yes <input  id="rrt_recommendation" name="rrt_recommendation" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input id="rrt_recommendation" name="rrt_recommendation" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >If No, Relative Home Available</label>
                    <label  class="custom-radio">Yes <input  id="relative_home" name="relative_home" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input id="relative_home" name="relative_home" type="radio"><span class="checkmark ml-2"></label>
                </div>

                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label >If Yes, RRT Recommended For Relative House</label>
                    <label  class="custom-radio">Yes <input  id="relative_home_recommended" name="relative_home_recommended" type="radio"><span class="checkmark ml-2"></label>
                    <label  class="custom-radio">No <input id="relative_home_recommended" name="relative_home_recommended" type="radio"><span class="checkmark ml-2"></label>
                </div>


                <div class="form-group mb-3 col-md-3 ">
                    <input  type="text" placeholder="RRT Conviner Name and Sign">
                </div>

                <div class="form-group mb-3 col-md-3 form-group-inline ml-auto bill-actions text-right">
                    <button class="btn-primary mr-2">Save</button>
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
</body>

</html>
