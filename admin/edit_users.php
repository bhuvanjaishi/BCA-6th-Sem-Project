<?php
include("../users/config.php"); // Database connection

// Fetch user data for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

// Update user data on form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE users SET fullname=?, email=?, password=?, address=?, contact=?, gender=?, role=? WHERE id=?");
    $stmt->bind_param("sssssssi", $fullname, $email, $password, $address, $contact, $gender, $role, $id);

    if ($stmt->execute()) {
        echo "<script>alert('User updated successfully.'); window.location.href='manage_users.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
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


/* Layout Container */
#edit-user {
    width: 100%;
    display: flex;
    padding-left: 190px;
    font-family: 'Segoe UI', sans-serif;
    background-color: #f2f2f2;
   
}

/* Inner Form Box */
#user-container {
    background-color: white;
    padding: 30px 40px;
    border-radius: 8px;
    width: 900px;
    margin: auto;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

/* Top bar with back link and heading */
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
    padding-right: 315px;
}

/* Form Rows */
.form-row {
    margin-bottom: 20px;
}

.form-row label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #444;
}

.form-row input,
.form-row select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    font-size: 16px;
    border-radius: 5px;
    transition: border-color 0.3s ease;
}

.form-row input:focus,
.form-row select:focus {
    border-color: #007bff;
    outline: none;
}

/* Submit Button */
.button-row {
    margin-top: 30px;
}

#submit-btn {
    background-color: #007bff;
    color: white;
    padding: 12px 25px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
}

#submit-btn:hover {
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
                    <a href="view_booking.php">
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
                    <a href="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
        

    <div id="edit-user">
    <div id="user-container">
    <div id="top bar">
        <a href="manage_users.php" id="back-link"><- Back to Manage users</a>
     <h1 id="form-title">Edit User</h1>
     </div>

<form  method="POST" action="edit_users.php">

<input type="hidden" name="id" value="<?= $user['id'] ?>">
    <div id="fullname-row" class="form-row">
        <label for="fullname-input">Fullname:</label>
        <input id="fullname-input" type="text" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>" required>
    </div>

    <div id="email-row" class="form-row">
        <label for="email-input">Email:</label>
        <input id="email-input" type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
    </div>

    <div id="password-row" class="form-row">
        <label for="password-input">Password:</label>
        <input id="password-input" type="text" name="password" value="<?= htmlspecialchars($user['password']) ?>" required>
    </div>

    <div id="address-row" class="form-row">
        <label for="address-input">Address:</label>
        <input id="address-input" type="text" name="address" value="<?= htmlspecialchars($user['address']) ?>" required>
    </div>

    <div id="contact-row" class="form-row">
        <label for="contact-input">Contact:</label>
        <input id="contact-input" type="text" name="contact" value="<?= htmlspecialchars($user['contact']) ?>" required>
    </div>

    <div id="gender-row" class="form-row">
        <label for="gender-select">Gender:</label>
        <select id="gender-select" name="gender" required>
            <option value="male" <?= $user['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
            <option value="female" <?= $user['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
            <option value="other" <?= $user['gender'] == 'other' ? 'selected' : '' ?>>Other</option>
        </select>
    </div>

    <div id="role-row" class="form-row">
        <label for="role-select">Role:</label>
        <select id="role-select" name="role" required>
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="driver" <?= $user['role'] == 'driver' ? 'selected' : '' ?>>Driver</option>
        </select>
    </div>

    <div id="submit-row" class="button-row">
        <button id="submit-btn" type="submit">Update</button>
    </div>
</form>
</div>

</body>
</html>