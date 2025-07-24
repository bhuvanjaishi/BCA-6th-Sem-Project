<?php
include("../users/config.php");

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM pages WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?= $row['title'] ?></h2>
<p><strong>Slug:</strong> <?= $row['slug'] ?></p>
<div>
    <?= $row['content'] ?>
</div>
<a href="index.php">← Back</a>
</body>
</html>

