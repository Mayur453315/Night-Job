<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        footer {
            background-color: #222;
            color: #ccc;
            padding: 40px 0;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            gap: 20px;
        }

        .footer-section {
            flex: 1;
            text-align: left; 
        }

        .footer-section h3 {
            font-size: 20px;
            color: white;
            margin-bottom: 10px;
        }

        .footer-section p {
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .footer-about p {
            text-align: justify;
        }

        .footer-links {
            text-align: center; 
        }

        .footer-links ul {
            list-style: none;
            padding: 1px;
            margin: 0; 
        }

        .footer-links ul li {
            margin-bottom: 8px;
        }

        .footer-links ul li a {
            color: #ccc; 
            text-decoration: none; 
        }

        .footer-links ul li a:hover {
            color: white; 
        }

        .social-icons a {
            margin-right: 10px;
            font-size: 18px;
            transition: color 0.3s;
            color: #ccc; 
        }

        .social-icons a:hover {
            color: white; 
        }

        .footer-bottom {
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #444;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                text-align: center;
            }

            .footer-section {
                margin-bottom: 20px;
                text-align:center;
            }
        }
    </style>
</head>
<body>

<!-- Footer Section -->
<footer>
    <div class="footer-container">
        <!-- About Section -->
        <div class="footer-section footer-about">
            <h3>About Nightingale Jobs</h3>
            <p>
                Nightingale Jobs is a job portal, an online job management system developed by Nathaniel Nkrumah 
                for his project in February 2018.
            </p>
        </div>

        <!-- Quick Links Section -->
        <div class="footer-section footer-links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="jobList.php">Job List</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <!-- Contact Section -->
        <div class="footer-section">
            <h3>Nightingale Jobs Contact</h3>
            <p>Address: Takoradi, School Junction, PO.BOX AX40</p>
            <p>Email: <a href="mailto:nightingale.nath2@gmail.com">nightingale.nath2@gmail.com</a></p>
            <p>Phone: +233 546 607 474</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p>© Copyright 2024 Nightingale Vision Software</p>
        <p>Developed by Nathaniel Nkrumah</p>
    </div>
</footer>

</body>
</html>
