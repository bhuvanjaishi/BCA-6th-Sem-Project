<?php
include("../users/config.php");

// Delete logic
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM bus_schedules WHERE id = $id");
    header("Location: manage_schedules.php");
    exit;
}

// Fetch schedules
$schedules = mysqli_query($conn, "SELECT * FROM bus_schedules ORDER BY id ");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bus Schedules</title>
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


 /* Main container for schedules */
 #manage-bus-schedule{
    padding-left:199px;
    width:110%;
 }
#schedule-container {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f9f9f9;
   
}
 #sticky-header {
         
        }

/* Page title */
#page-title {
    text-align: center;
    color: #333;
    margin-bottom: -80px;
}

/* Add New Schedule button container */
#add-schedule{
    text-align:  left;
    padding-top:20px;
   
}

/* Add Schedule button */
#add-schedule-btn {
    background-color: #28a745;
    color: #fff;
    padding: 10px 18px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

#add-schedule-btn:hover {
    background-color: #218838;
}

/* Table wrapper */
#table-container {
  
}

/* Schedule table */
#schedule-table {
    border-collapse: separate;
    border-spacing: 0 12px;
    background-color: #fff;
    margin-top: -20px;

}

#schedule-table th,
#schedule-table td {
    border: 1px solid #ddd;
   
    text-align: center;
    
}

#schedule-table thead {
    background-color: #007bff;
    color: white;
    
}

/* Action buttons */
.action-btn {
    padding: 1px 11px;
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
                    <a href="#">
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

       
 <!-- Main Content -->
 <div id="manage-bus-schedule">
        <div id="schedule-container">
            <div id="sticky-header">
            <h1 id="page-title"> 
                <i class="fas fa-calendar-alt">
            </i> Manage Bus Schedules</h1>
            <br><br>
            <div id="add-schedule">
                <a href="add_schedules.php" id="add-schedule-btn"> + Add New Schedules</a>
                <br><br>
            </div>
             </div>

            <div id="table-container">
                <?php if(mysqli_num_rows($schedules) > 0): ?>
                <table id="schedule-table">
                <thead>
  <tr>
    <th>ID</th>
    <th>Bus No</th>
    <th>Route</th>
    <th>Departure</th>
    <th>Arrival</th>
    <th>Status</th>
    <th>Bus Type</th>
    <th>Price</th>
   <th>Driver Name</th>
    
    <!-- <th>Driver ID</th>
    <th>driver License</th>
    <th>Contact</th>  -->

    <th>Actions</th> 
  </tr>
</thead>
<tbody>
<?php while($row = mysqli_fetch_assoc($schedules)): ?>
<tr>
 <td><?= htmlspecialchars($row['id']) ?></td>
  <td><?= htmlspecialchars($row['bus_no']) ?></td>
  <td><?= htmlspecialchars($row['route']) ?></td>
  <td><?= htmlspecialchars($row['departure_time']) ?></td>
  <td><?= htmlspecialchars($row['arrival_time']) ?></td>
  <td><?= htmlspecialchars($row['status']) ?></td>
  <td><?= htmlspecialchars($row['bus_type']) ?></td>
   <td><?= htmlspecialchars($row['price']) ?></td>
   <td><?= htmlspecialchars($row['driver_name']) ?></td>

    
  

  
  
  <td>
    <a href="view_schedules.php?id=<?= $row['id'] ?>" class="action-btn" id="view-btn">View</a>
    <a href="edit_schedules.php?id=<?= $row['id'] ?>" class="action-btn" id="edit-btn">Edit</a>
    <a href="?delete=<?= $row['id'] ?>" class="action-btn" id="delete-btn" onclick="return confirm('Delete this schedule?')">Delete</a>
  </td>
</tr>
<?php endwhile; ?>
</tbody>
                </table>
                <?php else: ?>
                <p class="no-schedules-message" style="color:red">No Schedules Available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</body>
</html>
