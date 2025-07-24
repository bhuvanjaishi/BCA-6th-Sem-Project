<?php
include("../users/config.php"); // Database connection

// Delete user if delete id is passed
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    echo "<script>alert('User deleted successfully.'); window.location.href='manage_users.php';</script>";
}

// Fetch all users
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusGo - Admin Dashboard</title>
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


/* Manage Users Container */
#manage-container {
    width: 1000px;
    padding-left: 200px;
    background-color: #f9f9f9;
    font-family: 'Segoe UI', sans-serif;
    padding-top:20px;
   
}

/* Header Styling */
#manage-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  
    
}

#manage-header h1 {
    font-size: 24px;
    color: #333;
    padding-right:300px;
    margin-top:-30px;
}

#add-user {
    text-decoration: none;
    background-color: #28a745;
    color: #fff;
    padding: 10px 18px;
    border-radius: 5px;
    font-weight: bold;
}

#add-user:hover {
    background-color: #218838;
}

/* Table Styling */
table {
    width: 882px;%;
    border-collapse: separate;
    border-spacing: 0 5px; /* Like in routes table */
    background-color: #fff;
    
}

/* Table Head */
thead {
    background-color: #007bff;
    color: white;
   
}

th, td {
    border: 1px solid #ddd;
    text-align: center;
    
}

/* Hover effect on rows */
tbody tr:hover {
    background-color: #f1f1f1;
}

/* Action Buttons */
.button {
    padding: 5px 12px;
    color: white;
    border-radius: 4px;
    text-decoration: none;
    margin: 2px;
    font-size: 14px;
    background-color: #007bff; /* default color */
    display: inline-block;
}

.button:hover {
    background-color: #0056b3;
}

.button.view {
    background-color: green;
}

.button.view:hover {
    background-color: rgb(5, 162, 18);
}

.button.delete {
    background-color: #dc3545;
}

.button.delete:hover {
    background-color: #c82333;
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


    
    <div id="manage-container">
        <div id="manage-header">
            
            <a id="add-user" href="add_users.php">+ Add New Users</a>
            
            <h1>Manage Users</h1>
            
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>fullname</th>
                    <th>email</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['fullname']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['address']) ?></td>
                    <td><?= htmlspecialchars($row['contact']) ?></td>
                    <td><?= htmlspecialchars($row['gender']) ?></td>
                    <td><?= htmlspecialchars($row['role']) ?></td>
                    <td>
                        <a class="button view" href="view_users.php?id=<?= $row['id'] ?>">View</a>
                        <a class="button" href="edit_users.php?id=<?= $row['id'] ?>">Edit</a>
                        <a class="button delete" href="manage_users.php?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>