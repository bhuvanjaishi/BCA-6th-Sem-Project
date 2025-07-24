<?php
session_start();
include("config.php");

$user_id = $_SESSION['user_id'] ?? 0;

$result = $conn->query("SELECT b.*, s.bus_no, s.route, s.departure_time, s.arrival_time, s.bus_type 
                        FROM seat_bookings b 
                        JOIN bus_schedules s ON b.bus_id = s.id 
                        WHERE b.user_id = $user_id 
                        ORDER BY b.id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            padding: 40px 20px;
        }

        h2 {
            text-align: center;
            color: #212529;
            margin-bottom: 40px;
            font-size: 32px;
        }

        .table-container {
            max-width: 1100px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow-x: auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 14px 5px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: white;
            font-size: 15px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: 600;
            transition: 0.3s;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }

            table {
                font-size: 13px;
            }

            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

<h2>📋 My Bookings</h2>

<div class="table-container">
    <table>
        <tr>
            <th>Bus ID</th>
            <th>Bus No</th>
            <th>Route</th>
            <th>Departure</th>
            <th>Arrival</th>
            <th>Bus Type</th>
            <th>Seats</th>
            <th>Amount</th>
            <th>Ticket Code</th>
            <th>Download</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['bus_id'] ?></td>
            <td><?= $row['bus_no'] ?></td>
            <td><?= $row['route'] ?></td>
            <td><?= $row['departure_time'] ?></td>
            <td><?= $row['arrival_time'] ?></td>
            <td><?= $row['bus_type'] ?></td> 
            <td><?= $row['selected_seats'] ?></td>
            <td>NPR <?= number_format($row['total_price'], 2) ?></td>
            <td><?= $row['ticket_code'] ?></td>
            <td><a href="download_ticket.php?code=<?= urlencode($row['ticket_code']) ?>">Download</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
