<?php
session_start();
include("config.php");

// Validate GET data
$bus_id = $_GET['bus_id'] ?? '';
$user_id = $_GET['user_id'] ?? '';
$selected_seats = $_GET['selected_seats'] ?? '';
$total_price = $_GET['amount'] ?? '';
$transaction_code = $_GET['transaction_code'] ?? '';

if (!$bus_id || !$user_id || !$selected_seats || !$total_price || !$transaction_code) {
    die("❌ Invalid payment return data.");
}

// ✅ Calculate total seats and generate ticket code
$total_seats = count(explode(",", $selected_seats));
$ticket_code = uniqid("TKT_");

// ✅ Insert into seat_bookings table
$stmt = $conn->prepare("INSERT INTO seat_bookings (bus_id, user_id, selected_seats, total_seats, total_price, status, ticket_code, booked_at) VALUES (?, ?, ?, ?, ?, 'booked', ?, NOW())");
$stmt->bind_param("iisdss", $bus_id, $user_id, $selected_seats, $total_seats, $total_price, $ticket_code);
$stmt->execute();

// ✅ Save to `payments` table as well
$conn->query("INSERT INTO payments (user_id, bus_id, amount, payment_method, payment_status, payment_reference, created_at) 
VALUES ('$user_id', '$bus_id', '$total_price', 'eSewa', 'Success', '$transaction_code', NOW())");

// ✅ Redirect to confirmation page
header("Location: confirmation.php?seats=$selected_seats&code=$ticket_code");
exit;
?>
