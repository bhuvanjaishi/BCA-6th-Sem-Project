<?php
include("../users/config.php");

session_start();
session_unset();
session_destroy();

// header("Location:../users/login.php");

// Redirect with query string
header("Location: ../users/login.php?logout=success");
exit();



?>

