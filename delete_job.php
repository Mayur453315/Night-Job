<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('db_connect.php');

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id']; 

    // Check if the employer is logged in
    if (isset($_SESSION['employer_logged_in']) && $_SESSION['employer_logged_in'] === true) {
        // Prepare the SQL statement to delete the job
        $sql = "DELETE FROM tbl_jobs WHERE job_id = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("s", $job_id); // Use "s" since job_id is a string
            $stmt->execute();
            
            // Check if the job was deleted successfully
            if ($stmt->affected_rows > 0) {
                // Redirect back to job list with a success message
                header("Location: joblist.php?message=Job deleted successfully");
                exit(); 
            } else {
                error_log("Delete failed: Job ID not found or already deleted."); // Log error
                // Redirect back with an error message
                header("Location: joblist.php?message=Job not found or could not be deleted");
                exit(); // exit after redirect
            }

            $stmt->close();
        } else {
            error_log("Database error: Unable to prepare statement."); 
            // Redirect back with an error message if the SQL statement couldn't be prepared
            header("Location: joblist.php?message=Database error: Unable to prepare statement");
            exit(); 
        }
    } else {
        error_log("Unauthorized access attempt to delete job."); 
        // Redirect back with an error message if the employer is not logged in
        header("Location: joblist.php?message=You are not authorized to delete this job");
        exit(); 
    }
} else {
    error_log("No job ID specified for deletion."); 
    // Redirect back with an error message if job_id is not set
    header("Location: joblist.php?message=No job ID specified");
    exit(); 
}

// Close the database connection
$conn->close();
?>
