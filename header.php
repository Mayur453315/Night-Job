<?php
// Check if session is already started
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if it hasn't been started yet
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIGHT JOBS</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file if needed -->
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding-top: 80px; 
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #23272a;
            color: white;
            padding: 10px 20px;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            margin-left:20px;
            font-size: 24px;
            font-weight: bold;
            font-family: 'Georgia', serif;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        nav ul li a {
            color: #d3d3d3;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: white;
        }

        
        .login-register {
            display: flex;
            gap: 10px;
        }

        .login-register .btn {
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: capitalize;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            border: none;
            color: white;
            text-decoration: none; 
        }

        /* Register Button */
        .login-register .btn:nth-child(1) {
            background-color: #4CAF50;
        }

        .login-register .btn:nth-child(1):hover {
            background-color: #45A049; 
        }

        /* Login Button */
        .login-register .btn:nth-child(2) {
            background-color: #3498DB; 
        }

        .login-register .btn:nth-child(2):hover {
            background-color: #2980B9; 
        }
    </style>
</head>
<body>

<header>
    <div class="logo">M JOBS</div>
    <nav>
        <ul>
            <li><a href="index.php?page=home">Home</a></li>
            <li><a href="index.php?page=jobList">Job List</a></li>
            <li><a href="index.php?page=contact">Contact Us</a></li>
        </ul>
    </nav>
    <div class="login-register">
        <?php if (isset($_SESSION['user_email'])): ?>
            <a href="logout.php" class="btn">Logout</a>
        <?php else: ?>
            <a href="register_employer.php" class="btn">Register</a>
            <a href="login.php" class="btn">Login</a>
        <?php endif; ?>
    </div>
</header>

</body>
</html>
