<?php
include("config.php"); // Database connection

session_start();
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session

// Redirect to login page
echo "<script>
        alert('driver Logout successful!');
        window.location.href = '../users/home.php';
      </script>";
exit();

?>




