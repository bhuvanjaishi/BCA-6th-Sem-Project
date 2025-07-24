<?php
include("config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Settings</title>
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
       

        

/* Main Container */
#setting-section{
    width: 100%;
    padding-left:200px;
}
#user-settings-container {
    margin: 0 auto;
    padding: 30px;
    background-color: #f9f9f9;
    
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

/* Headings */
#user-settings-container h2 {
    text-align: center;
    font-size: 32px;
    color: #333;

}

#user-settings-container h3 {
    font-size: 20px;
    color: #444;
    
}

/* Form Group Style */
.form-group {
    padding:5px;
}

.form-group label {
    display: block;
    font-size: 16px;
    font-weight: 600;
    color: #555;
  
   
}

/* Input Fields */
#id, #fullname, #email, #address, #contact, #gender,
#current_password, #new_password, #confirm_password {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    color: #333;
}

input:focus {
    border-color: #007bff;
    outline: none;
}

/* Buttons (common style but no color override) */
button {
    width: 100%;
    padding: 10px;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

/* Keep original green for Update Profile */
#update-profile-btn {
    background-color: #28a745;  /* green */
    color: #fff;
}

#update-profile-btn:hover {
    background-color: #218838;
}

/* Keep original blue for Change Password */
#change-password-btn {
    background-color: #007bff;  /* blue */
    color: #fff;
}

#change-password-btn:hover {
    background-color: #0056b3;
}

/* Keep original red for Delete Account */
.delete {
    background-color: #dc3545;  /* red */
    color: #fff;
}

.delete:hover {
    background-color: #c82333;
}

/* Horizontal Line */
hr {
    border: 0;
    height: 1px;
    background-color: #ddd;
    margin: 15px 0;
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


<div id="setting-section">
<div id="user-settings-container">
    <h2>User Settings</h2>
    
    <form action="user_update_profile.php" method="POST">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" required>
        </div>

        <div class="form-group">
            <label>Gender</label>
                <select name="gender">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
        </div>
        
        <button type="submit" name="update_profile" id="update-profile-btn">Update Profile</button>
    </form>

    <hr>

    <!-- Change Password Form -->
    <form action="user_change_pass.php" method="POST">
        <h3>Change Password</h3>
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" id="current_password" name="current_password" required>
        </div>
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        
        <button type="submit" name="change_password" id="change-password-btn">Change Password</button>
    </form>
<br>
    <hr>

    <!-- Delete Account Form -->
    <form action="delete_account.php" method="POST" onsubmit="return confirm('Are you sure to delete your account permanently?');">
        <button type="submit" name="delete_account" class="delete">Delete Account Permanently</button>
    </form>
</div>
</div>

</body>
</html>
