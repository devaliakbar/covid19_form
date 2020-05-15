<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setcookie(
        "keep_login",
        "false",
        time() + (10 * 365 * 24 * 60 * 60)
    );

    header("Location: login.php");
    exit();
}
