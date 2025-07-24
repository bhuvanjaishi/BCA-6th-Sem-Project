<?php
include("../users/config.php"); // Database connection
        
// Fetch routes
$sql = "SELECT * FROM routes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Routes</title>
    <link rel="stylesheet" href="styles.css">
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
#route-container {
    font-family: 'Segoe UI', sans-serif;
    width:1150px;
    background-color: #f9f9f9;
    padding-left:200px;
   
}

/* Title */
#page-title {
    text-align: center;
    color: #333;
    margin-bottom: -10px;
    
}

/* Add New Route aligned right */
#add-route {
    text-align:  left;
  
    padding:10px;
    padding-right:5px;
}

#add-route-btn {
    background-color: #28a745;
    color: #fff;
    padding: 10px 18px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    
     
}

#add-route-btn:hover {
    background-color: #218838;
}

/* Table container */
#table-container {
    overflow-x: auto;
}

/* Routes Table */
#routes-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 10 12px; /* space between rows */
    background-color: #fff;
}

#routes-table th,
#routes-table td {
    border: 1px solid #ddd;
    padding: 3px 16px; /* more spacing for cells */
    text-align: center;
}

#routes-table thead {
    background-color: #007bff;
    color: white;
}

/* Action buttons */
.action-btn {
    padding: 1px 10px;
    color: white;
    border-radius: 4px;
    text-decoration: none;
    margin: 2px;
    font-size: 14px;
}

#view-btn{
    background-color:green;
}

#view-btn:hover{
    background-color:rgb(5, 162, 18);
}
#edit-btn {
    background-color: #17a2b8;
}

#edit-btn:hover {
    background-color: #138496;
}

#delete-btn {
    background-color: #dc3545;
}

#delete-btn:hover {
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

       

<div id="route-container">
<h1 id="page-title"> 
    <i class="fas fa-route"></i>
Manage Routes</h1>

<!-- Add New Route Button -->
<div id="add-route">
    <a href="add_route.php" id="add-route-btn"> + Add New Route</a>
</div>

<!-- Routes Table -->
<div id="table-container">
    <table id="routes-table">
        <thead>
            <tr>
                <th>Route ID</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Distance</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['route_id']; ?></td>
                <td><?php echo $row['origin']; ?></td>
                <td><?php echo $row['destination']; ?></td>
                <td><?php echo $row['distance']; ?></td>
                <td><?php echo $row['duration']; ?></td>
               
              
                <td><?php echo $row['status']; ?></td>
                <td>
                    <a href="view_route.php?id=<?php echo $row['id']; ?>" class="action-btn" id="view-btn">View</a>
                    <a href="edit_route.php?id=<?php echo $row['id']; ?>" class="action-btn" id="edit-btn">Edit</a>
                    <a href="delete_route.php?id=<?php echo $row['id']; ?>" class="action-btn" id="delete-btn">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>




</body>
</html>
