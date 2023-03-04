<?php

session_start();
session_destroy();
session_start();

$_SESSION['toast-success'] = 'Logged out successfully';

header('Location: login.php');
