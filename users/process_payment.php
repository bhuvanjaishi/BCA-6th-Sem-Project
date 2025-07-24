<?php
session_start();
include("config.php");

// ✅ Step 1: Validate Required POST Data
if (
    !isset($_POST['bus_id'], $_POST['user_id'], $_POST['seat_price'], $_POST['seats']) ||
    empty($_POST['bus_id']) || empty($_POST['user_id']) || empty($_POST['seat_price']) || empty($_POST['seats'])
) {
    die("❌ Invalid form submission.");
}

$bus_id = intval($_POST['bus_id']);
$user_id = intval($_POST['user_id']);
$seat_price = floatval($_POST['seat_price']);
$seats = is_array($_POST['seats']) ? $_POST['seats'] : explode(",", $_POST['seats']);
$seats = array_map('trim', $seats); // clean whitespace

// ✅ Step 2: Calculate Total Amount
$total_amount = count($seats) * $seat_price;
if ($total_amount <= 0) {
    die("❌ Invalid seat selection.");
}

// ✅ Step 3: eSewa Payment Config
$secret_key = "8gBm/:&EnhH.1/q"; // Sandbox/test key — replace with secure live key in production
$transaction_uuid = uniqid("txn_") . time();
$product_code = "EPAYTEST"; // Use your live code in production

// URLs
$success_url = "http://localhost/project/users/success_url.php?bus_id=" . urlencode($bus_id) .
               "&user_id=" . urlencode($user_id) .
               "&selected_seats=" . urlencode(implode(",", $seats)) .
               "&amount=" . urlencode($total_amount) .
               "&transaction_code=" . urlencode($transaction_uuid);

$failure_url = "http://localhost/project/users/failure_url.php";

// ✅ Step 4: Generate Signature
$signature_string = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=$product_code";
$signature_hash = hash_hmac('sha256', $signature_string, $secret_key, true);
$signature_base64 = base64_encode($signature_hash);
?>
<!DOCTYPE html>
<html>
<head><title>Redirecting to eSewa...</title></head>
<body>
<h3>Redirecting to eSewa for payment...</h3>
<form id="esewaForm" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
    <input type="hidden" name="amount" value="<?= htmlspecialchars($total_amount) ?>">
    <input type="hidden" name="tax_amount" value="0">
    <input type="hidden" name="total_amount" value="<?= htmlspecialchars($total_amount) ?>">
    <input type="hidden" name="transaction_uuid" value="<?= htmlspecialchars($transaction_uuid) ?>">
    <input type="hidden" name="product_code" value="<?= htmlspecialchars($product_code) ?>">
    <input type="hidden" name="product_service_charge" value="0">
    <input type="hidden" name="product_delivery_charge" value="0">
    <input type="hidden" name="success_url" value="<?= htmlspecialchars($success_url) ?>">
    <input type="hidden" name="failure_url" value="<?= htmlspecialchars($failure_url) ?>">
    <input type="hidden" name="signed_field_names" value="total_amount,transaction_uuid,product_code">
    <input type="hidden" name="signature" value="<?= htmlspecialchars($signature_base64) ?>">
</form>

<script>
    // Automatically submit to eSewa
    document.getElementById("esewaForm").submit();
</script>
</body>
</html>
