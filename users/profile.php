<?php
include("config.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: profile.php');
    exit();
}

// Fetch user details
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id AND role = 'user'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "User not found!";
    exit();
}

// Update Profile Logic
if (isset($_POST['update'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    if (!empty($full_name) && !empty($phone)) {
        $update_query = "UPDATE users SET full_name='$full_name', phone='$phone', address='$address' WHERE id='$user_id'";
        if (mysqli_query($conn, $update_query)) {
            header('Location: profile.php');
            exit();
        } else {
            echo "Update failed!";
        }
    } else {
        echo "Full Name र Phone Number खाली हुन हुन्न।";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile - Bus Reservation</title>
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
            width: var(--sidebar-width);
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
            padding: 9px 9px;
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
                <span>Dashboard</span>
            </a>

            <a href="routes.php" class="menu-item">
            <i class="fas fa-route"></i>
           <span>Routes</span>
             </a>

             <a href="View_buses.php" class="menu-item">
            <i class="fas fa-bus"></i>
           <span>View Bus</span>
             </a>

             <a href="bus_schedule.php" class="menu-item">
            <i class="fas fa-calendar-alt"></i>
            <span>Bus Schedule</span>
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
 
    <!-- Profile Form -->
<h2>My Profile</h2>
<form method="POST">
    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?php echo $user['full_name']; ?>" required><br><br>

    <label>Email (readonly):</label><br>
    <input type="email" value="<?php echo $user['email']; ?>" readonly><br><br>

    <label>Phone Number:</label><br>
    <input type="text" name="phone" value="<?php echo $user['phone']; ?>" required><br><br>

    <label>Address:</label><br>
    <input type="text" name="address" value="<?php echo $user['address']; ?>"><br><br>

    <button type="submit" name="update">Update Profile</button>
</form>
</body>
</html>
