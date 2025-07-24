<?php
include("../users/config.php");
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




/* Main Container */
#setting-section{
    width: 100%;
    padding-left:190px;
}
#user-settings-container {
    margin: 0 auto;
    padding: 30px;
    background-color: #f9f9f9;
    
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

/* Headings */
#user-settings-container h2 {
    text-align: center;
    font-size: 32px;
    color: #333;

}

#user-settings-container h3 {
    font-size: 20px;
    color: #444;
    
}

/* Form Group Style */
.form-group {
    padding:5px;
}

.form-group label {
    display: block;
    font-size: 16px;
    font-weight: 600;
    color: #555;
  
   
}

/* Input Fields */
#id, #fullname, #email, #address, #contact, #gender,
#current_password, #new_password, #confirm_password {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    color: #333;
}

input:focus {
    border-color: #007bff;
    outline: none;
}

/* Buttons (common style but no color override) */
button {
    width: 100%;
    padding: 10px;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

/* Keep original green for Update Profile */
#update-profile-btn {
    background-color: #28a745;  /* green */
    color: #fff;
}

#update-profile-btn:hover {
    background-color: #218838;
}

/* Keep original blue for Change Password */
#change-password-btn {
    background-color: #007bff;  /* blue */
    color: #fff;
}

#change-password-btn:hover {
    background-color: #0056b3;
}

/* Keep original red for Delete Account */
.delete {
    background-color: #dc3545;  /* red */
    color: #fff;
}

.delete:hover {
    background-color: #c82333;
}

/* Horizontal Line */
hr {
    border: 0;
    height: 1px;
    background-color: #ddd;
    margin: 15px 0;
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
        <a href="#"><i class="fas fa-cog"></i><span>Settings</span></a>
      </div>

      <div id="link-logout">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
      </div>
    </div>
  </div>
</div>

<div id="setting-section">
<div id="user-settings-container">
    <h2>Driver Settings</h2>
    
    <form action="update_profile.php" method="POST">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" required>
        </div>

        <div class="form-group">
            <label>Gender</label>
                <select name="gender">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
        </div>
        
        <button type="submit" name="update_profile" id="update-profile-btn">Update Profile</button>
    </form>

    <hr>

    <!-- Change Password Form -->
    <form action="change_password.php" method="POST">
        <h3>Change Password</h3>
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" id="current_password" name="current_password" required>
        </div>
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        
        <button type="submit" name="change_password" id="change-password-btn">Change Password</button>
    </form>
<br>
    <hr>

    <!-- Delete Account Form -->
    <form action="delete_account.php" method="POST" onsubmit="return confirm('Are you sure to delete your account permanently?');">
        <button type="submit" name="delete_account" class="delete">Delete Account Permanently</button>
    </form>
</div>
</div>

</b0dy>
</html>


  