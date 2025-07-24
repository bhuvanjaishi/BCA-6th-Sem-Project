<?php
$seats = $_GET['seats'] ?? 'None';
$code = $_GET['code'] ?? 'N/A';
?>

<!DOCTYPE html>
<html>
<head><title>Ticket Confirmed</title></head>
<body style="text-align:center; font-family:Arial;">
    <h2 style="color:green;">✔ Payment Successful! </h2>
      <p>Your ticket has been booked successfully.</p>
    <br><br>
  
    <!-- <p><strong>Booked Seats:</strong> <?= htmlspecialchars($seats) ?></p> -->
    <!-- <p><strong>Transaction Code:</strong> <?= htmlspecialchars($code) ?></p> -->

    <a href="my_bookings.php">📋 View My Bookings</a><br><br>
    <a href="download_ticket.php?code=<?= urlencode($code) ?>">⬇️ Download Ticket</a><br><br>
    <a href="search_bus.php">🏠 Book Another Ticket</a>
</body>
</html>
