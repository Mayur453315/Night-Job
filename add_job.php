<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $job_id = $_POST['job_id'];
    $title = $_POST['title'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $experience = $_POST['experience'];
    $description = $_POST['description'];
    $responsibility = $_POST['responsibility'];
    $requirements = $_POST['requirements'];
    $company = $_POST['company'];
    $date_posted = $_POST['date_posted'];
    $closing_date = $_POST['closing_date'];

    // Calculate enc_id dynamically
    $enc_id_query = "SELECT MAX(enc_id) AS max_enc_id FROM tbl_jobs";
    $enc_id_result = mysqli_query($conn, $enc_id_query);
    $row = mysqli_fetch_assoc($enc_id_result);
    $enc_id = $row['max_enc_id'] + 1;

    // Insert job data into the database
    $sql = "INSERT INTO tbl_jobs (job_id, title, city, country, category, type, experience, description, responsibility, requirements, company, date_posted, closing_date, enc_id) 
            VALUES ('$job_id', '$title', '$city', '$country', '$category', '$type', '$experience', '$description', '$responsibility', '$requirements', '$company', '$date_posted', '$closing_date', '$enc_id')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to joblist.php with success message
        header("Location: joblist.php?message=Job added successfully!");
        exit(); // Make sure to exit after header redirection
    } else {
        // Redirect to joblist.php with error message
        header("Location: joblist.php?message=Job not added. Error: " . mysqli_error($conn));
        exit();
    }
}
?>
