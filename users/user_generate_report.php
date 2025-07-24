<?php
include("../users/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_title = $_POST['report_title'];
    $report_type = $_POST['report_type'];
    $reporter = $_POST['reporter'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO reports (report_title, report_type, reporter, date, status) 
            VALUES ('$report_title', '$report_type', '$reporter', '$date', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Report added successfully!'); window.location.href='report.php';</script>";
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


    <div id="add-reports">
    <div id="add-report-container">
        <div id="top-bar">
            <a href="report.php" id="back-link">← Back to Manage Reports</a>
            <h1>Add New Report</h1>
        </div>
    
        <div class="form-container">
    <h2>Add New Report</h2>
    <form action="" method="POST">
        <label>Report Title</label>
        <input type="text" name="report_title" required>

        <label>Report Type:</label>
<select name="report_type" required>
    <option value="">-- Select Report Type --</option>
    <option value="Technical Issue">Technical Issue</option>
    <option value="User Feedback">User Feedback</option>
    <option value="Payment Problem">Payment Problem</option>
    <option value="Schedule Error">Schedule Error</option>
    <option value="Other">Other</option>
</select>


        <label>Reporter</label>
        <input type="text" name="reporter" required>

        <label>Date</label>
        <input type="date" name="date" required>

        

        <button type="submit">Add Report</button>
    </form>
    
</div>

    
</div>
</body>
</html>