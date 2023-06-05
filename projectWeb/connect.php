<?php

// Connection to MySQL parameters
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);
// Check connection
if (!$conn) {
    die("connectiion failed: " . $conn -> connect_error);
} else
    // echo "<center>Successul conencted </center>";
?>