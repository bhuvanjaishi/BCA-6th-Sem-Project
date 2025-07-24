<?php
include("../users/config.php");

// Fetch route details for editing
$id = $_GET['id'];
$sql = "SELECT * FROM routes WHERE id=$id";
$result = $conn->query($sql);
$route = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from form
    $route_id = $_POST['route_id'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    
   
    $status = $_POST['status'];

    // Update the route in the database
    $sql = "UPDATE routes SET route_id='$route_id', origin='$origin', destination='$destination', distance='$distance', duration='$duration',  status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Edit Route Successful');
        window.location.href = 'manage_routes.php';
      </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Route</title>
    <link rel="stylesheet" href="styles.css">
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


        /* Main Container */
        #edit-route {
          width: 100%;
          display: flex;
          justify-content: center;
          font-family: 'Segoe UI', sans-serif;
          background-color: #f9f9f9;
          padding-left:190px;
          height:724px;
        }

        /* Form Box */
        #edit-route-container {
          background-color: #fff;
          padding: 30px 40px;
          border-radius: 8px;
          width: 900px;
          box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        /* Top Bar: Back Link + Title */
        #top-bar {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 25px;
        }

        /* Back Link */
        #back-to-manage {
          text-decoration: none;
          color: #007bff;
          font-weight: bold;
          font-size: 16px;
        }

        #back-to-manage:hover {
          text-decoration: underline;
        }

        /* Heading */
        #edit-route-title {
          font-size: 24px;
          color: #333;
          margin: 0;
          padding-right:250px;
        }

        /* Form Group */
        #edit-route-form .form-group {
          margin-bottom: 18px;
        }

        #edit-route-form label {
          display: block;
          margin-bottom: 6px;
          font-weight: bold;
          color: #333;
        }

        #edit-route-form input,
        #edit-route-form select {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: 15px;
          box-sizing: border-box;
          transition: border-color 0.3s;
        }

        #edit-route-form input:focus,
        #edit-route-form select:focus {
          border-color: #007bff;
          outline: none;
        }

        /* Submit Button */
        #edit-submit-btn {
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

        #edit-submit-btn:hover {
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

       


    <div id="edit-route">
        <div id="edit-route-container">
            <!-- Top Bar with Back Link and Heading -->
            <div id="top-bar">
                <a href="manage_routes.php" id="back-to-manage">← Back to Manage Routes</a>
                <h1 id="edit-route-title">Edit Route</h1>
            </div>

            <!-- Edit Route Form -->
            <form action="edit_route.php?id=<?php echo $id; ?>" method="POST" id="edit-route-form">
                <div class="form-group">
                    <label for="route_id">Route ID:</label>
                    <input type="text" name="route_id" value="<?php echo $route['route_id']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="origin">Origin:</label>
                    <input type="text" name="origin" value="<?php echo $route['origin']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="destination">Destination:</label>
                    <input type="text" name="destination" value="<?php echo $route['destination']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="distance">Distance:</label>
                    <input type="text" name="distance" value="<?php echo $route['distance']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="duration">Duration:</label>
                    <input type="text" name="duration" value="<?php echo $route['duration']; ?>" required>
                </div>

                

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" required>
                        <option value="Active" <?php if ($route['status'] == 'Active') echo 'selected'; ?>>Active</option>
                        <option value="Inactive" <?php if ($route['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
                        <option value="Pending" <?php if ($route['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                    </select>
                </div>

                <button type="submit" id="edit-submit-btn">Update Route</button>
            </form>
        </div>
    </div>

</body>
</html>
