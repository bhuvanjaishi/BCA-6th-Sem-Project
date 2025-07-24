<?php
include("config.php");

// Retrieve all bus schedules
$result = mysqli_query($conn, "SELECT * FROM bus_schedules");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Schedules</title>
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
#schedule-container {
 
  
  
}

/* Title Styling */
#schedule-title {
    font-size: 24px;
    text-align: center;
    color: #333;
    margin-bottom: 10px;
    font-weight: bold;
}


/* Table Styling */
#schedule-table {
    
}

/* Table Headers */
#schedule-table th {
    background-color: #007bff;
    color: white;
    padding: 6px;
    text-align: left;
    font-size: 15px;
}

/* Table Cells */
#schedule-table td {
    padding: 19px 9px;
    border-bottom: 1px solid #ddd;
    font-size: 14px;
    color: #333;
}

/* Zebra Stripe Effect */
#schedule-table tr:nth-child(even) {
    background-color: #f1f1f1;
}

/* Hover Effect */
#schedule-table tr:hover {
    background-color: #e9f5ff;
    transition: background-color 0.3s;
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
   
    
  <div id="schedule-container">
    
  <h2 id="schedule-title"> <i class="fas fa-calendar-alt"></i> Available Bus Schedules</h2>
  <div id="schedule-table-wrapper">
    <table id="schedule-table">
        
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
    <th>Driver ID</th>
    <th>driver License</th>
    <th>Contact</th>
      </tr>
      <?php if (mysqli_num_rows($result) > 0): ?>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
          <td><?= htmlspecialchars($row['bus_no']) ?></td>
          <td><?= htmlspecialchars($row['route']) ?></td>
          <td><?= htmlspecialchars($row['departure_time']) ?></td>
          <td><?= htmlspecialchars($row['arrival_time']) ?></td>
          <td><?= htmlspecialchars($row['status']) ?></td>
          <td><?= htmlspecialchars($row['bus_type']) ?></td>
          <td>Rs.<?= htmlspecialchars($row['price']) ?></td>
          <td><?= htmlspecialchars($row['driver_name']) ?></td>
          <td><?= htmlspecialchars($row['driver_id']) ?></td>
          <td><?= htmlspecialchars($row['driver_license']) ?></td>
          <td><?= htmlspecialchars($row['contact']) ?></td>
        </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr>
        <td colspan="9" style="text-align:center; color: red;">No Schedule Available</td>
    </tr>
<?php endif; ?>


</body>
</html>
