<?php
session_start(); 
include('db_connect.php'); // Include the database connection

$error = ''; 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    if (empty($email) || empty($password)) {
        $error = "Both email and password are required.";
    } else {
        // Prepare SQL statement to check the employers table
        $stmt = $conn->prepare("SELECT * FROM employers WHERE email = ?");
        $stmt->bind_param("s", $email);

        
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_email'] = $email; // Store email in session
                $_SESSION['employer_logged_in'] = true;
                header("Location: employer_add_job.php");
                exit();
            }
            else {
                $error = "Invalid password.";
            }
        } else {
            $error = "No account found with that email.";
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Login</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .login-form {
            background-color: #fff;
           
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            
            transition: all 0.3s ease;
        }

        .login-form:hover {
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .login-form label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: box-shadow 0.3s ease;
        }

        .login-form input:focus {
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
            outline: none;
            border-color: #007bff;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .login-form button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .alert {
            color: #d9534f;
            background-color: #f2dede;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .login-form {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
</head>
<body>
<!-- Include the header -->
<?php include('header.php'); ?>
    <div class="login-form">
        <h2>Login as Employer</h2>

        <!-- Error message -->
        <?php if ($error): ?>
            <div class="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
