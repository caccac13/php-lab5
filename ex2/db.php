<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_lab5_ex2";

// Create connection to MySQL server
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    discount INT NOT NULL,
    image VARCHAR(255) NOT NULL,
    rating INT NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    die("Error creating table: " . $conn->error);
}

// Delete old data if table exists
$sql = "DELETE FROM products";
if ($conn->query($sql) === FALSE) {
    die("Error while deleting old data: " . $conn->error);
}

// Insert sample data into products
$sql = "INSERT INTO products (name, price, discount, image, rating) 
VALUES
('iPhone 14 Pro Max 128GB', 29490000, 15, 'iphone_14_pro_max_128gb.jpg', 5),
('OPPO Reno8', 7850000, 12, 'oppo_reno8.jpg', 4),
('iPhone 11 64GB', 11190000, 25, 'iphone_11_64gb.jpg', 4),
('iPhone 13 128GB', 17990000, 20, 'iphone_13_128gb.jpg', 5),
('iPhone 13 Pro Max 128GB', 27190000, 22, 'iphone_13_pro_max_128gb.jpg', 5),
('iPhone 14 Pro Max 256GB', 31490000, 17, 'iphone_14_pro_max_256gb.jpg', 5),
('iPhone 14 128GB', 19990000, 20, 'iphone_14_128gb.jpg', 4),
('Samsung Galaxy S22 Ultra', 34900000, 25, 'samsung_galaxy_s22_ultra.jpg', 5),
('Samsung Galaxy Z Fold4', 34920000, 18, 'samsung_galaxy_z_fold4.jpg', 5),
('iPhone 11 128GB', 12790000, 25, 'iphone_11_128gb.jpg', 4)";
if ($conn->query($sql) === FALSE) {
    die("Lỗi khi thêm dữ liệu: " . $conn->error);
}

?>
