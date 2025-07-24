
<?php 
include("config.php");
// Fetch routes from the database
$sql = "SELECT * FROM routes";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --sidebar-width: 250px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f6fa;
            color: #333;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width:220px;
            background-color: var(--dark-color);
            color: white;
            height: 100vh;
            position: fixed;
           
            transition: all 0.3s;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar-header h3 {
            color: white;
           
        }

        .sidebar-menu {
          
        }

        .menu-item {
            padding: 8px 11px;
            display: flex;
            align-items: center;
            color: var(--light-color);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 3px solid var(--primary-color);
        }

        .menu-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 3px solid var(--primary-color);
            color: white;
        }

        .menu-item i {
            margin-right: 10px;
            font-size: 18px;
        }

        .menu-item.logout {
            color: var(--accent-color);
            margin-top: -20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
        }

        
/* Container Styling */
#route-container {
    width: 100%;
  
  padding-left:220px;
  background: #f8f9fa;
  border-radius: 10px;
  box-shadow: 0 0 12px rgba(42, 8, 195, 0.1);
  font-family: 'Segoe UI', sans-serif;
}

/* Page Title */
#page-title {
  text-align: center;
  color: #333;
  margin-bottom: 5px;
  font-size: 28px;
}

/* Table Container */
#table-container {
  overflow-x: auto;
}

/* Table Styling */
#routes-table {
  width: 100%;
  border-collapse: collapse;
  background-color: #ffffff;
}

#routes-table thead {
  background-color:rgb(67, 67, 68);
  color: white;
}

#routes-table th,
#routes-table td {
  padding: 12px 15px;
  border: 1px solid #dee2e6;
  text-align: center;
}

#routes-table tbody tr:nth-child(even) {
  background-color: #f1f1f1;
}

#routes-table tbody tr:hover {
  background-color: #e2e6ea;
  transition: background 0.3s ease;
}
/* Active Status - Green */
.status-active {
  background-color: #28a745;
  color: white;
  font-weight: bold;
}

/* Inactive Status - Red */
.status-inactive {
  background-color: #dc3545;
  color: white;
  font-weight: bold;
}

/* Pending Status - Orange */
.status-pending {
  background-color: #ffc107;
  color: black;
  font-weight: bold;
}




</style>

</head>
<body>

     <!-- Sidebar -->
     <div class="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-bus" style=" font-size: 30px; color: var(--primary-color);"></i>
            <h3>Bus-Reservation</h3>
        </div>
        
        <div class="sidebar-menu">
            <a href="user_dashboard.php" class="menu-item active">
                <i class="fas fa-tachometer-alt"></i>
                <span>User Dashboard</span>
            </a>

            <a href="routes.php" class="menu-item">
            <i class="fas fa-route"></i>
           <span>Routes</span>
             </a>

             <a href="bus_schedule.php" class="menu-item">
            <i class="fas fa-calendar-alt"></i>
            <span>Bus Schedule</span>
            </a>

             <a href="View_buses.php" class="menu-item">
            <i class="fas fa-bus"></i>
           <span>View Bus</span>
             </a>

            <a href="book_ticket.php" class="menu-item">
                <i class="fas fa-ticket-alt"></i>
                <span>Book Ticket</span>
            </a>

            <a href="view_booking.php" class="menu-item">
                <i class="fas fa-history"></i>
                <span>Booking History</span>
            </a>

            <a href="payments.php" class="menu-item">
                <i class="fas fa-credit-card"></i>
                <span>Payments</span>
            </a>
            
          
            <a href="report.php" class="menu-item">
                <i class="fas fa-flag"></i>
               <span>Report</span>
              </a>
              
            <a href="setting.php" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>

            <a href="logout.php" class="menu-item logout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <div id="route-container">
    <h1 id="page-title"><i class="fas fa-route"></i> Available Routes</h1>

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
                </tr>
            </thead>
            <tbody>
    <?php while($row = $result->fetch_assoc()) { 
        $status = strtolower($row['status']); // status in lowercase
        $class = ''; // default class

        if ($status == 'active') {
            $class = 'status-active';
        } elseif ($status == 'inactive') {
            $class = 'status-inactive';
        } elseif ($status == 'pending') {
            $class = 'status-pending';
        }
    ?>
        <tr>
            <td><?php echo $row['route_id']; ?></td>
            <td><?php echo $row['origin']; ?></td>
            <td><?php echo $row['destination']; ?></td>
            <td><?php echo $row['distance']; ?> km</td>
            <td><?php echo $row['duration']; ?> hours</td>
            
            <td class="<?php echo $class; ?>"><?php echo $row['status']; ?></td>
        </tr>
    <?php } ?>
</tbody>

        </table>
    </div>
</div>

</body>
</html>