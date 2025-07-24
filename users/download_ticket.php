<?php
include("config.php");

$code = $_GET['code'] ?? '';
if (!$code) die("Invalid ticket request.");

// Fetch ticket data
$result = $conn->query("SELECT b.*, s.bus_no, s.route, s.departure_time, s.arrival_time 
                        FROM seat_bookings b 
                        JOIN bus_schedules s ON b.bus_id = s.id 
                        WHERE b.ticket_code = '$code' 
                        LIMIT 1");

if ($result->num_rows == 0) die("Ticket not found.");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ticket View</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .ticket-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 2px dashed #333;
            background: #fefefe;
        }
        h2 { text-align: center; color: #2e8b57; }
        p { font-size: 16px; margin: 5px 0; }
        .print-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background: #2e8b57;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .print-btn:hover {
            background: #256b44;
        }
    </style>
</head>
<body>

<div class="ticket-container">
    <h2>🎫 Bus Ticket</h2>
    <p><strong>Bus No:</strong> <?= htmlspecialchars($data['bus_no']) ?></p>
    <p><strong>Route:</strong> <?= htmlspecialchars($data['route']) ?></p>
    <p><strong>Departure:</strong> <?= htmlspecialchars($data['departure_time']) ?></p>
    <p><strong>Arrival:</strong> <?= htmlspecialchars($data['arrival_time']) ?></p>
    <p><strong>Seats:</strong> <?= htmlspecialchars($data['selected_seats']) ?></p>
    <p><strong>Price:</strong> NPR <?= htmlspecialchars($data['total_price']) ?></p>
    <p><strong>Ticket Code:</strong> <?= htmlspecialchars($data['ticket_code']) ?></p>
    <p><strong>Booked At:</strong> <?= htmlspecialchars($data['booked_at']) ?></p>

    <button class="print-btn" onclick="window.print()">🖨️ Print or Save as PDF</button>
</div>

</body>
</html>
