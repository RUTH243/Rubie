<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Available Houses</title>
<!--    <link rel="stylesheet" href="globals.css">-->
    <link rel="stylesheet" href="houses.css">
</head>
<body>
<div class="container">
    <h2>Available Houses</h2>

    <div class="grid-container">
        <?php
        if($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query("SELECT * FROM houses");

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='house-item'>";

                // Display image - fix the column name issue
                if (!empty($row['image'])) {
                    echo "<img src='images/{$row['image']}' class='house-image' alt='{$row['name']}'>";
                } else {
                    // Fallback to your specific image if no image column
                    echo "<img src='images/IMG_7912.JPG' class='house-image' alt='{$row['name']}'>";
                }

                echo "<div class='house-info'>";
                echo "<div class='house-name'>" . htmlspecialchars($row['name']) . "</div>";

                // Display price if you have a price column
                if (isset($row['price'])) {
                    echo "<div class='house-price'>$" . number_format($row['price']) . "</div>";
                } else {
                    echo "<div class='house-price'>Contact for Price</div>";
                }

                echo "<div class='house-status'>Status: " . htmlspecialchars($row['status']) . "</div>";

                if ($row['status'] === 'available') {
                    echo "<a class='book-button' href='book.php?house_id={$row['id']}'>Book Now</a>";
                } else {
                    echo "<span class='book-button unavailable'>Unavailable</span>";
                }

                echo "</div>"; // Close house-info
                echo "</div>"; // Close house-item
            }
        } else {
            echo "<div class='no-houses'>No houses found in the database.</div>";
        }

        $conn->close();
        ?>
    </div>
</div>
</body>
</html>