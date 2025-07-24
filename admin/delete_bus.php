<?php
include("../users/config.php"); // Database connection

// Check if 'id' is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the bus from the database
    $sql = "DELETE FROM manage_buses WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // Redirect to Manage Buses page after deletion
        header("Location: manage_bus.php");
        exit();
    } else {
        echo "Error deleting bus: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request. No bus ID provided.";
}
?>
