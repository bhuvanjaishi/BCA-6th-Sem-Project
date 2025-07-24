<?php
include("config.php");
session_start();

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $otp = rand(100000, 999999);
        $_SESSION['email'] = $email;
        $_SESSION['otp'] = $otp;
        $_SESSION['otp_expires'] = time() + 300;

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_gmail@gmail.com';           // ✅ आफ्नो Gmail
            $mail->Password = 'your_app_password';              // ✅ App Password मात्र
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('your_gmail@gmail.com', 'Your Website');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body = "Dear user,<br><br>Your OTP code is <b>$otp</b><br><br>Valid for 5 minutes.";

            $mail->send();
            header("Location: verify_code.php");
            exit();
        } catch (Exception $e) {
            $message = "Email send failed: " . $mail->ErrorInfo;
        }
    } else {
        $message = "Email not registered.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Forgot Password</title></head>
<body>
<h2>Forgot Password</h2>
<form method="POST">
    <input type="email" name="email" required placeholder="Enter your registered email">
    <button type="submit">Send OTP</button>
</form>
<p style="color:red;"><?php echo $message; ?></p>
</body>
</html>
