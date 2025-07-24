<?php
include("../users/config.php");

// Delete logic
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM bus_schedules WHERE id = $id");
  header("Location: manage_schedules.php");
  exit;
}
  ?>