<?php
include("../users/config.php");  // DB connection

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<h3 style='color:red; text-align:center;'>Booking ID is missing.</h3>";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM seat_bookings WHERE id = $id LIMIT 1";
$result = $conn->query($sql);

// If no result found
if ($result->num_rows == 0) {
    echo "<h3 style='color:red; text-align:center;'>Booking not found.</h3>";
    exit;
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Booking #<?= htmlspecialchars($row['id']) ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
 /* General reset for padding and margin */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and overall dashboard styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            height: 100vh;
        }

        .dashboard {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Sidebar styling */
        .sidebar {
            width: 195px;
            background-color: #333;
            color: #fff;
            position: fixed;
            top: 0;
            bottom: 0;
        }

        .sidebar .logo {
            text-align: center;
            padding: 5px;
        }

        .sidebar .logo i {
            font-size: 40px;
          
        }

        .sidebar .logo h2 {
            font-size: 20px;
        }

        .sidebar .nav-menu {
            
        }

        .sidebar .nav-item {
            padding: 6px 7px;
            text-align: left;
            margin: 5px 0;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .sidebar .nav-item:hover {
            background-color: #444;
        }

        .sidebar .nav-item a {
            text-decoration: none;
            color: #fff;
            display: flex;
            align-items: center;
            width: 100%;
        }

        .sidebar .nav-item i {
            font-size: 18px;
            margin-right: 10px;
            width: 24px;
            text-align: center;
        }

        .sidebar .nav-item span {
            font-size: 16px;
        }



#booking-details {
    max-width: 600px;
    margin: 30px auto;
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
}

#booking-heading {
    text-align: center;
    color: #007bff;
    margin-bottom: 20px;
}

#bus-id, #bus-name, #bus-destination, 
#bus-ac-price, #bus-deluxe-price, #bus-nonac-price {
    margin: 15px 0;
    color: #333;
}

#bus-id strong, #bus-name strong, #bus-destination strong,
#bus-ac-price strong, #bus-deluxe-price strong, #bus-nonac-price strong {
    display: inline-block;
    width: 150px;
}

#back-btn {
    display: inline-block;
    margin-bottom: 20px;
    text-decoration: none;
    padding: 10px 15px;
    background: #007bff;
    color: #fff;
    border-radius: 5px;
}

#back-btn:hover {
    background: #0056b3;
}

    </style>
</head>
<body>
 <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-bus"></i>
                <h2>Bus-reservation</h2>
            </div>
            <div class="nav-menu">
                <div class="nav-item active">
                    <a href="admin_dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Admin Dashboard</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="manage_routes.php">
                        <i class="fas fa-route"></i>
                        <span>Manage Routes</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="manage_schedules.php">
                        <i class="fas fa-calendar-alt "></i>
                        <span> Manage Schedules</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="manage_bus.php">
                        <i class="fas fa-bus"></i>
                        <span>Manage Buses</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="manage_booking.php">
                        <i class="fas fa-ticket-alt"></i>
                        <span>Manage Bookings</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="manage_payments.php">
                    <i class="fas fa-money-check-alt"></i>
                        <span>Manage Payments</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="manage_users.php">
                        <i class="fas fa-users"></i>
                        <span>Manage Users</span>
                    </a>
                </div>
                
                <div class="nav-item">
                <a href="manage_pages.php">
                  <i class="fas fa-file-alt"></i>
                <span>Manage Pages</span>
                </a>
                </div>

                <div class="nav-item">
                    <a href="manage_reports.php">
                        <i class="fas fa-chart-bar"></i>
                        <span>Manage Reports</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="setting.php">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>


<div id="booking-details">
    <a href="manage_booking.php" id="back-btn">← Back to Manage Booking</a>
    <h2 id="booking-heading">🚌 Booking Details (ID: <?= htmlspecialchars($row['id']) ?>)</h2>

<!-- <a href="manage_booking.php" class="btn-back">← Back to Manage Bookings</a>

<div class="container"> -->
    <!-- <h2>Booking Details </h2> -->
     <div class="row"><span class="label">Bus ID:</span> <span class="value"><?= htmlspecialchars($row['id']) ?></span></div>
    <div class="row"><span class="label">User ID:</span> <span class="value"><?= htmlspecialchars($row['user_id']) ?></span></div>
    <div class="row"><span class="label">Bus Type:</span> <span class="value"><?= htmlspecialchars($row['bus_type']) ?></span></div>
    <div class="row"><span class="label">Selected Seats:</span> <span class="value"><?= htmlspecialchars($row['selected_seats']) ?></span></div>
    <div class="row"><span class="label">Total Seats:</span> <span class="value"><?= htmlspecialchars($row['total_seats']) ?></span></div>
    <div class="row"><span class="label">Total Price:</span> <span class="value">Rs. <?= number_format($row['total_price'], 2) ?></span></div>
    <div class="row"><span class="label">Status:</span> 
        <span class="value status <?= htmlspecialchars($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></span>
    </div>
    <div class="row"><span class="label">Booking Date:</span> <span class="value"><?= htmlspecialchars($row['booking_date']) ?></span></div>
</div>

</body>
</html>
