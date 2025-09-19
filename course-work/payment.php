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
<head>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="book.css">
</head>
<body>
<div class="container" style="display: flex; flex-direction: column; gap: 1.2rem; align-items: center; justify-content: center;">
    <h2 style="font-weight: 600; font-size: 1.8rem">Payment Instructions</h2>
    <p style="font-size: 1.2rem;">Send payment to Mobile Money Number: <strong style="text-decoration: underline; cursor: pointer;">+1234567890</strong></p>
    <form method="POST" action="payment.php?booking_id=<?php echo $booking_id; ?>">
        <button class="submit-btn" type="submit">I Have Paid</button>
    </form>
</div>
</body>
</html>
