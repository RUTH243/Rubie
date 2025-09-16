<?php include 'db.php'; ?>
<?php
$house_id = $_GET['house_id'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $house_id = $_POST['house_id'];

    $stmt = $conn->prepare("INSERT INTO bookings (house_id, name, phone, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $house_id, $name, $phone, $email);
    $stmt->execute();

    header("Location: payment.php?booking_id=" . $stmt->insert_id);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
    <form method="POST">
        <div class="login_box">
            <div class="login_header">
    <h2>Booking Form</h2>
    <p> fill the form below</p>
</div>
        <input type="hidden" name="house_id" value="<?= htmlspecialchars($house_id) ?>">
        <input type="text" name="name" placeholder="Your Name" required><br><br>
        <input type="text" name="phone" placeholder="Phone Number" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <button class="button" type="submit">Continue to Payment</button>
     </div>
    </form>
</div>
</body>
</html>
