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
                <span> USer Dashboard</span>
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

            <a href="payemnts.php" class="menu-item">
                <i class="fas fa-credit-card"></i>
                <span>Payments</span>
            </a>
            
            <a href="profile.php" class="menu-item">
                <i class="fas fa-user"></i>
                <span>Profile</span>
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