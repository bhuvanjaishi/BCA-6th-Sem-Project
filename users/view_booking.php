<?php
include("config.php"); // Database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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



        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Form Container */
        .form-container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            max-width: 800px;
            margin: 0 auto;
        }

        .form-header {
            margin-bottom: 30px;
            text-align: center;
        }

        .form-header h2 {
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        .form-header p {
            color: #7f8c8d;
        }

        /* Form Elements */
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* Bus Features */
        .features-container {
            margin: 25px 0;
        }

        .features-title {
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 15px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .feature-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Bus Layout */
        .layout-container {
            margin: 25px 0;
        }

        .layout-preview {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 20px;
            margin-top: 15px;
            text-align: center;
        }

        .layout-grid {
            display: inline-grid;
            grid-template-columns: repeat(4, 40px);
            gap: 10px;
            margin-top: 15px;
        }

        .seat {
            width: 40px;
            height: 40px;
            background-color: #ddd;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .seat.selected {
            background-color: var(--primary-color);
            color: white;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 16px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid #ddd;
            color: var(--dark-color);
        }

        .btn-outline:hover {
            background-color: #f8f9fa;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: hidden;
            }
            
            .sidebar-header h3, .menu-item span {
                display: none;
            }
            
            .menu-item {
                justify-content: center;
                padding: 15px 0;
            }
            
            .menu-item i {
                margin-right: 0;
                font-size: 20px;
            }
            
            .main-content {
                margin-left: 70px;
                width: calc(100% - 70px);
            }
            
            .form-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .features-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
        }

        @media (max-width: 576px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .form-container {
                padding: 20px 15px;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-bus" style="font-size: 30px; color: var(--primary-color);"></i>
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

    
    <!-- Main Content -->
</body>
</html>
