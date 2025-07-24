<?php
include("../users/config.php"); // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BusGo - Settings</title>
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

        /* Container Layout */
.container-wrapper {
    display: flex;
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    background-color: #f8f9fa;
}

/* Sidebar */
.sidebar-option {
    width: 195px;
    background-color: #2c3e50;
    padding: 20px;
    color: #fff;
}

.sidebar-option a {
    text-decoration: none;
    color: #ecf0f1;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.sidebar-active {
    background-color: #34495e;
}


/* Main Content */
.content-wrapper {
    flex: 1;
    padding: 40px;
    background-color: #ffffff;
}

/* Header */
.page-header h1 {
    font-size: 28px;
    color: #2c3e50;
    margin-bottom: 30px;
}

/* Tabs Section */
.tabs-section {
    display: flex;
    gap: 20px;
    margin-bottom: 25px;
    border-bottom: 2px solid #ddd;
}

.tab-link {
    padding: 10px 20px;
    cursor: pointer;
    font-weight: 500;
    color: #555;
    border-radius: 6px 6px 0 0;
    background-color: #eaeaea;
    transition: background-color 0.3s ease;
}

.tab-link:hover {
    background-color: #dcdcdc;
}

.tab-selected {
    background-color: #fff;
    color: #000;
    border-bottom: 2px solid #fff;
}

/* Tab Content */
.tab-pane {
    display: none;
    padding: 20px 0;
}

.tab-visible {
    display: block;
}

/* Settings Form */
.form-settings {
    max-width: 500px;
}

.input-row {
    margin-bottom: 20px;
}

.input-row label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

.input-row input,
.input-row select {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 15px;
}

/* Save Button */
.button.primary-button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.button.primary-button:hover {
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
                <h2> Bus-reservation</h2>
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
                    <a href="manage_bus.php">
                        <i class="fas fa-calendar-alt "></i>
                        <span> Manage Schedules</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="manage_schedules.php">
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

        <div class="container-wrapper">
    <!-- Sidebar with Settings active -->
    <div class="sidebar-option sidebar-active">
        <a href="settings.html"><i class="fas fa-cog"></i><span>Settings</span></a>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">
        <div class="page-header">
            <h1>System Settings</h1>
        </div>

        <div class="tabs-section">
            <div class="tab-link tab-selected" data-tab="general">General</div>
            <div class="tab-link" data-tab="payment">Payment</div>
            <div class="tab-link" data-tab="notifications">Notifications</div>
            <div class="tab-link" data-tab="security">Security</div>
        </div>

        <div class="tab-pane tab-visible" id="general-tab">
            <form class="form-settings">
                <div class="input-row">
                    <label>System Name</label>
                    <input type="text" value="Bus Reservation ">
                </div>
                <div class="input-row">
                    <label>Default Timezone</label>
                    <select>
                        <option>Asia/Kathmandu (GMT +5:45)</option>
                    </select>
                </div>
                <button type="submit" class="button primary-button">Save Settings</button>
            </form>
        </div>
    </div>
</div>

    
</body>
</html>