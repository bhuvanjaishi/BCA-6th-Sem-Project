<?php
session_start();

include("config.php");

$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    die("User not logged in.");
}

if (isset($_POST['delete_account'])) {

    $query = "DELETE FROM users WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    $delete_result = mysqli_stmt_execute($stmt);


    if ($delete_result) {
      
        session_destroy();
        
      
        echo "<script>
                alert('Your account has been deleted successfully.');
                window.location.href = 'login.php'; // Redirect to login page
              </script>";
    } else {
       
        echo "<script>
                alert('Failed to delete your account. Please try again.');
              </script>";
    }
}

?>
