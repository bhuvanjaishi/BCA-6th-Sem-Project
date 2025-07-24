<?php
include("../users/config.php"); // Database connection

// Fetch all reports from the database for listing
$sql = "SELECT * FROM reports";
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



/* Manage Report Container */
#manage-report {
    width:100%;
    font-family: Arial, sans-serif;
    padding-left:230px;
}

#report-management-container {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    
}

/* Page Header */
#page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.page-title {
    font-size: 24px;
    color: #333;
    display: flex;
    align-items: center;
}

.page-title i {
    margin-right: 10px;
}

#generate-new-report-btn {
    background-color: #28a745;
    border: none;
    padding: 10px 18px;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
}

#generate-new-report-btn a {
    text-decoration: none;
    color: #fff;
}

#generate-new-report-btn:hover {
    background-color: #218838;
}

/* Reports Table */
#reports-table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

#reports-table th, #reports-table td {
    padding: 10px 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

#reports-table thead {
    background-color: #007bff;
    color: #fff;
   
}

#reports-table th {
    font-weight: bold;
}


#reports-table td a {
    color: #007bff;
    text-decoration: none;
    margin: 0 5px;
}

#reports-table td a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
    #page-header {
        flex-direction: column;
        align-items: flex-start;
    }

    #generate-new-report-btn {
        margin-top: 10px;
    }

    #reports-table th, #reports-table td {
        padding: 10px;
    }
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


    <div id="manage-report">
    <div class="container" id="report-management-container">
        <div class="page-header" id="page-header">
            <h1 class="page-title"><i class="fas fa-file-alt"></i> Reports Management</h1>
            <button class="action-btn view-btn" id="generate-new-report-btn">
                <i class="fas fa-plus"></i><a href="user_generate_report.php"> + Generate New Report</a>
            </button>
        </div>

        <!-- Reports Table -->
        <table class="reports-table" id="reports-table">
            <thead>
                <tr>
                    <th>Report Title</th>
                    <th>Report Type</th>
                    <th>Reporter</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               <?php

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['report_title'] . "</td>";
                        echo "<td>" . $row['report_type'] . "</td>";
                        echo "<td>" . $row['reporter'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>
                                <a href='user_view_report.php?id=" . $row['id'] . "'>View</a> 
                               
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No reports found!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>