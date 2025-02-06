<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('db_connect.php'); // Include the database connection

$error = ''; 

if (isset($_GET['message'])) {
    echo "<div class='message'>" . htmlspecialchars($_GET['message']) . "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #000; 
            color: #fff; 
            margin: 0;
            padding: 20px;
        }

        .message {
            color: #28a745; 
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #ffcc00; 
            text-align: center;
            margin-bottom: 20px;
        }

        button.search-btn {
            background-color: #ffcc00; 
            color: black; 
            padding: 12px 24px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: 0 auto; /
        }

        button.search-btn:hover {
            background-color: #e6b800; 
        }

        .search-bar {
            margin-bottom: 20px;
            background: rgba(255, 255, 255, 0.1); 
            padding: 30px;
            border-radius: 15px; 
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2); 
        }

        .search-bar select, .search-bar button.search-btn {
            width: calc(100% - 20px); 
            margin: 10px 0;
            padding: 12px; 
            border: none; 
            border-radius: 5px; 
        }

        .search-bar select {
            background: rgba(255, 255, 255, 0.6); 
            color: black; 
        }

        .job-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; 
        }

        .job-card {
            color: #343a40; 
            padding: 20px;
            border-radius: 10px; 
            width: calc(33.333% - 20px);
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .job-card:nth-child(odd) {
            background-color: #f8d7da; 
        }

        .job-card:nth-child(even) {
            background-color: #d4edda; 
        }

        .job-card:nth-child(3n) {
            background-color: #cce5ff; 
        }

        .job-card:hover {
            transform: translateY(-5px); 
            box-shadow: 0 6px 15px rgba(255, 255, 255, 0.15);
        }

        .delete-btn {
            background: #dc3545; 
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px; 
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background: #c82333; 
        }

        .btn-view {
            display: inline-block;
            background: #17a2b8; 
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px; 
            transition: background-color 0.3s ease;
        }

        .btn-view:hover {
            background: #138496;
        }

        @media (max-width: 768px) {
            .job-card {
                width: calc(50% - 20px); 
            }
        }

        @media (max-width: 480px) {
            .job-card {
                width: 100%; 
            }
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<!-- Search Bar Section -->
<div class="search-bar">
    <h1>Search for Jobs</h1>
    <form action="search_results.php" method="GET">
        <select name="category" required>
            <option value="" disabled selected>Select Category</option>
            <?php
            // Fetch categories
            $sql = "SELECT id, category FROM tbl_categories";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['category']) . "</option>";
                }
            } else {
                echo "<option value=''>No categories available</option>";
            }
            ?>
        </select>

        <select name="country" required>
            <option value="" disabled selected>Select Country</option>
            <?php
            // Fetch countries
            $sql = "SELECT id, country_name FROM tbl_countries";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['country_name']) . "</option>";
                }
            } else {
                echo "<option value=''>No countries available</option>";
            }
            ?>
        </select>
        

        <!-- <button type="submit" >Search</button> -->
        <form >
            <!-- <input type="text" name="job_title" placeholder="Enter job title" required> -->
            <select name="job_title" required>
    <option value="" disabled selected>Select Job Title</option>
    <?php
    // Fetch job titles from tbl_jobs
    $sql = "SELECT job_id, title FROM tbl_jobs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . htmlspecialchars($row['job_id']) . "'>" . 
                 htmlspecialchars($row['title']) . 
                 "</option>";
        }
    } else {
        echo "<option value=''>No job titles available</option>";
    }
    ?>
</select>
    <button type="submit" class="search-btn">Search</button>
</form>

    </form>
</div>

<!-- Content section (job listings, etc.) -->
<div class="content">
    <div class="job-list">
        <?php
        // Fetch job listings
        $sql = "SELECT * FROM tbl_jobs";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($job = $result->fetch_assoc()) {
                echo "<div class='job-card'>";
                echo "<h2>" . htmlspecialchars($job['title']) . "</h2>";
                echo "<p><strong>Company:</strong> " . htmlspecialchars($job['company']) . "</p>";
                echo "<p><strong>Location:</strong> " . htmlspecialchars($job['city']) . ", " . htmlspecialchars($job['country']) . "</p>";
                echo "<a href='view_job.php?id=" . htmlspecialchars($job['job_id']) . "' class='btn-view'>View Job</a>";

                // Show delete button if employer is logged in
                if (isset($_SESSION['employer_logged_in']) && $_SESSION['employer_logged_in'] === true) {
                    echo "<button class='delete-btn' onclick='deleteJob(\"" . htmlspecialchars($job['job_id']) . "\")'>Delete</button>";
                }
                echo "</div>";
            }
        } else {
            echo "<p>No job listings available at the moment.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>

<script>
    function deleteJob(job_id) {
        if (confirm("Are you sure you want to delete this job?")) {
            // Redirect to delete_job.php with the job_id as a query parameter
            window.location.href = `delete_job.php?job_id=${encodeURIComponent(job_id)}`;
        }
    }
</script>

</body>
</html>
