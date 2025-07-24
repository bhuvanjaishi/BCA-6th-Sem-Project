<?php
include("config.php");
session_start();

// Check if user is logged in
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    // If user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// If form is submitted
if (isset($_POST['update_profile'])) {

    // Sanitize input values
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    // Update user profile in database
    $query = "UPDATE users SET fullname='$fullname', email='$email', address='$address', contact='$contact', gender='$gender' WHERE id='$user_id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('User profile updated successfully.');
                window.location.href = 'user_dashboard.php';
              </script>";
        exit();
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}
?>