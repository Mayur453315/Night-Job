<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('db_connect.php');

echo '<style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f4f4f4;
}

.job-details {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.job-details h2 {
    font-size: 1.5em;
    margin: 0 0 10px;
}

.job-details p {
    margin: 5px 0;
}

.btn-view {
    display: inline-block;
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-view:hover {
    background-color: #0056b3;
}
</style>';

$job_id = isset($_GET['job_title']) ? trim($_GET['job_title']) : '';

// Check if a job ID has been selected
if ($job_id === '') {
    echo "<p>Please select a job title to search.</p>";
} else {
    echo "<p>Available jobs:</p>";

    $sql = "SELECT * FROM tbl_jobs WHERE TRIM(job_id) = ?";  // Changed to job_id

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Failed to prepare statement: " . htmlspecialchars($conn->error);
        exit;
    }

    // Bind the parameter
    $stmt->bind_param("s", $job_id); // 's' for string as job_id is a string

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Failed to execute statement: " . htmlspecialchars($stmt->error);
        exit;
    }

    // Get the result set from the statement
    $result = $stmt->get_result();

    // Check if any jobs were found
    if ($result->num_rows > 0) {
        echo "<div class='job-details'>"; 
        while ($job = $result->fetch_assoc()) {
            echo "<h2>" . htmlspecialchars($job['title']) . "</h2>";
            echo "<p><strong>Location:</strong> " . htmlspecialchars($job['city']) . "</p>";
            echo "<p><strong>Company:</strong> " . htmlspecialchars($job['company']) . "</p>";
            echo "<p><strong>Country:</strong> " . htmlspecialchars($job['country']) . "</p>";
            echo "<p><strong>Category:</strong> " . htmlspecialchars($job['category']) . "</p>";
            echo "<p><strong>Type:</strong> " . htmlspecialchars($job['type']) . "</p>";
            echo "<p><strong>Experience:</strong> " . htmlspecialchars($job['experience']) . "</p>";
            echo "<p><strong>Description:</strong> " . nl2br(htmlspecialchars($job['description'])) . "</p>";
            echo "<p><strong>Responsibilities:</strong> " . nl2br(htmlspecialchars($job['responsibility'])) . "</p>";
            echo "<p><strong>Requirements:</strong> " . nl2br(htmlspecialchars($job['requirements'])) . "</p>";
            echo "<p><strong>Date Posted:</strong> " . htmlspecialchars($job['date_posted']) . "</p>";
            echo "<p><strong>Closing Date:</strong> " . htmlspecialchars($job['closing_date']) . "</p>";
            echo "</div>"; 
        }
    } else {
        echo "<p>No job listings available for the selected criteria.</p>";
    }
    $stmt->close();
}

$conn->close();
?>
