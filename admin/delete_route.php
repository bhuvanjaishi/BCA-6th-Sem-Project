<?php
include("../users/config.php");

// Get the route ID to delete
$id = $_GET['id'];

// Delete route from database
$sql = "DELETE FROM routes WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Route Delete Successful');
    window.location.href = 'manage_routes.php';
  </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; // ← यहाँ semicolon हराएको थियो
}
?>
