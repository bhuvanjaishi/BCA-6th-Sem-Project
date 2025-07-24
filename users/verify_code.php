<?php
include("config.php");
session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = $_POST['otp'];
    if (isset($_SESSION['otp']) && time() <= $_SESSION['otp_expires']) {
        if ($entered_otp == $_SESSION['otp']) {
            $_SESSION['otp_verified'] = true;
            header("Location: reset_password.php");
            exit();
        } else {
            $message = "Incorrect OTP.";
        }
    } else {
        $message = "OTP expired. Try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Verify OTP</title></head>
<body>
<h2>Enter OTP</h2>
<form method="POST">
    <input type="text" name="otp" required placeholder="Enter OTP">
    <button type="submit">Verify</button>
</form>
<p style="color:red;"><?php echo $message; ?></p>
</body>
</html>
