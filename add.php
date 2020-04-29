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
        <h1>Service Details</h1>
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
                    <input id="name" type="text" placeholder="Name">
                    <ul class="searchList">

                    </ul>
                </div>

                <div class="form-group mb-3 col-md-3 offset-md-6">
                    <input id="date" type="text" placeholder="Mobile">
                </div>

                <div class="form-group mb-3 col-md-3 custom-select-group">
                    <label for="cost">Type : </label>
                    <div class="custom-select">
                        <select name="" id="">
                            <option value="">Mobile</option>
                            <option value="">Laptop</option>
                            <option value="">Accesories</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-3 ">
                    <input id="date" type="text" placeholder="Make">
                </div>
                <div class="form-group mb-3 col-md-3 ">
                    <input id="date" type="text" placeholder="Model">
                </div>
                <div class="form-group mb-3 col-md-3 ">
                    <input id="date" type="text" placeholder="IMEI No">
                </div>


                <div class="form-group radio-inline col-auto mb-3 col-md-3">
                    <label for="ano">Check Another Complaint</label>
                    <label for="y" class="custom-radio">Yes <input name="ano" id="y" type="radio"><span class="checkmark ml-2"></label>
                    <label for="n" class="custom-radio">No <input name="ano" id="n" type="radio"><span class="checkmark ml-2"></label>
                </div>
                <div class="form-group radio-inline  mb-3 col-md-3">
                    <label for="method">Return Entry</label>
                    <label for="cash" class="custom-radio">Yes <input name="method" id="cash" type="radio"><span class="checkmark ml-2"></label>
                    <label for="card" class="custom-radio">No <input name="method" id="card" type="radio"><span class="checkmark ml-2"></label>
                </div>


                <div class="col-12">
                    <div class="row">
                        <div class="form-group mb-3 col-md-3  mb-5 mt-3">
                            <div class="add-group"><input id="date" type="text" placeholder="Complaint"><button>+</button></div>
                            <div class="add-list">
                                <div class='item'>sdafsd<span class='close'>X</span></div>
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-3  mb-5 mt-3">
                            <div class="add-group"><input id="date" type="text" placeholder="Remarks"><button>+</button></div>
                            <div class="add-list">
                                <div class='item'>sdafsd<span class='close'>X</span></div>
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-3  mb-5 mt-3">
                            <div class="add-group"><input id="date" type="text" placeholder="Service Details"><button>+</button></div>
                            <div class="add-list">
                                <div class='item'>sdafsd<span class='close'>X</span></div>
                            </div>
                        </div>

                        <div class="form-group mb-3 col-md-3  mb-5 mt-3">
                            <div class="add-group"><input id="date" type="text" placeholder="Accesories Collected"><button>+</button></div>
                            <div class="add-list">
                                <div class='item'>sdafsd<span class='close'>X</span></div>
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <input id="inv_no" type="text" placeholder="Estimate Amount">
                        </div>

                        <div class="form-group mb-3 col-md-3 ">
                            <input id="inv_no" type="text" placeholder="Advance">
                        </div>
                        <div class="form-group mb-3 col-md-3 form-group-inline">
                            <label for="a_name">Est Delivery Date : </label>
                            <input id="a_name" type="date">
                        </div>
                    </div>
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
    <script src="js/home/home.js"></script>
</body>

</html>
