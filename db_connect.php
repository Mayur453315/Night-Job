<!-- db_connect.php -->
<?php
$host = "localhost";
$username = "root";
$password = "Mayur45&$"; 
$dbname = "MY_PHP_PROJECT"; // Database name

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
