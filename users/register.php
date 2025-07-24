<?php
include("config.php"); // Database connection

$success = $error = ""; 

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Original password
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $role = 'user'; // Default role

    // Check if the email already exists in the database
    $stmt_check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    // If email already exists, show an error message
    if ($result_check->num_rows > 0) {
        echo "<script>
                alert('This email is already registered. Please use another email.');
                window.location.href = 'register.php';
              </script>";
    } else {
        // Check if password length is less than 6
        if (strlen($password) < 6) {
            echo "<script>
                    alert('Password must be at least 6 characters long.');
                    window.location.href = 'register.php';
                  </script>";
            exit();
        }

        // Check for at least one special character in the password using PHP
        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            echo "<script>
                    alert('Password must contain at least one special character.');
                    window.location.href = 'register.php';
                  </script>";
            exit();
        }

        // Proceed with registration if email does not exist and password is valid
        $stmt = $conn->prepare("INSERT INTO users (fullname, email, password, address, contact, gender, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $fullname, $email, $password, $address, $contact, $gender, $role);

        if ($stmt->execute()) {
            echo "<script>
                alert('Registration successful!');
                window.location.href = 'login.php';
              </script>";
        } else {
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $stmt_check->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../admin/admin-style.css">

</head>
<body>

<!-- Register Page Section -->
    <div class="register-page">

     <!-- Register Form Container -->
    <div class="container">
        <h2>Register Here</h2>

         <!-- Registration Form Starts -->
        <form action="register.php" method="POST">

         <!-- Full Name Input -->
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="fullname" placeholder="please enter yout fullname" >
            </div>

            <!-- Email Input -->
            <div class="input-box">
                <label>Email</label>
                <input type="email" name="email" placeholder="please enter your email" >
            </div>

            <!-- Password Input -->
            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="please enter your password" >
            </div>

            <!-- Address Input -->
            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address" placeholder="please enter your address">
            </div>

            <!-- Contact Number Input -->
            <div class="input-box">
                <label>Contact Number</label>
                <input type="tel" name="contact" placeholder="please enter your contact" >
            </div>

             <!-- Gender Selection -->
            <div class="input-box">
                <label>Gender</label>
                <select name="gender">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

             <!-- Submit Button -->
            <button type="submit">Register</button>

            <!-- Link to Login Page -->
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
        <!-- Registration Form Ends -->
    </div>
     <!-- Register Form Container Ends -->
</div>
<!-- Register Page Section Ends -->
    

</body>
</html>