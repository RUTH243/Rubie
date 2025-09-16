<?php include 'db.php'; ?>
<?php
$booking_id = $_GET['booking_id'] ?? 0;

$result = $conn->query("SELECT * FROM bookings WHERE id=$booking_id");
$booking = $result->fetch_assoc();

// Simulate sending SMS
$phone = $booking['phone'];
$message = "Hi {$booking['name']}, your booking for house ID {$booking['house_id']} is confirmed!";

echo "<script>alert('SMS Sent to $phone: $message');</script>";
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
    <h2>Booking Confirmed!</h2>
    <p>A confirmation SMS was sent to: <strong><?= htmlspecialchars($phone) ?></strong></p>
    <a class="button" href="index.php">Back to Home</a>
</div>
</body>
</html>
