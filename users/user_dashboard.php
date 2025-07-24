<?php
include("config.php"); // Database connection

$totalBookings = $conn->query("SELECT COUNT(*) AS total FROM seat_bookings")->fetch_assoc()['total'];
$totalUsers = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$totalRoutes = $conn->query("SELECT COUNT(*) AS total FROM routes")->fetch_assoc()['total'];
$totalBuses = $conn->query("SELECT COUNT(*) AS total FROM manage_buses")->fetch_assoc()['total'];
$totalSchedules = $conn->query("SELECT COUNT(*) AS total FROM bus_schedules")->fetch_assoc()['total'];
// $totalIncome = $conn->query("SELECT SUM(amount) AS total FROM bookings")->fetch_assoc()['total'];
// $pendingBookings = $conn->query("SELECT COUNT(*) AS total FROM bookings WHERE status='Pending'")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusExpress - User Dashboard</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-bus" style=" font-size: 30px; color: var(--primary-color);"></i>
            <h3>Bus-Reservation</h3>
        </div>
        
        <div class="sidebar-menu">
            <a href="#" class="menu-item active">
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

            <a href="search_bus.php" class="menu-item">
                <i class="fas fa-ticket-alt"></i>
                <span>Book Ticket</span>
            </a>

            <a href="my_bookings.php" class="menu-item">
                <i class="fas fa-history"></i>
                <span>My Booking</span>
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

    

</body>
</html>