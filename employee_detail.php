<?php
session_start(); 
include('db_connect.php'); 

if (isset($_GET['id'])) {
    $employee_id = intval($_GET['id']); // Ensure it's an integer

    // Fetch employee details based on ID
    $sql = "SELECT * FROM profiles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if employee found
    if ($result->num_rows == 1) {
        $employee = $result->fetch_assoc();
    } else {
        echo "<p>Employee not found.</p>";
        exit;
    }
} else {
    echo "<p>Invalid request.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $employee['first_name'] . ' ' . $employee['last_name']; ?> - Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include('header.php'); ?>

<h2><?php echo $employee['first_name'] . ' ' . $employee['last_name']; ?>'s Profile</h2>
<div class="profile-container">
    <p><strong>Email:</strong> <?php echo $employee['email']; ?></p>
    <p><strong>Date of Birth:</strong> <?php echo $employee['dob']; ?></p>
    <p><strong>Education Level:</strong> <?php echo $employee['education_level']; ?></p>
    <p><strong>Gender:</strong> <?php echo $employee['gender']; ?></p>
    <p><strong>City:</strong> <?php echo $employee['city']; ?></p>
    <p><strong>Country:</strong> <?php echo $employee['country']; ?></p>
    <p><strong>About Me:</strong> <?php echo nl2br($employee['about_me']); ?></p>
    <?php if ($employee['cv']): ?>
        <p><strong>CV:</strong> <a href="<?php echo $employee['cv']; ?>" target="_blank">View CV</a></p>
    <?php endif; ?>
</div>



</body>
</html>

<?php
$stmt->close(); 
$conn->close(); 
?>
