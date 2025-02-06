<?php
include 'db_connect.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $messageText = $_POST['message'];

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $messageText);

    if ($stmt->execute()) {
        $message = "Message sent successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            padding-top: 20px;
            background-color: black;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
            background-color: white;
        }

        h1 {
            font-size: 32px;
            font-weight: 300;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .message {
            font-size: 20px;
            color: green; 
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Thank you for contacting us!</h1>

        <?php if (!empty($message)): ?>
            <div class="message">
                <?php echo $message; ?>
            </div>
        <?php else: ?>
            <div class="contact-form">
                <!-- Form Inputs -->
                <div class="form-inputs">
                    <form action="contact_process.php" method="POST">
                        <label for="name">Your Name <span style="color: red;">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" required>

                        <label for="email">Your Email <span style="color: red;">*</span></label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>

                        <label for="message">Message <span style="color: red;">*</span></label>
                        <textarea id="message" name="message" rows="5" placeholder="Your message" required></textarea>

                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>

                <!-- Contact Details -->
                <div class="contact-details">
                    <p><strong>Address</strong></p>
                    <p>Takoradi,<br>
                    P.O.BOX AX40,<br>
                    School Junction</p>

                    <p><strong>Email</strong></p>
                    <a href="mailto:nightingale.nath2@gmail.com">nightingale.nath2@gmail.com</a>

                    <p><strong>Phone Number</strong></p>
                    <a href="tel:+233546607474">+233 546 607 474</a>

                    <p><strong>Social Networks</strong></p>
                    <div class="social-networks">
                        <a href="#" target="_blank"> <i class="fa fa-facebook"></i> </a>
                        <a href="#" target="_blank"> <i class="fa fa-twitter"></i> </a>
                        <a href="#" target="_blank"> <i class="fa fa-envelope"></i> </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
