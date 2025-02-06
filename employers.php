<?php
$servername = "localhost";
$username = "root";
$password = "Swasha@1605";
$dbname = "MY_PHP_PROJECT"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from employers table
$employers_sql = "SELECT id, company_name, email FROM employers"; 
$employers_result = $conn->query($employers_sql);

// Display employers
if ($employers_result->num_rows > 0) {
    echo "<h2>Employers:</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Company Name</th><th>Email</th></tr>";
    while ($row = $employers_result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["company_name"] . "</td><td>" . $row["email"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No employers found.";
}

$conn->close();
?>
