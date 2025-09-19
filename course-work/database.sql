CREATE DATABASE house_booking;

USE house_booking;

CREATE TABLE houses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    status ENUM('available', 'unavailable') DEFAULT 'available',
    image VARCHAR(255)
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    house_id INT,
    name VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(100),
    payment_status ENUM('pending', 'paid') DEFAULT 'pending',
    FOREIGN KEY (house_id) REFERENCES houses(id)
);
