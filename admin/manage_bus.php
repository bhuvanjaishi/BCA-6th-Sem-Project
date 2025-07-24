<?php
include("../users/config.php"); // Database connection

/// Fetch all buses
$result = mysqli_query($conn, "SELECT * FROM manage_buses");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusGo - Manage Buses</title>
    
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


/* Main container */
#bus-section {
    font-family: 'Segoe UI', sans-serif;
    width: 1160px;
    background-color: #f9f9f9;
    padding-left: 200px;
}

/* Title */
#bus-manager h1 {
    text-align: center;
    color: #333;
    margin-bottom: -10px;
}

/* Add New Bus aligned right */
#add-bus {
    text-align: left;
    padding: 1px;
}

#add-bus a {
    background-color: #28a745;
    color: #fff;
    padding: 10px 10px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    display: inline-block;
}

#add-bus a:hover {
    background-color: #218838;
}

/* Table container */
#bus-manager {
    overflow-x: auto;
}

/* Buses Table */
#bus-manager table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 12px; /* space between rows */
    background-color: #fff;
}

#bus-manager th,
#bus-manager td {
    border: 1px solid #ddd;
    padding: 8px 8px; /* more spacing for cells */
    text-align: center;
}

#bus-manager thead {
    background-color: #007bff;
    color: white;
}

/* Status tags */
.tag {
    padding: 2px 2px;
    border-radius: 4px;
    color: white;
    font-weight: bold;
    text-transform: capitalize;
    color:white;
}

.tag.active {
    background-color: #28a745;
}

.tag.inactive {
    background-color: #dc3545;
}

.tag.maintenance {
    background-color: #ffc107;
    color: #212529;
}

/* Bus image styling */
#bus-manager img {
    max-width: 80px;
    max-height: 50px;
    display: block;
    margin: 0 auto;
}
.action-buttons {
    display: flex;
    gap: 8px; /* space between buttons */
    justify-content: center; /* center align in cell */
    align-items: center;
   
}

/* Container for action buttons */
.action-btns {
    display: flex;
    gap: 8px; /* spacing between buttons */
    justify-content: center;
    align-items: center;
}

/* Common style for all buttons */
.action-btns a {
    padding: 6px 6px;
    border-radius: 4px;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    font-size: 14px;
}

/* Specific button colors */
.view-btn {
    background-color: #28a745;
}

.view-btn:hover {
    background-color: #218838;
}

.edit-btn {
    background-color: #007bff;
}

.edit-btn:hover {
    background-color: #0056b3;
}

.delete-btn {
    background-color: #dc3545;
}

.delete-btn:hover {
    background-color: #c82333;
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
                    <a href="#">
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

<div id="bus-section">
<div id="bus-manager">
<h1> 🚌Manage Buses</h1>

  <div id="add-bus">
    <a href="add_bus.php">+ Add New Bus</a>
  </div>

<table border="1">
    <tr>
        <th>Bus_ID</th>
        <th>Bus Name</th>
        <th>Destination</th>
        <th>Ac pice</th>
        <th>Deluxe  Price</th>
        <th>Non ac price</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['bus_id']; ?></td>
        <td><?php echo $row['bus_name']; ?></td>
        <td><?php echo $row['destination']; ?></td>
        <td><?php echo $row['ac_price']; ?></td>
        <td><?php echo $row['deluxe_price']; ?></td>
        <td><?php echo $row['non_ac_price']; ?></td>
      
       
    <td class="action-btns">
    <a class="view-btn" href="view_bus.php?id=<?php echo $row['id']; ?>">View</a>
    <a class="edit-btn" href="edit_bus.php?id=<?php echo $row['id']; ?>">Edit</a>
    <a class="delete-btn" href="delete_bus.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>

    </tr>
    <?php } ?>
</table>

    
</body>
</html>