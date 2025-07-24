<?php
session_start();
include("config.php");

// Validate bus_id
if (!isset($_POST['bus_id']) || empty($_POST['bus_id'])) {
    die("Bus not selected.");
}

$bus_id = intval($_POST['bus_id']);
$query = "SELECT * FROM bus_schedules WHERE id = '$bus_id'";
$result = $conn->query($query);

if (!$result || $result->num_rows === 0) {
    die("Bus not found.");
}

$bus = $result->fetch_assoc();
$user_id = $_SESSION['user_id'] ?? 1;

$seat_price = floatval($bus['price']);
$bus_type = strtolower(trim($bus['bus_type']));

// Define seat layout based on bus type
if ($bus_type === 'ac') {
    $sideA_seats = ['SA1','SA2','SA3','SA4','SA5','SA6','SA7','SA8','SA9','SA10','SA11','SA12','SA13','SA14','SA15','SA16'];
    $lastA = ['SA17','SA18','S19'];
    $sideB_seats = ['SB1','SB2','SB3','SB4','SB5','SB6','SB7','SB8','SB9','SB10','SB11','SB12','SB13','SB14','SB15','SB16'];
    $lastB = ['SB17','SB18'];
} elseif ($bus_type === 'deluxe') {
    $sideA_seats = ['SA1','SA2','SA3','SA4','SA5','SA6','SA7','SA8','SA9','SA10','SA11','SA12','SA13','SA14'];
    $lastA = ['SA15','SA16','S17'];
    $sideB_seats = ['SB1','SB2','SB3','SB4','SB5','SB6','SB7','SB8','SB9','SB10','SB11','SB12','SB13','SB14'];
    $lastB = ['SB15','SB16'];
} else {
    $sideA_seats = ['SA1','SA2','SA3','SA4','SA5','SA6','SA7','SA8','SA9','SA10','SA11','SA12'];
    $lastA = ['SA13','SA14','S15'];
    $sideB_seats = ['SB1','SB2','SB3','SB4','SB5','SB6','SB7','SB8','SB9','SB10','SB11','SB12'];
    $lastB = ['SB13','SB14'];
}

$cabin_seats = ['Cabin1', 'Cabin2', 'Cabin3', 'Cabin4'];

// Fetch already booked seats
$booked_seats = [];
$res = $conn->query("SELECT selected_seats FROM seat_bookings WHERE bus_id = '$bus_id'");
while ($row = $res->fetch_assoc()) {
    $seats = explode(",", $row['selected_seats']);
    $booked_seats = array_merge($booked_seats, array_map('trim', $seats));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bus Seat Selection - <?= htmlspecialchars($bus['bus_no']) ?></title>
    <style>
        body { font-family: Arial; background: #f9f9f9; padding: 20px; text-align: center; }
        .seat { width: 60px; height: 60px; margin: 5px; border-radius: 8px; background: #eee; line-height: 60px; font-weight: bold; border: 2px solid #444; cursor: pointer; display: inline-block; }
        .seat.booked { background: #d9534f; border-color: #a94442; color: #fff; cursor: not-allowed; }
        .seat.selected { background: #5cb85c; border-color: #4cae4c; color: #fff; }
        .seat input[type="checkbox"] { display: none; }
        .cabin-row, .last-row { display: flex; justify-content: center; gap: 10px; margin: 15px 0; }
        .side-container { display: flex; justify-content: center; gap: 80px; }
        .column { display: grid; grid-template-columns: repeat(2, 60px); gap: 10px 20px; }
        .legend { display: flex; justify-content: center; gap: 40px; margin: 20px 0; font-weight: bold; }
        .legend-color { width: 22px; height: 22px; border-radius: 5px; }
        .legend-available { background: #eee; border: 2px solid #444; }
        .legend-booked { background: #d9534f; }
        .legend-selected { background: #5cb85c; }
        .summary { margin: 15px 0; font-weight: bold; font-size: 18px; }
    </style>
</head>
<body>

<h2>Bus No: <?= htmlspecialchars($bus['bus_no']) ?> (<?= ucfirst($bus_type) ?>)</h2>
<div class="price-info">Price per seat: NPR <?= number_format($seat_price, 2) ?></div>
<div class="summary">
    Route: <?= htmlspecialchars($bus['route']) ?> |
    Departure: <?= htmlspecialchars($bus['departure_time']) ?> |
    Arrival: <?= htmlspecialchars($bus['arrival_time']) ?> <br>
    Driver: <?= htmlspecialchars($bus['driver_name']) ?> |
    Contact: <?= htmlspecialchars($bus['contact']) ?>
</div>
<div id="selectedSeats">Selected Seats: None</div>
<div id="totalPrice">Total Price: NPR 0.00</div>

<div class="legend">
    <div><div class="legend-color legend-available"></div> Available</div>
    <div><div class="legend-color legend-booked"></div> Booked</div>
    <div><div class="legend-color legend-selected"></div> Selected</div>
</div>

<form action="process_payment.php" method="POST" onsubmit="return prepareForm();">
    <input type="hidden" name="bus_id" value="<?= $bus_id ?>">
    <input type="hidden" name="user_id" value="<?= $user_id ?>">
    <input type="hidden" name="seat_price" value="<?= $seat_price ?>">
    <input type="hidden" name="seats" id="seats">

    <div class="cabin-row">
        <?php foreach ($cabin_seats as $seat): ?>
            <label class="seat <?= in_array($seat, $booked_seats) ? 'booked' : '' ?>">
                <input type="checkbox" value="<?= $seat ?>" <?= in_array($seat, $booked_seats) ? 'disabled' : '' ?> onchange="updateSelection()">
                <?= $seat ?>
            </label>
        <?php endforeach; ?>
    </div>

    <div class="side-container">
        <div><h3>Side A</h3><div class="column">
            <?php foreach ($sideA_seats as $seat): ?>
                <label class="seat <?= in_array($seat, $booked_seats) ? 'booked' : '' ?>">
                    <input type="checkbox" value="<?= $seat ?>" <?= in_array($seat, $booked_seats) ? 'disabled' : '' ?> onchange="updateSelection()">
                    <?= $seat ?>
                </label>
            <?php endforeach; ?>
        </div></div>

        <div><h3>Side B</h3><div class="column">
            <?php foreach ($sideB_seats as $seat): ?>
                <label class="seat <?= in_array($seat, $booked_seats) ? 'booked' : '' ?>">
                    <input type="checkbox" value="<?= $seat ?>" <?= in_array($seat, $booked_seats) ? 'disabled' : '' ?> onchange="updateSelection()">
                    <?= $seat ?>
                </label>
            <?php endforeach; ?>
        </div></div>
    </div>

    <div class="last-row">
        <?php foreach (array_merge($lastA, $lastB) as $seat): ?>
            <label class="seat <?= in_array($seat, $booked_seats) ? 'booked' : '' ?>">
                <input type="checkbox" value="<?= $seat ?>" <?= in_array($seat, $booked_seats) ? 'disabled' : '' ?> onchange="updateSelection()">
                <?= $seat ?>
            </label>
        <?php endforeach; ?>
    </div>

    <button type="submit">Proceed to eSewa Payment</button>
</form>

<script>
const seatPrice = <?= json_encode($seat_price) ?>;

function updateSelection() {
    const selected = document.querySelectorAll('input[type="checkbox"]:checked');
    const selectedSeats = Array.from(selected).map(cb => cb.value);
    document.getElementById('selectedSeats').textContent = selectedSeats.length
        ? "Selected Seats: " + selectedSeats.join(", ")
        : "Selected Seats: None";
    document.getElementById('totalPrice').textContent = "Total Price: NPR " + (selectedSeats.length * seatPrice).toFixed(2);
    document.querySelectorAll('.seat').forEach(seat => seat.classList.remove('selected'));
    selectedSeats.forEach(val => {
        const input = document.querySelector(`input[value="${val}"]`);
        if (input) input.parentElement.classList.add('selected');
    });
}

function prepareForm() {
    const selected = document.querySelectorAll('input[type="checkbox"]:checked');
    if (selected.length === 0) {
        alert("Please select at least one seat.");
        return false;
    }
    const seats = Array.from(selected).map(cb => cb.value);
    document.getElementById('seats').value = seats.join(",");
    return true;
}

window.onload = updateSelection;
</script>
</body>
</html>
