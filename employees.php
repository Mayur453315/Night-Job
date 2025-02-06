<?php
$servername = "localhost";
$username = "root"; 
$password = "Swasha@1605"; 
$dbname = "MY_PHP_PROJECT"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from profile table
$profile_sql = "SELECT id, first_name, last_name, email, dob, education_level, gender, city, country FROM profile"; // Adjust the column names as necessary
$profile_result = $conn->query($profile_sql);

// Display profiles
if ($profile_result->num_rows > 0) {
    echo "<h2>Employees:</h2>";
    echo "<table border='1'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>DOB</th><th>Education Level</th><th>Gender</th><th>City</th><th>Country</th></tr>";
    while ($row = $profile_result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["education_level"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["city"] . "</td><td>" . $row["country"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No profiles found.";
}

$conn->close();
?>
