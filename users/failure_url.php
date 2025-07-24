<?php
session_start();
include("config.php");

$bus_id = $_GET['bus_id'];
$user_id = $_GET['user_id'];
$selected_seats = $_GET['selected_seats'];
$total_price = $_GET['amount'];
$payment_reference = $_GET['transaction_code'];

$payment_method = 'eSewa';
$payment_status = 'Failed';

$conn->query("INSERT INTO payments (user_id, bus_id, amount, payment_method, payment_status, payment_reference, created_at) VALUES ('$user_id', '$bus_id', '$total_price', '$payment_method', '$payment_status', '$payment_reference', NOW())");

echo "<h2 style='color:red;'>❌ Payment Failed. Please Try Again.</h2>";
?>
