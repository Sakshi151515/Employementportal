<?php
$conn = new mysqli("localhost", "root", "", "midc_employment");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
?>