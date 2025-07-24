<?php
include("../users/config.php");


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
  <title>Driver Dashboard</title>
  <link rel="stylesheet" href="driver-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
  /* Reset and base styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, sans-serif;
}

body {
  background-color: #f4f4f4;
}

/* Dashboard Wrapper */
#driver-dashboard {
  display: flex;
}

/* Sidebar Styles */
#driver-sidebar {
  width: 190px;
  background-color: #2c3e50;
  min-height: 100vh;
  color: #fff;
  position: fixed;
  
}

/* Logo Section */
#driver-logo {
  display: flex;
  align-items: center;
  flex-direction: column;
  padding: 10px 0;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

#driver-logo i {
  font-size: 40px;
  margin-bottom: 10px;
}

#driver-logo h2 {
  font-size: 20px;
  font-weight: 600;
}

/* Menu Links */
#driver-menu {
  margin-top: 20px;
}

#driver-menu div {
  padding: 10px 20px;
}

#driver-menu a {
  text-decoration: none;
  color: #ecf0f1;
  display: flex;
  align-items: center;
  transition: background 0.3s;
}

#driver-menu a:hover {
  background-color: #34495e;
  border-radius: 4px;
}

#driver-menu i {
  margin-right: 10px;
  font-size: 18px;
}

#driver-menu span {
  font-size: 16px;
}




/* Heading Style */
#routes {
  padding-left: 196px;
  padding-right: -50px;
}

h1 {
  color: #2c3e50;
  margin-bottom: 10px;
  padding-left: 250px;
  
}

/* Scrollable table container */
.table-wrapper {
  max-height: 400px; /* Adjust height as needed */
  overflow-y: auto;
  border: 1px solid #ccc;
}

/* Table Style */
table {
  width: 100%;
  border-collapse: collapse;
  background-color: #fff;
}

th, td {
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  min-width: 120px; /* to keep column width consistent */
}

/* Sticky Header */
thead th {
  position: sticky;
  top: 0;
  background-color: #2c3e50;
  color: #fff;
  z-index: 1;
}

/* Row hover effect */
tbody tr:hover {
  background-color: #f1f1f1;
}

/* Message Paragraph Style */
p {
  font-size: 16px;
  color: #555;
  margin-left: 64px;
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
<div id="driver-dashboard">
  <!-- Sidebar -->
  <div id="driver-sidebar">
    <div id="driver-logo">
      <i class="fas fa-user"></i>
      <h2>Driver Panel</h2>
    </div>

    <div id="driver-menu">
      <div id="link-dashboard">
        <a href="driver-dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
      </div>

      <div id="link-assigned-route">
        <a href="assigned-route.php"><i class="fas fa-route"></i><span>Assigned Route</span></a>
      </div>


      <div id="link-my-trips">
        <a href="my_trips.php"><i class="fas fa-calendar-alt"></i><span>My Trips</span></a>
      </div>

     

      <div id="link-settings">
        <a href="setting.php"><i class="fas fa-cog"></i><span>Settings</span></a>
      </div>

      <div id="link-logout">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
      </div>
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
