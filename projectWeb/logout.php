<?php
include 'connect.php';
session_start();
session_unset();
session_destroy();
$previous_page = $_SERVER['HTTP_REFERER'];
header("Location: $previous_page");
?>