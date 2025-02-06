<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Form</title>
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    footer {
        background-color: black; 
        color: white;
        padding: 40px 0;
    }

    .footer-container {
        display: flex;
        justify-content: space-around;
        padding: 0 20px;
    }

    .footer-about, .footer-links, .footer-contact {
        width: 30%;
    }

    .footer-links ul {
        list-style-type: none;
        padding: 0;
    }

    .footer-links ul li {
        margin-bottom: 10px;
    }

    .footer-links ul li a {
        color: white;
        text-decoration: none;
    }
</style>
<body>
<?php include 'header.php'; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <img src="profile.jpg" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 100px;">
                    <h4>Profile Name</h4> 
                    <p>Your professional</p>
                    <div class="container mt-5">
                        <button id="viewCvBtn" class="btn btn-primary btn-sm mb-3">View My CV</button>
                        <div id="cvDisplay" style="margin-top: 20px;"></div>
                    </div>
                </div>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">Profile</a>
                    <a href="#" class="list-group-item list-group-item-action">Change Password</a>
                    <a href="#" class="list-group-item list-group-item-action">Professional Qualifications</a>
                    <a href="#" class="list-group-item list-group-item-action">Language Proficiency</a>
                    <a href="#" class="list-group-item list-group-item-action">Training & Workshop</a>
                    <a href="#" class="list-group-item list-group-item-action">Referees</a>
                    <a href="#" class="list-group-item list-group-item-action">Academic Qualifications</a>
                    <a href="#" class="list-group-item list-group-item-action">Working Experience</a>
                    <a href="#" class="list-group-item list-group-item-action">Applied Jobs</a>
                    <a href="#" class="list-group-item list-group-item-action">Logout</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>Profile</h4>
                    <p>Your last logged in: 01-10-2024 08:10 AM [EAT +03:00]</p>
                </div>
                <div class="card-body">
                    <form id="profileForm" method="post" action="update_profile.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="educationLevel" class="form-label">Education Level</label>
                                    <input type="text" class="form-control" id="educationLevel" name="education_level" placeholder="Your professional" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="" disabled selected>Select your gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city" class="form-label">City/Town</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City/Town" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <select class="form-select" id="country" name="country" required>
                                        <option value="" disabled selected>Select your country</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Canada">Canada</option>
                                        <option value="USA">USA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="aboutMe" class="form-label">About Me</label>
                            <textarea class="form-control" id="aboutMe" name="about_me" rows="3" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="cv" class="form-label">Upload CV</label>
                            <input type="file" class="form-control" id="cv" name="cv" accept=".pdf,.doc,.docx">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your job application has been submitted successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    // Check if the success parameter is present in the URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        // Show the success modal
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    }
</script>

</body>
</html>
