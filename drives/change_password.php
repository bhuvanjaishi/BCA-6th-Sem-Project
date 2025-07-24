<?php
include("../users/config.php");

session_start();

$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    die("Driver not logged in.");
}

if (isset($_POST['change_password'])) {
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];


    $query = "SELECT password FROM users WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $db_pass);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

  
    if ($current === $db_pass) {
        if ($new === $confirm) {
         
            $update = "UPDATE users SET password=? WHERE id=?";
            $stmt2 = mysqli_prepare($conn, $update);
            mysqli_stmt_bind_param($stmt2, "si", $new, $user_id);
            mysqli_stmt_execute($stmt2);

           
            echo "<script>
                    alert('New Password Changed Successfully.');
                    window.location.href = '../users/login.php'; // Redirect to login page
                  </script>";
            exit;
        } else {
           
            echo "<script>
                    alert('New Password and Confirmation do not match.');
                     window.location.href = 'setting.php'; // Redirect to login page
                  </script>";
        }
    } else {
     
        echo "<script>
                alert('Current password is incorrect.');
                 window.location.href = 'setting.php'; // Redirect to login page
              </script>";
    }
}
?>
