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
    background-color: #f0f0f0; 
    border-radius: 15px; 
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
}

        h1 {
            font-size: 32px;
            font-weight: 300;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .contact-form {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .form-inputs {
            flex: 0 0 60%;
            margin-right: 20px;
        }

        .form-inputs input, .form-inputs textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-inputs input:focus, .form-inputs textarea:focus {
            outline: none;
            border-color: #00aaff;
        }

        .form-inputs label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        .form-inputs input::placeholder, .form-inputs textarea::placeholder {
            font-size: 12px;
            color: #888;
        }

        .contact-details {
            flex: 0 0 35%;
            margin-top: 10px;
        }

        .contact-details p {
            font-size: 14px;
            color: #333;
            margin-bottom: 15px;
        }

        .contact-details a {
            color: #00aaff;
            text-decoration: none;
            font-size: 14px;
        }

        .contact-details a:hover {
            text-decoration: underline;
        }

        .social-networks {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .social-networks a {
            color: #00aaff;
            font-size: 20px;
            text-decoration: none;
        }

        .submit-btn {
            background-color: #D5006D;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-transform: uppercase;
        }

        .submit-btn:hover {
            background-color: #0088cc;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Contact Us for Help</h1>

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
    </div>

</body>
</html>
