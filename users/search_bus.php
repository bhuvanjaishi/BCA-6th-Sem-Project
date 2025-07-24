<?php
include("config.php");

$route = $bus_type = "";
$results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $route = $_POST['route'];
    $bus_type = $_POST['bus_type'];

    $sql = "SELECT * FROM bus_schedules WHERE 1";
    if (!empty($route)) {
        $sql .= " AND route = '$route'";
    }
    if (!empty($bus_type)) {
        $sql .= " AND bus_type = '$bus_type'";
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bus Search</title>
    <style>
        
        >
    body {
        font-family: Arial, sans-serif;
        background-color:rgb(248, 249, 244);
        padding: 30px;
    }

    h2 {
        text-align: center;
        color: #333;
       
    }

    form {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 30px;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    label {
        font-weight: bold;
        margin-right: 5px;
    }

    select {
        padding: 8px 12px;
        border-radius: 5px;
        border: 1px solid #ccc;
        min-width: 200px;
    }

    button[type="submit"] {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    th, td {
        border: 1px solid #ccc;
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #007BFF;
        color: white;
    }

    td form {
        margin: 0;
    }

    td button {
        background-color: #28a745;
        padding: 6px 12px;
        font-size: 14px;
        border-radius: 4px;
        border: none;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    td button:hover {
        background-color: #218838;
    }

    p {
        text-align: center;
        color: red;
        font-weight: bold;
        margin-top: 20px;
    }

    #back-link {
    display: inline-block;
    margin-bottom: 20px;
    background-color: #007BFF;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
}

#back-link:hover {
    background-color: #0056b3;
}

.select-btn a {
    display: inline-block;
    background-color: #007BFF;
    color: white;
    padding: 12px 25px;
    text-decoration: none;
    border-radius: 6px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.select-btn a:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>


<h2>Search Buses</h2> 

<form method="POST" action="">
    <label>Route:</label>
    <select name="route">
        <option value="">--Select All Types --</option>
        <option value="Kathmandu - Nepaljung" <?= ($route == 'Kathmandu - Nepaljung') ? 'selected' : '' ?>>Kathmandu - Nepaljung</option>
        <option value="Kathmandu - Kohalpur" <?= ($route == 'Kathmandu - Kohalpur') ? 'selected' : '' ?>>Kathmandu - Kohalpur</option>
        <option value="Kathmandu - Dhangadi" <?= ($route == 'Kathmandu - Dhangadi') ? 'selected' : '' ?>>Kathmandu - Dhangadi</option>
        <option value="Kathmandu - Aatriya" <?= ($route == 'Kathmandu - Aatriya') ? 'selected' : '' ?>>Kathmandu - Aatriya</option>
        <option value="Kathmandu - Dadheldhura" <?= ($route == 'Kathmandu - Dadheldhura') ? 'selected' : '' ?>>Kathmandu - Dadheldhura</option>
        <option value="Kathmandu - Doti" <?= ($route == 'Kathmandu - Doti') ? 'selected' : '' ?>>Kathmandu - Doti</option>
        <option value="Kathmandu - Baitadi" <?= ($route == 'Kathmandu - Bzitadi') ? 'selected' : '' ?>>Kathmandu - Baitadi</option>
        <option value="Kathmandu - Bajhang" <?= ($route == 'Kathmandu - Bajhang') ? 'selected' : '' ?>>Kathmandu - Bajhang</option>
        <option value="Kathmandu - Achham" <?= ($route == 'Kathmandu - Achham') ? 'selected' : '' ?>>Kathmandu - Achham</option>
        <option value="Kathmandu - Bajura" <?= ($route == 'Kathmandu - Bajura') ? 'selected' : '' ?>>Kathmandu - Bajura</option>
        <option value="Kathmandu - Kalikot" <?= ($route == 'Kathmandu - Kalikot') ? 'selected' : '' ?>>Kathmandu - Kalikot</option>
        <option value="Kathmandu - Surkhet" <?= ($route == 'Kathmandu - Surkhet') ? 'selected' : '' ?>>Kathmandu - Surkhet</option>
         
       
    </select>

    <label>Bus Type:</label>
    <select name="bus_type">
        <option value="">-- All Types--</option>
        <option value="AC" <?= ($bus_type == 'AC') ? 'selected' : '' ?>>AC</option>
        <option value="Deluxe" <?= ($bus_type == 'Deluxe') ? 'selected' : '' ?>>Deluxe</option>
        <option value="Non-AC" <?= ($bus_type == 'Non-AC') ? 'selected' : '' ?>>Non-AC</option>
      
    </select>

    <button type="submit">Search</button>
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <?php if (count($results) > 0): ?>
        <table>
            <tr>
                <th>Bus No</th>
                <th>Route</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Status</th>
                <th>Bus Type</th>
                <!-- <th>Price</th> -->
                <th>Price</th>
                <th>Driver Contact</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($results as $bus): ?>
                <tr>
                    <td><?= $bus['bus_no'] ?></td>
                    <td><?= $bus['route'] ?></td>
                    <td><?= $bus['departure_time'] ?></td>
                    <td><?= $bus['arrival_time'] ?></td>
                    <td><?= $bus['status'] ?></td>
                    <td><?= $bus['bus_type'] ?></td>
                    <td><?= $bus['price'] ?></td>
                  
                    <td><?= $bus['contact'] ?></td>
                  
    <td>            
<form action="seats_selection.php" method="POST">
    <input type="hidden" name="bus_id" value="<?= $bus['id'] ?>">
    <input type="hidden" name="bus_type" value="<?= $bus['bus_type'] ?>">
    <button type="submit">Book Now</button>
</form>
</td>

                    
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No buses found for your search.</p>
    <?php endif; ?>
<?php endif; ?>



</body>
</html>
