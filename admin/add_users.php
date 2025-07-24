<?php
include("../users/config.php"); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $role = 'User';


    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password, address, contact, gender, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $fullname, $email, $password, $address, $contact, $gender,$role);

    if ($stmt->execute()) {
        echo "<script>alert('User added successfully.'); window.location.href='manage_users.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add User - Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
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


#add-user {
    width: 100%;
    display: flex;
    padding-left: 190px;
    font-family: 'Segoe UI', sans-serif;
    background-color: #f2f2f2;
    height: 100vh;
}

#user-container {
    background-color: white;
    padding: 40px 50px;
    border-radius: 8px;
    width: 900px;
    margin: auto;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

#top\ bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
}

#back-link {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
    font-size: 15px;
}

#back-link:hover {
    text-decoration: underline;
    color: #0056b3;
}

#form-title {
    font-size: 26px;
    font-weight: bold;
    color: #333;
    padding-right: 250px;
}

form .form-row {
    margin-bottom: 20px;
}

form label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

form input,
form select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    font-size: 16px;
    border-radius: 5px;
    transition: border-color 0.3s;
}

form input:focus,
form select:focus {
    border-color: #007bff;
    outline: none;
}

button[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 12px 25px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
    width: 100%;
}

button[type="submit"]:hover {
    background-color: #0056b3;
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

    <div id="add-user">
    <div id="user-container">
    <div id="top bar">
        <a href="manage_users.php" id="back-link"><- Back to Manage users</a>
     <h1 id="form-title">Add New User</h1>
     </div>

    <form method="POST" action="add_users.php">
        <div class="form-row">
            <label>Fullname:</label>
            <input type="text" name="fullname" required>
        </div>

        <div class="form-row">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-row">
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-row">
            <label>Address:</label>
            <input type="text" name="address" required>
        </div>

        <div class="form-row">
            <label>Contact:</label>
            <input type="text" name="contact" required>
        </div>

        <div class="form-row">
            <label>Gender:</label>
            <select name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-row">
            <label>Role:</label>
            <select name="role" required>
                <option value="Choose Role">Choose Role</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
               <option value="Driver">Driver</option>
            </select>
        </div>

        <button type="submit">Add User</button>
    </form>
</div>
</div>


</body>
</html>
