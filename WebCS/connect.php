<?php

// Connection to MySQL parameters
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "car_rental_system";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("connectiion failed: " . $conn -> connect_error);
};
?>