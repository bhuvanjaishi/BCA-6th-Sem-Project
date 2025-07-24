<?php
include("../users/config.php"); // Database connection


if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $bus_id = $_POST['bus_id'];
    $bus_name = $_POST['bus_name'];
    $destination = $_POST['destination'];
    $ac_price = $_POST['ac_price'];
    $deluxe_price = $_POST['deluxe_price'];
    $non_ac_price = $_POST['non_ac_price'];

    // SQL query to insert into the correct columns
    $sql = "INSERT INTO manage_buses (bus_id,bus_name, destination, ac_price, deluxe_price, non_ac_price)
            VALUES ('$bus_id','$bus_name', '$destination', '$ac_price', '$deluxe_price', '$non_ac_price')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Bus added successfully');window.location.href='manage_bus.php';</script>";
    } else {
        echo "<script>alert('Error: Could not add bus');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusGo - Manage Schedules</title>
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



        
/* Outer container for the whole form section */
#add-new-route {
    width:100%;
   
    justify-content: center;
    align-items: center;
   
    background-color: #f5f7fa;
   
    font-family: Arial, sans-serif;
}

/* Form card styling */
#add-route-container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 8px;
    padding-left:220px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Top bar with back link and title */
#top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

#back-link {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

#back-link:hover {
    text-decoration: underline;
}

/* Title */
#form-title {
    font-size: 24px;
    color: #333;
    padding-right:260px;
}

/* Form styling */
form label {
    display: block;
    margin-top: 15px;
    margin-bottom: 5px;
    color: #333;
    font-weight: bold;
}

form input[type="text"],
form input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #cccccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}

/* Submit button */
form input[type="submit"] {
    margin-top: 20px;
    background-color: #28a745;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #218838;
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

 <div id="add-new-route">
    <div id="add-route-container">
        <div id="top-bar">
            <a href="manage_bus.php" id="back-link">← Back to Manage Buses</a>
            <h1 id="form-title"> <i class="fas fa-bus"></i> Add New Bus</h1>
        </div>

<form method="POST">
 <label>Bus ID:</label>
  <input type="text" name="bus_id" required>

  <label>Bus Name:</label>
  <input type="text" name="bus_name" required>

  <label>Destination:</label>
  <input type="text" name="destination" required>

<label>Ac price:</label>
  <input type="text" name="ac_price" required>

<label>Deluxe Price:</label>
  <input type="text" name="deluxe_price" required>

  <label>Non-AC Price:</label>
  <input type="text" name="non_ac_price" required>

  <input type="submit" value="Add Bus">
</form>
 </div>
  </div>


</body>
</html>