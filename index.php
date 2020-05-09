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
    <title>Home</title>
</head>

<body>

    <main class="items-manage-page">

        <div class="header">
            <div class="row w-100">
                <div class="col-12 text-center">
                    <h1>Norka Form</h1>
                </div>
            </div>
            <a href="index.php" class="btn btn-dark mr-3">Norka Form</a>
            <a href="quarantine_form_list.php" class="btn btn-dark mr-3">Quarantine Form</a>

            <div class="ml-auto">

            <a href="norka_add.php">  <button class="btn btn-dark add-btn">Add</button></a>

            <?php
if ($a_type == "1") {

    echo '<button class="btn btn-dark settings-btn">Settings</button>';
}
?>



                <button class="btn btn-dark log-btn" onclick='$("form").submit();'>Log Out</button>


            </div>
            <div class="bottom-header">
            </div>
        </div>


        <div class="settings-modal modal">
            <div class="container">

                <div class="head">
                    <div class="row w-100">
                        <div class="col-12 mb-4">
                            <h2>Settings</h2>
                            <div class="close">X</div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="row w-100">
                        <div class="col-md-6 bd-md-r mb-3">
                            <h4 class="mb-3">Change User Password</h4>

                            <div class="form-2 w-100">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="">Current Password</label>
                                            <input id="u_c_pass" type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input id="u_n_pass" type="password" class="form-control">
                                        </div>
                                        <button onclick="changeUserPassword()" class="btm btn-primary mt-3">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 mb-3">
                            <h4 class="mb-3">Change Admin Password</h4>

                            <div class="form-2 w-100">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="">Current Password</label>
                                            <input id="a_c_pass" type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input id="a_n_pass" type="password" class="form-control">
                                        </div>

                                        <button onclick="changeAdminPassword()" class="btm btn-primary mt-3">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="content">
            <div class="table-wrap">
                <div class="searchbox">
                    <form method="post" action="logout.php" class="form-inline main">
                        <div class="form-group">
                            <input type="text" id="search_key" class="form-control" placeholder="Search" aria-describedby="helpId">
                            <button disabled><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>


                </div>
                <div class="table-responsive with-edit">
                    <div class="resizable editable data-table table index-form">
                        <div class="thead">
                            <div class="tr">
                                <div class="th" class="filter">Sl No</div>
                                <div class="th" class="filter editable">Person Name</div>
                                <div class="th" class="filter editable">Sex</div>
                                <div class="th" class="filter editable">Age</div>
                                <div class="th" class="filter">Country</div>
                                <div class="th" class="filter">Address</div>
                                <div class="th" class="filter"></div>

<?php
if ($a_type == "1") {

    echo "<div class='th' class='filter'></div>";
}
?>

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
    <script src="js/norka_home/home.js"></script>
    <script src="js/settings/settings.js"></script>
</body>

</html>
