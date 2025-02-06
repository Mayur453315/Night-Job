<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job</title>
    <!-- Linking jQuery and jQuery UI for the datepicker functionality -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        .breadcrumb {
            width: 100%;
            text-align: left;
            padding: 10px 30px;
            font-size: 14px;
            background-color: #f4f4f4;
        }

        .breadcrumb a {
            color: #3498db;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            justify-content: center;
            padding: 20px;
            margin-left: 37%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php include('header.php'); ?>

<div class="breadcrumb">
    <a href="index.php">Home</a> / <span style="color:black;">Add Job</span>
</div>

<div class="container">
    <h1>Add a Job</h1>
    <!-- Logout Button -->
    <form action="logout.php" method="POST" style="display:inline;">
        <button type="submit">Logout</button>
    </form>
    <form action="add_job.php" method="POST" onsubmit="return validateForm()">
        <label for="job_id">Job ID:</label>
        <input type="text" id="job_id" name="job_id" placeholder="Enter Job ID (e.g. JOB001)" required>

        <label for="title">Job Title:</label>
        <input type="text" id="title" name="title" placeholder="Enter Job Title (e.g. Software Engineer)" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" placeholder="Enter City (e.g. New York)" required>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" placeholder="Enter Country (e.g. USA)" required>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" placeholder="Enter Job Category (e.g. IT and Telecoms)" required>

        <label for="type">Job Type:</label>
        <input type="text" id="type" name="type" placeholder="Full-time, Part-time, etc." required>

        <label for="experience">Experience:</label>
        <input type="text" id="experience" name="experience" placeholder="Experience Required (e.g. 3+ years)" required>

        <label for="description">Job Description:</label>
        <textarea id="description" name="description" placeholder="Enter Job Description" required></textarea>

        <label for="responsibility">Job Responsibility:</label>
        <textarea id="responsibility" name="responsibility" placeholder="Enter Job Responsibilities" required></textarea>

        <label for="requirements">Job Requirements:</label>
        <textarea id="requirements" name="requirements" placeholder="Enter Job Requirements (e.g. Proficient in Java and Python)" required></textarea>

        <label for="company">Company:</label>
        <input type="text" id="company" name="company" placeholder="Enter Company Name (e.g. Tech Solutions Inc.)" required>

        <label for="date_posted">Date Posted:</label>
        <input type="text" id="date_posted" name="date_posted" placeholder="Select Date Posted (YYYY-MM-DD)" required>

        <label for="closing_date">Closing Date:</label>
        <input type="text" id="closing_date" name="closing_date" placeholder="Select Closing Date (YYYY-MM-DD)" required>

        <input type="hidden" id="enc_id" name="enc_id" value="">

        <input type="submit" value="Add Job">
    </form>
</div>

<script>
    $(function () {
        // Initialize datepicker for date fields
        $("#date_posted").datepicker({
            dateFormat: "yy-mm-dd"
        });
        $("#closing_date").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });

    // Basic form validation
    function validateForm() {
        const fields = ['job_id', 'title', 'city', 'country', 'category', 'type', 'experience', 'description', 'responsibility', 'requirements', 'company', 'date_posted', 'closing_date'];
        let isValid = true;

        // Loop through all required fields and check if they are filled
        fields.forEach(function (field) {
            const element = document.getElementById(field);
            if (!element.value.trim()) {
                alert(`Please fill out the ${field.replace('_', ' ')} field.`);
                isValid = false;
            }
        });

        return isValid;
    }
</script>

</body>
</html>
