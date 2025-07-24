<?php
include("../users/config.php");
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <a href="#"><i class="fas fa-calendar-alt"></i><span>My Trips</span></a>
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



</body>
</html>