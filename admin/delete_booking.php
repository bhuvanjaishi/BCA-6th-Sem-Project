<?php
include("../users/config.php"); // DB connection

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<h3 style='color:red; text-align:center;'>Booking ID is missing.</h3>";
    exit;
}

$id = intval($_GET['id']);

// Confirm the booking exists
$check = "SELECT id FROM seat_bookings WHERE id = ?";
$stmt = $conn->prepare($check);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0) {
    echo "<h3 style='color:red; text-align:center;'>Booking not found.</h3>";
    exit;
}
$stmt->close();

// Delete booking
$delete = "DELETE FROM seat_bookings WHERE id = ?";
$stmt = $conn->prepare($delete);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('Booking deleted successfully!'); window.location.href='manage_booking.php';</script>";
    exit;
} else {
    echo "<p style='color:red; text-align:center;'>Failed to delete booking. Please try again.</p>";
}
?>
