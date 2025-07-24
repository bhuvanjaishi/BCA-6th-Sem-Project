<?php
include("../users/config.php"); // Database connection


// Check if ID is set
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Bus ID is required.");
}

$id = intval($_GET['id']);

// Fetch bus data
$result = mysqli_query($conn, "SELECT * FROM manage_buses WHERE id = $id");

if (!$result || mysqli_num_rows($result) == 0) {
    die("Bus not found.");
}

$bus = mysqli_fetch_assoc($result);

// Handle update form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bus_id = $_POST['bus_id'];
    $bus_name = $_POST['bus_name'];
    $destination = $_POST['destination'];
    $ac_price = $_POST['ac_price'];
    $deluxe_price = $_POST['deluxe_price'];
    $non_ac_price = $_POST['non_ac_price'];

    $update = mysqli_query($conn, "UPDATE manage_buses SET 
        bus_id = '$bus_id',
        bus_name = '$bus_name',
        destination = '$destination',
        ac_price = '$ac_price',
        deluxe_price = '$deluxe_price',
        non_ac_price = '$non_ac_price'
        WHERE id = $id");

    if ($update) {
        echo "<script>alert('Bus updated successfully.'); window.location.href='manage_bus.php';</script>";
    } else {
        echo "<script>alert('Update failed.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusGo - Edit Bus</title>
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



        /* Main container */
#edit-bus {
    background-color: #f4f4f4;
   
    font-family: Arial, sans-serif;
   width:100%;
   padding-left:200px;
    
}

/* Center box */
#edit-bus-container {
   
    margin: auto;
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

/* Top bar */
#top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    
}

#top-bar h3{
    padding-right:300px;
}

#back-to-manage {
    text-decoration: none;
    color: #007bff;
    font-size: 17px;
}

#back-to-manage:hover {
    text-decoration: underline;
}

#edit-bus-title {
    font-size: 30px;
    color: #333;
    padding-right:300px;
}

/* Form styling */
form label {
    display: block;
    margin-top: 15px;
    font-weight: bold;
    color: #333;
}

form input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 14px;
    box-sizing: border-box;
}

.btn {
    margin-top: 25px;
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s ease;
}

.btn:hover {
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

     <div id="edit-bus">
        <div id="edit-bus-container">
            <!-- Top Bar with Back Link and Heading -->
            <div id="top-bar">
                <a href="manage_bus.php" id="back-to-manage">← Back to Manage Buses</a>
                <h1 id="edit-bus-title">   <i class="fas fa-bus"></i> Edit Bus</h1>
            </div>

    <form method="POST">
        <label>Bus ID</label>
        <input type="text" name="bus_id" value="<?php echo $bus['bus_id']; ?>" required>

        <label>Bus Name</label>
        <input type="text" name="bus_name" value="<?php echo $bus['bus_name']; ?>" required>

        <label>Destination</label>
        <input type="text" name="destination" value="<?php echo $bus['destination']; ?>" required>

        <label>AC Price</label>
        <input type="number" name="ac_price" value="<?php echo $bus['ac_price']; ?>" required>

        <label>Deluxe Price</label>
        <input type="number" name="deluxe_price" value="<?php echo $bus['deluxe_price']; ?>" required>

        <label>Non-AC Price</label>
        <input type="number" name="non_ac_price" value="<?php echo $bus['non_ac_price']; ?>" required>

        <button type="submit" class="btn">Update Bus</button>
       
    </form>
</div>

</div>


</body>
</html>