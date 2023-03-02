<?php

if($_SESSION['isLoggedIn'] == true)
    header('Location: home.php');
else
    header('Location: login.php');
?>