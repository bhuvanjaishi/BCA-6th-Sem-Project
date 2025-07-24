<?php
include("../users/config.php");

$id = $_GET['id'];
$sql = "DELETE FROM reports WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Report deleted successfully!'); window.location.href='manage_reports.php';</script>";
} else {
    echo "Error deleting report: " . $conn->error;
}
?>
