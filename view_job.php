<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
        .btn-apply {
        background-color: #28a745;
        margin-left: 10px;
    }

    .btn-apply:hover {
        background-color: #218838;
    }

    .btn-back, .btn-apply {
        float: right; /* Align buttons to the right */
    }
    .jobbtn{
        display: flex;
        /* justify-content: space-around; */
    }
    </style>
</head>
<body>
<?php include('header.php'); ?>
<div class="container">
    <?php
    include 'db_connect.php'; // Include the database connection file

    if (isset($_GET['id'])) {
        $job_id = $_GET['id'];

        // Fetch job details based on job ID
        $sql = "SELECT * FROM tbl_jobs WHERE job_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $job_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $job = $result->fetch_assoc();
            echo "<h1>" . htmlspecialchars($job['title']) . "</h1>";
            echo "<p><strong>Company:</strong> " . htmlspecialchars($job['company']) . "</p>";
            echo "<p><strong>Location:</strong> " . htmlspecialchars($job['city']) . ", " . htmlspecialchars($job['country']) . "</p>";
            echo "<p><strong>Category:</strong> " . htmlspecialchars($job['category']) . "</p>";
            echo "<p><strong>Type:</strong> " . htmlspecialchars($job['type']) . "</p>";
            echo "<p><strong>Experience Required:</strong> " . htmlspecialchars($job['experience']) . "</p>";
            echo "<p><strong>Job Description:</strong><br>" . nl2br(htmlspecialchars($job['description'])) . "</p>";
            echo "<p><strong>Responsibilities:</strong><br>" . nl2br(htmlspecialchars($job['responsibility'])) . "</p>";
            echo "<p><strong>Requirements:</strong><br>" . nl2br(htmlspecialchars($job['requirements'])) . "</p>";
            echo "<p><strong>Date Posted:</strong> " . htmlspecialchars($job['date_posted']) . "</p>";
            echo "<p><strong>Closing Date:</strong> " . htmlspecialchars($job['closing_date']) . "</p>";
        } else {
            echo "<p>Job not found.</p>";
        }
    } else {
        echo "<p>No job ID provided.</p>";
    }

    $stmt->close();
    $conn->close();
    ?>
    <div class="jobbtn">
    <a href="joblist.php" class="btn-back">Back to Job Listings</a>
    <a href="profile.php?job_id=<?php echo $job_id; ?>" class="btn-back btn-apply">Apply for Job</a>
    </div>
</div>

</body>
</html>
