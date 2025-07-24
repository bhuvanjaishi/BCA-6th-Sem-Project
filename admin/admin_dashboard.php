<?php
include("../users/config.php"); // Database connection

$totalBookings = $conn->query("SELECT COUNT(*) AS total FROM seat_bookings")->fetch_assoc()['total'];
$totalUsers = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$totalRoutes = $conn->query("SELECT COUNT(*) AS total FROM routes")->fetch_assoc()['total'];
$totalBuses = $conn->query("SELECT COUNT(*) AS total FROM manage_buses")->fetch_assoc()['total'];
$totalSchedules = $conn->query("SELECT COUNT(*) AS total FROM bus_schedules")->fetch_assoc()['total'];
// $totalIncome = $conn->query("SELECT SUM(amount) AS total FROM bookings")->fetch_assoc()['total'];
$pendingBookings = $conn->query("SELECT COUNT(*) AS total FROM seat_bookings WHERE status='Pending'")->fetch_assoc()['total'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusGo - Admin Dashboard</title>
    <!-- Correct and updated Font Awesome CDN link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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




        

    /* General Reset */
    #admin-section{
      padding-left:200px;
      text-align:center;
    }
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
  
}

/* Dashboard Cards Container */
#dashboard-cards {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  padding: 40px;
  background-color: #f9f9f9;
  padding-left:230px;
}

/* Individual Card Styles */
#dashboard-cards > div {
  flex: 1 1 220px;
  background: #fff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  transition: transform 0.3s;
}

#dashboard-cards > div:hover {
  transform: translateY(-5px);
}

[id^="card-header"] {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

[id^="card-header"] h3 {
  font-size: 22px;
  color: #333;
}

[id^="card-header"] p {
  font-size: 17px;
  color: black;
}

/* Icon Colors */
#card-icon1.blue,
#card-icon2.green,
#card-icon3.orange,
#card-icon4.red {
  font-size: 26px;
  padding: 15px;
  border-radius: 50%;
  color: white;
}

#card-icon1.blue { background: #3498db; }
#card-icon2.green { background: #2ecc71; }
#card-icon3.orange { background: #f39c12; }
#card-icon4.red { background: #e74c3c; }

/* Stats Overview Section */
#stats-overview {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  padding: 30px;
  background-color: #fff;
  border-top: 2px solid #eee;
}

#stats-overview > div {
  flex: 1 1 220px;
  padding: 20px;
  background: #f1f1f1;
  border-radius: 10px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  text-align: center;
}

#stats-overview h3 {
  font-size: 18px;
  margin-bottom: 10px;
  color: #2c3e50;
}

#stats-overview p {
  font-size: 20px;
  font-weight: bold;
  color: #27ae60;
}

/* Responsive Design */
@media (max-width: 768px) {
  #dashboard-cards, #stats-overview {
    flex-direction: column;
    padding: 20px;
  }
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
                    <a href="#">
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
                        <i class="fas fa-calendar-alt "></i>
                        <span> Manage Schedules</span>
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


      
      
    <div id="dashboard-cards">
  
       
    <!-- Card 1 -->
    <div id="card1">
    
        <div id="card-header1">
       
            <div>
                <h3><?php echo $totalBookings; ?></h3>
                <p>Total Bookings</p>
            </div> 
            <div id="card-icon1" class="blue">
                <i class="fas fa-ticket-alt"></i>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div id="card2">
        <div id="card-header2">
            <div>
                <h3><?php echo $totalRoutes; ?></h3>
                <p>Active Routes</p>
            </div>
            <div id="card-icon2" class="green">
                <i class="fas fa-route"></i>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
    <div id="card3">
        <div id="card-header3">
            <div>
                <h3><?php echo $totalBuses; ?></h3>
                <p>Active Buses</p>
            </div>
            <div id="card-icon3" class="orange">
                <i class="fas fa-bus"></i>
            </div>
        </div>
    </div>

    <!-- Card 4 -->
    <div id="card4">
        <div id="card-header4">
            <div>
                <h3><?php echo $totalSchedules; ?></h3>
                <p>Active Schedules</p>
            </div>
            <div id="card-icon3" class="orange">
                <i class="fas fa-calendar-alt"></i>
            </div>
        </div>
    </div>

    <!-- Card 5 -->
    <div id="card5">
        <div id="card-header5">
            <div>
                <h3>Rs. </h3>
                <p>Total Revenue</p>
            </div>
            <div id="card-icon4" class="red">
                <i class="fas fa-rupee-sign"></i>
            </div>
        </div>
    </div>

    <!-- Card 6 -->
    <div id="card6">
        <div id="card-header6">
            <div>
                <h3><?php echo $totalUsers; ?></h3>
                <p>Registered Users</p>
            </div>
            <div id="card-icon5" class="blue">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <!-- Card 7 -->
    <div id="card7">
        <div id="card-header7">
            <div>
                <h3></h3>
                <p>Pending Bookings</p>
            </div>
            <div id="card-icon6" class="green">
                <i class="fas fa-clock"></i>
            </div>
        </div>
    </div>

    <!-- Card 8 -->
    <div id="card8">
        <div id="card-header8">
            <div>
                <h3>Rs.</h3>
                <p>Today's Revenue</p>
            </div>
            <div id="card-icon7" class="red">
                <i class="fas fa-chart-line"></i>
            </div>
        </div>
    </div>
</div>


</body>
</html>