<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Reset for html and body */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%; /* Ensure it covers the full height */
            font-family: 'Arial', sans-serif;
        }

        /* Header Styling */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #23272a;
            color: white;
            padding: 15px 30px;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Adjust body padding to account for fixed header */
        body {
            padding-top: 80px; /* Same height as header to avoid overlap */
            background: url('01.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* Main Content Styling */
        main {
            height: calc(100vh - 80px); /* Adjust height for remaining viewport */
            display: flex;
            justify-content: center;
            align-items: center;
            color: white; /* Ensure content is readable */
        }

        /* Adjusted Home Content Styling */
.home-content {
    text-align: center;
    text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7); /* Stronger shadow for readability */
    margin: 20px;
}

.home-content h1 {
    font-size: 40px; /* Increase the size of the main heading */
    margin-bottom: 20px;
}

.home-content p {
    font-size: 24px; /* Increase the size of the paragraph text */
    line-height: 0.6; /* Add spacing between lines for better readability */
    margin-bottom: 15px;
}

        select, button {
            padding: 10px;
            margin: 10px;
            font-size: 18px;
            border-radius: 5px;
        }

        button {
            background-color: blue;
            color: black;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>

    <!-- Include the header -->
    <?php include('./header.php'); ?>

    <!-- Main Content Section -->
    <main>
        <?php
            if ($page === 'home') {
                echo '
                <section class="home-content">
                    <h1>Your Bright Future Starts Here Now</h1>
                    <p>Finding your next job or career on Nightingale Jobs</p>
                    <p>Explore job listings, connect with employers, and apply for jobs that suit your skills!</p>
                </section>';
            } elseif ($page === 'jobList') {
                include('jobList.php');
            }
             elseif ($page === 'contact') {
                include('contact.php');
            }
        ?>
    </main>

    <!-- Include the footer -->
    <?php include('footer.php'); ?>
</body>
</html>
