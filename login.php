<?php
if (isset($_COOKIE['keep_login'])) {
    if ($_COOKIE['keep_login'] == 'true') {
        header("Location: index.php");
        exit();
    }
}
/****************************** */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Log In</title>
</head>

<body>


<main class="login-page">

<div class="login-form">
    <div class="head">
        <h2>Login</h2>
    </div>
    <div class="content">
        <div class="form-group">
            <input type="text" placeholder="User Name" id="username">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password" id="password">
        </div>
        <div class="form-group login-btns">

            <button class="modal-dismiss btn-primary mb-1" id="login">Log In</button>
        </div>
    </div>
</div>
</main>

<div class="loader">
        <div class="spinner"></div>
    </div>

<form method="post">
</form>


<script src="js/jquery.min.js"></script>
    <script src="js/resizableColumns.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/custom.js"></script>

    <script src="js/login/login.js"></script>
</body>

</html>


<?php
/****************************** */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setcookie(
        "keep_login",
        "true",
        time() + (10 * 365 * 24 * 60 * 60)
    );

    header("Location: index.php");
    exit();
}
?>