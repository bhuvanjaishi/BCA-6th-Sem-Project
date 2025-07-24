<?php
include("config.php"); // Database connection

// Admin logout
if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
    echo "<script>alert('Admin Logout Successful');</script>";
}

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check database for user
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Compare password
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            // Alert and redirect to respective dashboard
            if ($user['role'] === 'admin') {
                echo "<script>alert('Admin login successful!'); window.location.href='../admin/admin_dashboard.php';</script>";
                exit();


            } elseif ($user['role'] === 'driver') {
                $_SESSION['driver_name'] = $user['name']; 
                $_SESSION['driver_id'] = $user['id'];
                echo "<script>alert('Driver login successful!'); window.location.href='../driver/driver-dashboard.php';</script>";
                exit();


            } else {
                echo "<script>alert('User login successful!'); window.location.href='../users/user_dashboard.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="../admin/admin-style.css">
</head>
<body>

<!-- Login Section Wrapper -->
<div class="login-page-section">

<!-- Login Form Container -->
    <div class="login-container">
        <h2>Login</h2>

          <!-- Login Form Starts -->
        <form action="login.php" method="post">

         <!-- Email Input Field -->
            <div class="input-group">
                <label for="username">Email</label>
                <input type="text" name="email" id="email" placeholder="Enter your email" required>
            </div>

            <!-- Password Input Field -->
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>

            <!-- Remember Me and Forgot Password Section -->
            <div class="remember-forgot">

              <!-- Checkbox to remember user -->
                <div class="remember-me">
                    <input type="checkbox" id="rememberMe">
                    <label for="rememberMe">Remember Me</label>
                </div>

                  <!-- Forgot Password Link -->
                <a href="forgot_pass.php">Forgot Password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit">Login</button>

             <!-- Registration Link -->
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </form>
          <!-- Login Form Ends -->
    </div>
      <!-- Login Form Container Ends -->
</div>
<!-- Login Section Wrapper Ends -->

<!-- Optional JavaScript File -->
<script src="script.js"></script>
</body>
</html>
