<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Before include<br>";
include 'db.php';
echo "After include<br>";

if (isset($conn)) {
    echo "Connection variable exists!<br>";
    echo "Connected successfully to database: house_booking<br>";
} else {
    echo "Connection variable NOT found!<br>";
}
