<?php
include("../users/config.php");

// Check if id is set
if (!isset($_GET['id'])) {
    echo "Schedule ID is missing.";
    exit;
}

$id = intval($_GET['id']); // for safety

// Fetch existing schedule data
$result = mysqli_query($conn, "SELECT * FROM bus_schedules WHERE id = $id");
if (mysqli_num_rows($result) !== 1) {
    echo "Schedule not found.";
    exit;
}
$schedule = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $bus_no = $_POST['bus_no'];
    $route = $_POST['route'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $status = $_POST['status'];
    $bus_type = $_POST['bus_type'];
    $price = $_POST['price'];
    $driver_name = $_POST['driver_name'];
    $driver_id = $_POST['driver_id'];
    $driver_license = $_POST['driver_license'];
    $contact = $_POST['contact'];

    // Update query
    $query = "UPDATE bus_schedules SET 
        bus_no='$bus_no',
        route='$route',
        departure_time='$departure',
        arrival_time='$arrival',
        status='$status',
        bus_type='$bus_type',
        price='$price',
        driver_name='$driver_name',
        driver_id='$driver_id',
        driver_license='$driver_license',
        contact='$contact'
        WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Edit Bus Schedule Successful!');
            window.location.href = 'manage_schedules.php';
        </script>";
    } else {
        echo "Error updating schedule: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Bus Schedule</title>
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
#edit-schedule {
    width: 100%;
    display: flex;
    padding-left: 195px;
    font-family: 'Segoe UI', sans-serif;
    background-color:rgb(244, 243, 243);
    height:1080px;
    
}

/* Form box styling */
#edit-schedule-container {
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

#form-title {
    margin: 0;
    font-size: 24px;
    color: #333;
    padding-right: 210px;
}

#back-link {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

#back-link:hover {
    text-decoration: underline;
}

/* Form fields */
#edit-schedule-form .form-group {
    margin-bottom: 18px;
}

#edit-schedule-form label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
    color: #333;
}

#edit-schedule-form input,
#edit-schedule-form select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 15px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

#edit-schedule-form input:focus,
#edit-schedule-form select:focus {
    border-color: #007bff;
    outline: none;
}

/* Submit button */
#submit-btn {
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

#submit-btn:hover {
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


 <div id="edit-schedule">
  <div id="edit-schedule-container">
    <div id="top-bar">
      <a href="manage_schedules.php" id="back-link">← Back to Schedules</a>
      <h2 id="form-title">Edit Bus Schedule</h2>
    </div>

    <form id="edit-schedule-form" method="POST">
      <div class="form-group">
        <label>Bus No:</label>
        <input type="text" name="bus_no" value="<?= htmlspecialchars($schedule['bus_no']) ?>" required>
      </div>
      <div class="form-group">
        <label>Route:</label>
        <input type="text" name="route" value="<?= htmlspecialchars($schedule['route']) ?>" required>

      </div>
      <div class="form-group">
        <label>Departure Time:</label>
        <input type="time" name="departure" value="<?= htmlspecialchars($schedule['departure_time']) ?>" required>
        </div>

      <div class="form-group">
        <label>Arrival Time:</label>
        <input type="time" name="arrival" value="<?= htmlspecialchars($schedule['arrival_time']) ?>" required>
        </div>

      <div class="form-group">
        <label>Status:</label>
        <select name="status" required>
        <option value="Active" <?= $schedule['status'] === 'Active' ? 'selected' : '' ?>>Active</option>
        <option value="Inactive" <?= $schedule['status'] === 'Active' ? 'selected' : '' ?>>Inactive</option>
        <option value="pending" <?= $schedule['status'] === 'Active' ? 'selected' : '' ?>>Pending</option>
        </select>
      </div>

      <div class="form-group">
        <label>Bus Type:</label>
        <select name="bus_type" required>
        <option value="AC" <?php if ($schedule['bus_type'] == 'AC') echo 'selected'; ?>>Ac</option>
       <option value="Deluxe" <?php if ($schedule['bus_type'] == 'deluxe') echo 'selected'; ?>>Deluxe</option>
         <option value="Non-Ac" <?php if ($schedule['bus_type'] == 'Non-Ac') echo 'selected'; ?>>Non-Ac</option>
        </select>
      </div>

      <div class="form-group">
  <label for="price">Ticket Price (Rs):</label>
  <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($schedule['price']) ?>" required>

     </div>

      <div class="form-group">
        <label>Driver Name:</label>
        <input type="text" name="driver_name" value="<?= htmlspecialchars($schedule['driver_name']) ?>" required>

      </div>
      <div class="form-group">
        <label>Driver ID:</label>
        <input type="text" name="driver_id" value="<?= htmlspecialchars($schedule['driver_id']) ?>" required>

      </div>
      <div class="form-group">
        <label>Driver License:</label>
        <input type="text" name="driver_license" value="<?= htmlspecialchars($schedule['driver_license']) ?>" required>

      </div>
      <div class="form-group">
        <label> Contact:</label>
        <input type="text" name="contact" value="<?= htmlspecialchars($schedule['contact']) ?>" required>

      </div>
      <button id="submit-btn" type="submit" name="update">Update Schedule</button>
    </form>
  </div>
</div>


</body>
</html>
