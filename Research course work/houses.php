<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Available Houses</h2>
    <img src="images/IMG_7912.JPG" alt="HOUSE">
    <?php
    $result = $conn->query("SELECT * FROM houses");
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<img src='images/{$row['IMG_7912.JPG']}' width='200'><br>";
        echo "<strong>{$row['name']}</strong><br>";
        echo "Status: " . $row['status'] . "<br>";
        if ($row['status'] === 'available') {
            echo "<a class='button' href='book.php?house_id={$row['id']}'>Book</a>";
        }
        echo "</div><hr>";
    }
    ?>
</div>
</body>
</html>
