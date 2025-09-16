<?php include 'db.php'; ?>
<?php
$booking_id = $_GET['booking_id'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn->query("UPDATE bookings SET payment_status='paid' WHERE id=$booking_id");
    header("Location: confirm.php?booking_id=$booking_id");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
    <h2>Payment Instructions</h2>
    <p>Send payment to Mobile Money Number: <strong>+1234567890</strong></p>
    <form method="POST">
        <button class="button" type="submit">I Have Paid</button>
    </form>
</div>
</body>
</html>
