<?php
include("../users/config.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM reports WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $report = $result->fetch_assoc();
    } else {
        echo "Report not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
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

        

/* Report Page Styling */
#report-page {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f4f4f4;
    
   
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding-left:220px;
    width:100%;
}

.report-container {
    max-width: 900px;
    width: 100%;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
    position: relative;
    color: #333;
}

.back-link {
    position: absolute;
    
}

.back-link a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

.back-link a:hover {
    text-decoration: underline;
}

.report-container h2 {
    text-align: center;
    margin-bottom: 10px;
    font-size: 26px;
    color: #222;
}

.report-field {
    margin-bottom: 20px;
}

.report-field label {
    display: block;
    font-weight: 600;
    color: #555;
    margin-bottom: 5px;
}

.report-field p {
    font-size: 16px;
    background-color: #f9f9f9;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
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



<div id="report-page">
    <div class="report-container">
        <div class="back-link">
            <a href="report.php">&larr; Back to Reports</a>
        </div>
        <h2>View Report</h2>

        <div class="report-field">
            <label>Report Title:</label>
            <p><?= htmlspecialchars($report['report_title']) ?></p>
        </div>

        <div class="report-field">
            <label>Report Type:</label>
            <p><?= htmlspecialchars($report['report_type']) ?></p>
        </div>

        <div class="report-field">
            <label>Reporter:</label>
            <p><?= htmlspecialchars($report['reporter']) ?></p>
        </div>

        <div class="report-field">
            <label>Date:</label>
            <p><?= htmlspecialchars($report['date']) ?></p>
        </div>

        <div class="report-field">
            <label>Status:</label>
            <p><?= htmlspecialchars($report['status']) ?></p>
        </div>
    </div>
</div>


</body>
</html>