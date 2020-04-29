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

    <main class="items-manage-page">

    <div class="header">
    <h1>Services</h1>
    <div class="breadcrumb">
        <a href="add.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
        <a href="index.php"><i class="fas fa-home"></i></a>
    </div>
    <div class="bottom-header">
    </div>
</div>
<div class="content">
    <div class="table-wrap">
        <div class="searchbox">
            <form class="form-inline main">
                <div class="form-group">
                    <input type="text" name="" class="form-control" placeholder="Search" aria-describedby="helpId">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
<!--
            <form class="form-additional form-inline row">

                <div class="form-group col-auto">
                    <input type="text" name="" class="form-control" placeholder="Name" aria-describedby="helpId">
                </div>

                <div class="form-group col-auto">
                    <input type="text" name="" class="form-control" placeholder="Mobile" aria-describedby="helpId">
                </div>

                <div class="form-group col-auto">
                    <input type="text" name="" class="form-control" placeholder="Job No" aria-describedby="helpId">
                </div>

                <div class="form-group col-auto">
                    <select name="">
                        <option selected disabled>Work Type</option>
                        <option value="month">Repair</option>
                        <option value="between">Modify</option>
                    </select>
                </div>

                <div class="form-group col-auto">
                    <select name="">
                        <option selected disabled>Status</option>
                        <option value="month">Pending</option>
                        <option value="between">Doing</option>
                        <option value="between">Completed</option>
                    </select>
                </div>

                <div class="form-group search-by-date single col-auto ml-auto">
                    <select name="" class="mr-2">
                        <option value="single">Date</option>
                        <option value="month">Month & Year</option>>
                        <option value="between">Between</option>
                    </select>

                    <input type="date" name="" class="form-control day" id="single" placeholder="Search">

                    <div class="date-between">
                        <input type="date" name="" id="from"><span class="mx-2">To</span> <input type="date" name=""
                            id="to">
                    </div>
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>

            </form> -->

        </div>
        <div class="table-responsive">
            <div class="resizable editable data-table table">
                <div class="thead">
                    <div class="tr">
                        <div class="th" class="filter">Sl No</div>
                        <div class="th" class="filter editable">Service Id</div>
                        <div class="th" class="filter editable">Type</div>
                        <div class="th" class="filter editable">Complaint</div>
                        <div class="th" class="filter">Current Status</div>
                        <div class="th" class="filter">Quick Service</div>
                    </div>
                </div>
                <div class="tbody">
                    <a href="service-detail.php" class="tr">
                        <div class="td">asas</div>
                        <div class="td">asas</div>
                        <div class="td">asas</div>
                        <div class="td">asas</div>
                        <div class="td">asas</div>
                        <div class="td">asas</div>
                    </a>
                </div>
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
