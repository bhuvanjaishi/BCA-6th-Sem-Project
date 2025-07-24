<?php
session_start();
include("../users/config.php"); // Include your database connection file

// Check if the user is logged in (this example assumes session stores user ID)
$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    die("Driver not logged in.");
}

// Check if the form is submitted
if (isset($_POST['update_profile'])) {
    // Collect form data
    
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];

    // Validate the input (for security, simple validation as an example)
    if (!empty($fullname) && !empty($email) && !empty($address) && !empty($contact) && !empty($gender)) {
        
        // Prepare the SQL statement to update the user's profile
        $query = "UPDATE users SET fullname=?, email=?, address=?, contact=?, gender=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        
        // Bind the parameters and execute the query
        mysqli_stmt_bind_param($stmt, "sssssi", $fullname, $email, $address, $contact, $gender, $user_id);
        
        if (mysqli_stmt_execute($stmt)) {
            // Successfully updated the profile
            echo "<script>
                    alert('Profile updated successfully.');
                    window.location.href = 'driver-dashboard.php'; // Redirect to the settings page
                  </script>";
            exit;
        } else {
            // If update fails
            echo "Error updating profile: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Please fill in all fields.";
    }
}
?>
