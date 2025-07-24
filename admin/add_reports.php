<?php
include("../users/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_id = $_POST['report_id'];
    $report_title = $_POST['report_title']; // ✔️ यसलाई सही रूपमा राखियो
    $report_type = $_POST['report_type'];
    $reporter = $_POST['reporter'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    // SQL Query
    $stmt = $conn->prepare("INSERT INTO reports (report_id, report_title, report_type, reporter, date, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $report_id, $report_title, $report_type, $reporter, $date, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Report added successfully!'); window.location.href='manage_reports.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
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


/* Container layout */
#add-reports {
    width: 100%;
    display: flex;
    padding-left: 190px;
    font-family: 'Segoe UI', sans-serif;
    background-color: #f9f9f9;
    height: 472px;
    
}

/* Form box styling */
#add-report-container {
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 8px;
    width: 900px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

/* Top bar: Back link and form title */
#top-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

#top-bar h1 {
    margin: 0;
    font-size: 24px;
    color: #333;
    padding-right: 250px;
}

#back-link {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

#back-link:hover {
    text-decoration: underline;
}

/* Success and Error Messages (Optional use) */
.success {
    color: green;
    font-weight: bold;
    margin-bottom: 15px;
}

.error {
    color: red;
    font-weight: bold;
    margin-bottom: 15px;
}

/* Form fields */
form .form-row {
    margin-bottom: 18px;
}

form input,
form select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 15px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

form input:focus,
form select:focus {
    border-color: #007bff;
    outline: none;
}

/* Submit button */
.button-row button {
    background-color: #28a745;
    color: white;
    padding: 10px 20px;
    border: none;
    font-weight: bold;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
}

.button-row button:hover {
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

    <div id="add-reports">
    <div id="add-report-container">
        <div id="top-bar">
            <a href="manage_reports.php" id="back-link">← Back to Manage Reports</a>
            <h1>Add New Report</h1>
        </div>
    
        <div class="form-container">
    <h2>Add New Report</h2>
 <form  method="POST">
    <label>Report ID:</label>
    <input type="text" name="report_id" required>

    <label>Report Title:</label>
    <input type="text" name="report_title" required>

    <label>Report Type:</label>
    <input type="text" name="report_type" required>

    <label>Reporter:</label>
    <input type="text" name="reporter" required>

    <label>Date:</label>
    <input type="date" name="date" required>

    <label>Status:</label>
    <input type="text" name="status" required>

    <button type="submit">Add Report</button>
</form>

    
</div>
</body>
</html>