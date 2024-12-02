<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'job_portal';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
