<?php
include("config.php");
session_start();

$message = "";

if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
    header("Location: forgot_password.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = $_POST['new_password'];
    $email = $_SESSION['email'];
    $hashed = password_hash($pass, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET password=? WHERE email=?");
    $stmt->bind_param("ss", $hashed, $email);
    if ($stmt->execute()) {
        session_destroy();
        echo "<script>alert('Password reset successful!'); window.location='login.php';</script>";
    } else {
        $message = "Password reset failed.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>New Password</title></head>
<body>
<h2>Create New Password</h2>
<form method="POST">
    <input type="password" name="new_password" required placeholder="New Password">
    <button type="submit">Save Password</button>
</form>
<p style="color:red;"><?php echo $message; ?></p>
</body>
</html>
