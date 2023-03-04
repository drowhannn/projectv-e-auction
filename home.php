<?php
include('includes/header.php');

session_start();
if ($_SESSION['isLoggedIn'] != true) {
    header('Location: login.php');
}

if ($_SESSION['toast-success']) {
    echo '<script>toastr.success("' . $_SESSION['toast-success'] . '")</script>';
    $_SESSION['toast-success'] = null;
}

include('includes/navbar.php');

include('includes/footer.php');
