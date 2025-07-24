<?php
include("../users/config.php");

// Check if schedule ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Invalid schedule ID.";
    exit();
}

$id = intval($_GET['id']);
$query = "SELECT * FROM bus_schedules WHERE id = $id";
$result = mysqli_query($conn, $query);

// Check if schedule exists
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Schedule not found.";
    exit();
}

$schedule = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Details</title>
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



        
       /* Container Styling */
#container {
    margin: 10px auto;
    padding: 50px;
    background-color: #f9f9f9;
    border-radius: 10px;
     height:440px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

#back-link {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

#back-link:hover {
    text-decoration: underline;
}

/* Heading Styling */
#heading {
    text-align: center;
    font-size: 28px;
    color: #2c3e50;
    margin-bottom: 10px;
   
}

/* Each Detail Block */
#container > div {
    margin-bottom: 2px;
    font-size: 16px;
    line-height: 1.6;
  
}

/* Label Styling */
#label {
    font-weight: bold;
    color: #34495e;
    margin-right: 10px;
}

/* Back Button Styling */
#back-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
  
    transition: background-color 0.3s ease;
}

#back-btn:hover {
    background-color: #2980b9;
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
                        <i class="fas fa-calendar-alt"></i>
                        <span>Manage Schedules</span>
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

    <!-- Main Content -->
    <div id="container">
        
         <a href="manage_schedules.php" id="back-link"> ← Back to Schedules</a>
        
        <h2 id="heading">Schedule Details</h2>
        <div id="bus_no">
            <span id="label">Bus No:</span> <?= htmlspecialchars($schedule['bus_no']) ?>
        </div>
        <div id="route">
            <span id="label">Route:</span> <?= htmlspecialchars($schedule['route']) ?>
        </div>
        <div id="departure">
            <span id="label">Departure:</span> <?= htmlspecialchars($schedule['departure_time']) ?>
        </div>
        <div id="arrival">
            <span id="label">Arrival:</span> <?= htmlspecialchars($schedule['arrival_time']) ?>
        </div>
        <div id="status">
            <span id="label">Status:</span> <?= htmlspecialchars($schedule['status']) ?>
        </div>
        <div id="bus_type">
            <span id="label">Bus Type:</span> <?= htmlspecialchars($schedule['bus_type']) ?>
        </div>
        <div id="price">
            <span id="label">Price:</span> Rs. <?= htmlspecialchars($schedule['price']) ?>
        </div>
        <div id="driver_name">
            <span id="label">Driver Name:</span> <?= htmlspecialchars($schedule['driver_name']) ?>
        </div>
         <div id="driver_id">
            <span id="label">Driver ID:</span> <?= htmlspecialchars($schedule['driver_id']) ?>
        </div>
         <div id="driver_license">
            <span id="label">Driver License:</span> <?= htmlspecialchars($schedule['driver_license']) ?>
        </div>
        <div id="contact">
            <span id="label">Contact:</span> <?= htmlspecialchars($schedule['contact']) ?>
        </div>        
    </div>
</div>

</body>
</html>
