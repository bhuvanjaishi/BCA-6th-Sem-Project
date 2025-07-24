<?php
include("../users/config.php");


// Check if ID is provided
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the bus details
    $query = "SELECT * FROM manage_buses WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $bus = mysqli_fetch_assoc($result);
    } else {
        echo "Bus not found.";
        exit();
    }
} else {
    echo "Invalid bus ID.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Bus Details - <?php echo htmlspecialchars($row['bus_name']); ?></title>

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


    
#bus-details {
    max-width: 600px;
    margin: 30px auto;
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
}

#bus-heading {
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
                    <a href="#">
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


<div id="bus-details">
    <a href="manage_bus.php" id="back-btn">← Back to Manage Buses</a>
    <h2 id="bus-heading">🚌 Bus Details</h2>

    <div id="bus-id"><strong>Bus ID:</strong> <?php echo $bus['bus_id']; ?></div>
    <div id="bus-name"><strong>Bus Name:</strong> <?php echo $bus['bus_name']; ?></div>
    <div id="bus-destination"><strong>Destination:</strong> <?php echo $bus['destination']; ?></div>
    <div id="bus-ac-price"><strong>AC Price:</strong> Rs. <?php echo $bus['ac_price']; ?></div>
    <div id="bus-deluxe-price"><strong>Deluxe Price:</strong> Rs. <?php echo $bus['deluxe_price']; ?></div>
    <div id="bus-nonac-price"><strong>Non-AC Price:</strong> Rs. <?php echo $bus['non_ac_price']; ?></div>
</div>



</body>
</html>