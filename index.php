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
    <h1>Home</h1>
    <div class="breadcrumb">

        <a href="add.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
        <button onclick='$("form").submit();'>Log Out</button>


    </div>
    <div class="bottom-header">
    </div>
</div>
<div class="content">
    <div class="table-wrap">
        <div class="searchbox">
            <form method="post" class="form-inline main">
                <div class="form-group">
                    <input type="text" id="search_key" class="form-control" placeholder="Search" aria-describedby="helpId">
                    <button disabled><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>


        </div>
        <div class="table-responsive">
            <div class="resizable editable data-table table">
                <div class="thead">
                    <div class="tr">
                        <div class="th" class="filter">Sl No</div>
                        <div class="th" class="filter editable">Person Name</div>
                        <div class="th" class="filter editable">Sex</div>
                        <div class="th" class="filter editable">Age</div>
                        <div class="th" class="filter">Country</div>
                        <div class="th" class="filter">Address</div>
                    </div>
                </div>
                <div class="tbody">

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


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setcookie(
        "keep_login",
        "false",
        time() + (10 * 365 * 24 * 60 * 60)
    );

    header("Location: login.php");
    exit();
}?>