<?php
session_start();
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $educationLevel = $_POST['education_level'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $aboutMe = $_POST['about_me'];
    
    // Handle CV upload
    $cvFilePath = '';
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == UPLOAD_ERR_OK) {
        $targetDirectory = 'uploads/'; // Ensure this directory exists and is writable
        $cvFileName = basename($_FILES['cv']['name']);
        $cvFilePath = $targetDirectory . uniqid() . '_' . $cvFileName;

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['cv']['tmp_name'], $cvFilePath)) {
            echo "Error uploading file.";
            exit();
        }
    }

    $stmt = $conn->prepare("INSERT INTO profile (first_name, last_name, email, dob, education_level, gender, city, country, about_me, cv_file_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $firstName, $lastName, $email, $dob, $educationLevel, $gender, $city, $country, $aboutMe, $cvFilePath);
    
    if ($stmt->execute()) {
        // Store user details in session
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['email'] = $email;
        
        // Redirect to profile page with success message
        header("Location: profile.php?success=true");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
