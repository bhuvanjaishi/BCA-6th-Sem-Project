<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    $errors = [];

    if (empty($name) || strlen($name) < 2) {
        $errors[] = "Please enter a valid name.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email.";
    }

    if (empty($subject)) {
        $errors[] = "Subject is required.";
    }

    if (empty($message) || strlen($message) < 10) {
        $errors[] = "Message must be at least 10 characters.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'home.php'; // change to 'home.php' if needed
            </script>";
        } else {
            echo "<script>alert('Error while sending message.');</script>";
        }

        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }

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

  <!-- Contact Page Wrapper -->
    <div class="contact-page">
         <!-- Contact Form Container -->
    <div class="contact-container">
        <h1>Contact Us</h1>
        <!-- Contact Form Starts Here -->
        <form action="contact.php" method="POST">
             <!-- Name Input Field -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
              <!-- Email Input Field -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
             <!-- Subject Input Field -->
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <!-- Message Textarea Field -->
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
             <!-- Submit Button -->
            <button type="submit">Send Message</button>
        </form>
          <!-- Contact Form Ends Here -->
    </div>
    <!-- Contact Form Container Ends -->
</div>
 <!-- Contact Page Wrapper Ends -->

<script src="script.js"></script>
</body>
</html>
