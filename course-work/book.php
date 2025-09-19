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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="book.css">
</head>
<body>
<div class="form-container">
    <h2 class="form-title">Booking</h2>

    <form method="post" id="contactForm">
        <input type="hidden" name="house_id" value="<?php echo $house_id; ?>">

        <div class="form-group">
            <label for="name" class="form-label">Your name</label>
            <input type="text" id="name" name="name" class="form-input">
        </div>

        <div class="form-group">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" id="phone" name="phone" class="form-input">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email" class="form-input" required>
        </div>

        <button type="submit" class="submit-btn">Book now</button>
    </form>
</div>
</body>
</html>

