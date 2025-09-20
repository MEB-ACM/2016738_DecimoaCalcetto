<?php
$host = "localhost";   // or your DB host
$user = "root";        // your MySQL username
$pass = "biar";            // your MySQL password
$dbname = "signupdb";  // your database name

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
