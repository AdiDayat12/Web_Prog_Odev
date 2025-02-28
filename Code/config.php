<?php
$servername = "localhost";
$username = "root";
$password = "my1stmysql";
$dbname = "dental_care";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
