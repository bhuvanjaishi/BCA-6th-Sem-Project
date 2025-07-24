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

        

/* Manage Report Container */
#manage-report {
    width:100%;
    font-family: Arial, sans-serif;
    padding-left:185px;
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
    padding: 5px 8px;
 
    border-bottom: 1px solid #ddd;
}

#reports-table thead {
    background-color: #007bff;
    color: #fff;
   
   
}

#reports-table th {
    font-weight: bold;
    padding-left:18px;
}


#reports-table td a {
    color: #007bff;
    text-decoration: none;
    margin: 0 5px;
}

#reports-table td a:hover {
    text-decoration: underline;
}




/* General Action Button Styling */
.action-btn {
    display: inline-block;
    padding: 6px 6px;
    margin: 0 4px;
    border-radius: 5px;
    text-decoration: none !important;
    font-size: 13px;
    font-weight: bold;
    color: white !important;
    transition: background-color 0.3s ease;
}

/* View Button */
.view-btn {
    background-color: #17a2b8;
}
.view-btn:hover {
    background-color: #138496;
}

/* Edit Button */
.edit-btn {
    background-color: #ffc107;
    color: black !important; /* Override white to black */
}
.edit-btn:hover {
    background-color: #e0a800;
}

/* Delete Button */
.delete-btn {
    background-color: #dc3545;
}
.delete-btn:hover {
    background-color: #bd2130;
}

/* + Add / Generate Button (e.g., + Generate New Report) */
.add-btn {
    background-color: #28a745;
    color: white !important;
    border: none;
}
.add-btn:hover {
    background-color: #218838;
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




    <div id="manage-report">
    <div class="container" id="report-management-container">
        <div class="page-header" id="page-header">
            <h1 class="page-title"><i class="fas fa-file-alt"></i> Reports Management</h1>
            <button class="action-btn view-btn" id="generate-new-report-btn">
                <i class="fas fa-plus"></i><a href="add_reports.php"> + Generate New Report</a>
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
        echo "<td>" . htmlspecialchars($row['report_title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['report_type']) . "</td>";
        echo "<td>" . htmlspecialchars($row['reporter']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
        echo "<td>
            <a href='view_reports.php?id=" . $row['id'] . "' class='action-btn view-btn'>View</a>
            <a href='edit_reports.php?id=" . $row['id'] . "' class='action-btn edit-btn'>Edit</a>
            <a href='delete_reports.php?id=" . $row['id'] . "' class='action-btn delete-btn' onclick='return confirm(\"Are you sure?\")'>Delete</a>
        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No reports found!</td></tr>";
}
?>
</tbody>


</body>
</html>