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


        
/* Report Page Styling */
#report-page {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f4f4f4;
    
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: flex-start;
     padding-left:200px;
    width:100%;
     
}

.report-container {
   
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
    top: 20px;
    left: 30px;
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
    margin-bottom: 40px;
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


<div id="report-page">
    <div class="report-container">
        <div class="back-link">
            <a href="manage_reports.php">&larr; Back to Reports</a>
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