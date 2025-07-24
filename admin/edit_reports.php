<?php
include("../users/config.php");

$id = $_GET['id'];
$sql = "SELECT * FROM reports WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_title = $_POST['report_title'];
    $report_type = $_POST['report_type'];
    $reporter = $_POST['reporter'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $sql = "UPDATE reports SET 
                report_title='$report_title', 
                report_type='$report_type', 
                reporter='$reporter', 
                date='$date', 
                status='$status' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Report updated successfully!'); window.location.href='manage_reports.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
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



        
/* Edit Report Container */
#edit-report {
    background-color: #fff;
    width: 600px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding-left:210px;
    height:670px;
    width:100%;
}

/* Report Title Section */
#report-container {
    margin-bottom: 20px;
   
}

#top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    
}

#back-link {
    font-size: 16px;
    color: #007bff;
    text-decoration: none;
}

#back-link:hover {
    text-decoration: underline;
}

#form-title {
    font-size: 24px;
    color: #333;
    padding-left:400px;
}

/* Form Elements */
form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: bold;
    color: #555;
}

input[type="text"], input[type="date"], select {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

input[type="text"]:focus, input[type="date"]:focus, select:focus {
    border-color: #007bff;
    outline: none;
}

button[type="submit"] {
    background-color: #28a745;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    font-weight: bold;
}

button[type="submit"]:hover {
    background-color: #218838;
}

option {
    padding: 10px;
}
        
</style>

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


    <div id="edit-report">
    <div id="report-container">
    <div id="top bar">
        <a href="manage_reports.php" id="back-link"><- Back to Manage Repotrs</a>
     <h1 id="form-title">Edit Report</h1>
     </div>
     
    <form method="POST">
        <label>Report Title:</label>
        <input type="text" name="report_title" value="<?= $row['report_title'] ?>" required><br>

        <label>Report Type:</label>
        <select name="report_type" required>
            <option value="Technical Issue" <?= $row['report_type'] == 'Technical Issue' ? 'selected' : '' ?>>Technical Issue</option>
            <option value="User Feedback" <?= $row['report_type'] == 'User Feedback' ? 'selected' : '' ?>>User Feedback</option>
            <option value="Payment Problem" <?= $row['report_type'] == 'Payment Problem' ? 'selected' : '' ?>>Payment Problem</option>
            <option value="Schedule Error" <?= $row['report_type'] == 'Schedule Error' ? 'selected' : '' ?>>Schedule Error</option>
            <option value="Other" <?= $row['report_type'] == 'Other' ? 'selected' : '' ?>>Other</option>
        </select><br>

        <label>Reporter:</label>
        <input type="text" name="reporter" value="<?= $row['reporter'] ?>" required><br>

        <label>Date:</label>
        <input type="date" name="date" value="<?= $row['date'] ?>" required><br>

        <label>Status:</label>
        <select name="status" required>
            <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
            <option value="Reviewed" <?= $row['status'] == 'Reviewed' ? 'selected' : '' ?>>Reviewed</option>
            <option value="Resolved" <?= $row['status'] == 'Resolved' ? 'selected' : '' ?>>Resolved</option>
        </select><br><br>

        <button type="submit">Update Report</button>
    </form>
</div>
    </div>
</body>
</html>