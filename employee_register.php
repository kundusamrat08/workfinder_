<?php
session_start();
require 'connection.php';

// Initialize variables
$firname = $lstname = $phno = $email = $pswd = $Dateofbirth = $gender = $country = $qualification = $expr = $profession = $jobtype = $cvUpload = $language = "";

$languages = []; // Initialize an empty array for languages

$errors = []; // Initialize an array to store validation errors

if (isset($_POST["submit"])) {
    // Validate required fields
    $requiredFields = ["firname", "lstname", "phno", "email", "pswd", "Dateofbirth", "gender", "country", "qualification", "expr", "profession", "jobtype", "cvupload", "profilePicture"];

    
        // All required fields are filled, proceed with form processing

        // Retrieve form data
        $firname = $_POST["firname"];
        $lstname = $_POST["lstname"];
        $phno = $_POST["phno"];
        $email = $_POST["email"];
        $pswd = $_POST["pswd"];
        $Dateofbirth = $_POST["Dateofbirth"];
        $gender = $_POST["gender"];
        $country = $_POST["country"];
        $qualification = $_POST["qualification"];
        $expr = $_POST["expr"];
        $profession = $_POST["profession"];
        $jobtype = $_POST["jobtype"];
        $cvUpload = $_FILES['cvupload']['name']; // CV Upload
        
        if (isset($_POST["languages"])) {
            $languages = $_POST["languages"]; // Set languages if available
        }

        // Construct the comma-separated language string
        $language = implode(', ', $languages);

        // Specify the directory where profile pictures will be stored
        $profilePictureDir = "upload/";
        $profilePicturePath = $profilePictureDir . $_FILES['profilePicture']['name'];

        // Move the uploaded profile picture to the specified directory
        move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $profilePicturePath);

        // Set the profile picture path in the session
        $_SESSION['profile_picture'] = $_FILES['profilePicture']['name'];

        // Insert data into the database
        $query = "INSERT INTO jobseeker (js_fname, js_lname, js_ph, js_email, js_password, js_dob, gender, js_country, js_language, js_qualification, js_experience, js_profession, js_jobtype, cv, profilePicture)
                  VALUES ('$firname', '$lstname', '$phno', '$email', '$pswd', '$Dateofbirth', '$gender', '$country', '$language', '$qualification', '$expr', '$profession', '$jobtype', '$cvUpload', '$profilePicturePath')";
        
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            // Move the uploaded CV to the "upload" directory
            move_uploaded_file($_FILES["cvupload"]["tmp_name"], "upload/" . $cvUpload);

            // Start the user session
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $firname;

            header("location:employee_homepage.php");
        }
    }
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Employee Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        body {
            background-image: url('images/background_img.jpg'); /* Replace 'path-to-your-image.jpg' with the actual path to your background image */
            background-size: cover; /* Cover the entire viewport */
            background-repeat: no-repeat; /* Prevent image from repeating */
            background-attachment: fixed; /* Keep the image fixed while scrolling */
        }
        .card {
            background-color: transparent;
        }

        .container {
            max-width: 5000px; /* Adjust the max-height to your preference */
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for input boxes */
            border: 2px solid #ccc; /* Add a light gray border */
            border-radius: 5px; /* Rounded corners */
            box-shadow: none; /* Remove the box shadow */
            padding: 6px 10px;
        }
        .form-box {
            border: 1px solid #ccc;
            padding: 50px;
            border-radius: 10px;
            background-color: white;
            width: 170%;
            margin left: 100px;
        }
        .custom-form-container.my-form-box {
        margin-left: -270px; /* Adjust the left margin as needed */
    }
    #error-message {
            position: fixed;
            top: -50px; /* Initially off-screen from the top */
            left: 0;
            width: 100%;
            background-color: #ff5555; /* Red background */
            color: #fff; /* White text */
            text-align: center;
            padding: 10px;
            transition: top 0.5s; /* Smooth animation */
        }
    </style>
</head>
<body>
<div id="error-message">Please fill out all required fields.</div> <!-- Add error message div -->

<script>
    // JavaScript to show and hide the error message
    document.addEventListener("DOMContentLoaded", function() {
        const registerButton = document.querySelector("button[name='submit']");
        const form = document.querySelector("form");
        const errorMessage = document.getElementById("error-message");

        registerButton.addEventListener("click", function(event) {
            const requiredInputs = document.querySelectorAll("[required]");
            let formIsValid = true;

            requiredInputs.forEach(function(input) {
                if (input.value.trim() === "") {
                    formIsValid = false;
                }
            });

            if (!formIsValid) {
                // Display error message from the top
                errorMessage.style.top = "0";
                event.preventDefault(); // Prevent form submission
            }
        });

        form.addEventListener("submit", function() {
            // Hide error message when the form is submitted
            errorMessage.style.top = "-50px";
        });
    });
</script>
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9 custom-form-container my-form-box">
                <div class="card border-0">
                    <div class="card-body p-5">
                       
                        <div class="form-box">
                        <form method="POST" class="needs-validation" novalidate="" autocomplete="off" enctype="multipart/form-data">
                            <div class="row mb-3">
                            <h1 class="fs-2 card-title fw-bold mb-4" class=""> Employee Register</h1>
                                <div class="col-md-6">
                                    <label class="mb-2" for="firname">First Name</label>
                                    <input id="name" type="text" class="form-control" name="firname" placeholder="Enter your first name" requred>
                                    <div class="invalid-feedback">
                                        Fast Name is required
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2" for="lstname">Last Name</label>
                                    <input id="name" type="text" class="form-control" name="lstname" placeholder="Enter your last name" required>
                                    <div class="invalid-feedback">
                                        Last Name is required
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2" for="firname">Phone</label>
                                    <input id="name" type="number" class="form-control" name="phno" placeholder="Enter your phone number" required>
                                    <div class="invalid-feedback">
                                        Phone Number is required
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2" for="lstname">Email</label>
                                    <input id="name" type="email" class="form-control" name="email" placeholder="Enter your last name" required>
                                    <div class="invalid-feedback">
                                        Email is required
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2" for="firname">Password</label>
                                    <input id="name" type="password" class="form-control" name="pswd" placeholder="Enter your Password"  required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>
                                <div class="col mb-6">
                                    <label class="mb-2" for="cvupload">Date Of birth</label>
                                    <input id="name" type="date" class="form-control" name="Dateofbirth" placeholder="Enter your last name"  required>
                                    <div class="invalid-feedback">
                                       Date is requred
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col-md-6">
                                    <label class="mb-2" for="gender">Gender</label>
                                    <div class="mb-2 text-muted">
                                    <input class="mb-2 text-muted" type="radio" name="gender" value="Male" required>
                                    <label class="mb-2 text-muted" for="gender">Male</label>
                                    </div>
                                    <div class="mb-2 text-muted">
                                    <input class="mb-2 text-muted" type="radio" name="gender" value="Female" required>
                                    <label class="mb-2 text-muted" for="gender">Female</label>
                                    </div>
                                    <div class="mb-2 text-muted">
                                    <input class="mb-2 text-muted" type="radio" name="gender" value="Others" required>
                                    <label class="mb-2 text-muted" for="gender">Others</label>
                                    </div>
									<div class="invalid-feedback">
										Gender is required	
									</div>
                                   
                                </div>
                                <div class="col-md-6">
                                <label class="mb-2" for="language">Language</label>
                                <div class="mb-2 text-muted">
                                    <input class="mb-2 text-muted" type="checkbox" name="languages[]" value="English" <?php echo (in_array('English', $languages)) ? 'checked' : ''; ?>>
                                    <label class="mb-2 text-muted" for="languages">English</label>
                                </div>
                                <div class="mb-2 text-muted">
                                    <input class="mb-2 text-muted" type="checkbox" name="languages[]" value="Hindi" <?php echo (in_array('Hindi', $languages)) ? 'checked' : ''; ?>>
                                    <label class="mb-2 text-muted" for="languages">Hindi</label>
                                </div>
                                <div class="mb-2 text-muted">
                                    <input class="mb-2 text-muted" type="checkbox" name="languages[]" value="Bengali" <?php echo (in_array('Bengali', $languages)) ? 'checked' : ''; ?>>
                                    <label class="mb-2 text-muted" for="languages">Bengali</label>
                                </div>
                                <div class="invalid-feedback">
                                    Language is required
                                </div>
                                
                            </div>
                                </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2" for="lstname">Country</label>
                                    
                                    <select class="form-control" name="country" id="name">
                                    <option class="mb-2 text-muted" value="">Select Country</option>
                                    <option class="mb-2 text-muted" value="India">India</option>
                                    <option class="mb-2 text-muted" value="USA">USA</option>
                                    <option class="mb-2 text-muted" value="Russia">Russia</option> 
                                    <option class="mb-2 text-muted" value="Afghanistan"> Afghanistan</option>
                                    <option class="mb-2 text-muted" value="Argentina">Argentina</option>
                                    <option class="mb-2 text-muted" value="Australia">Australia</option>
                                    <option class="mb-2 text-muted" value="Belgium">Belgium</option>
                                    <option class="mb-2 text-muted" value="Brazil">Brazil</option>
                                    <option class="mb-2 text-muted" value="Canada">Canada</option>
                                    <option class="mb-2 text-muted" value="Chile">Canada</option>
                                    <option class="mb-2 text-muted" value="Canada">Canada</option>
                                    <option class="mb-2 text-muted" value="Colombia">Colombia</option>
                                    <option class="mb-2 text-muted" value="France">France</option>
                                    </select>
                    
                                </div>
                            
                                <div class="col-md-6">
                                    <label class="mb-2" for="firname">Qualification</label>
                                    <input id="name" type="text" class="form-control" name="qualification" placeholder="Enter your qualification"  required>
                                   
                                </div>
                            </div>
                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2" for="lstname">Experience</label>
                                    
                                    <select id="experience" class="form-control" name="expr" required>
                                    <option value="" selected hidden>Select Experience</option>
                                    <option value="freshers">Freshers</option>
                                    <option value="1year" >1 Year</option>
                                    <option value="2years">2 Years</option>
                                    <option value="3years">3 Years</option>
                                    <option value="4years">4 Years</option>
                                    <option value="5years&above">5 Years & Above</option>
                                    </select>
                                    
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2" for="profession">Profession</label>
                                    <input id="name" type="text" class="form-control" name="profession" placeholder="Enter your profession" required>
                                    <div class="invalid-feedback">
                                    Profession is required
                                    </div>
                                </div>
                                </div>
                            
                          
                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2" for="email">Jobtype</label>
                                    <select id="jobtype" class="form-control" name="jobtype" required>
                                    <option value="" selected hidden>Select Job type</option>
                                    <option value="parttime">Part Time</option>
                                    <option value="fulltime" >Full Time</option>
                                    <option value="freelance" >Freelance</option>
                                    <option value="internship">Internship</option>
                                    <option value="temporary">Temporary</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Jobtype is invalid
                                    </div>
                                    </div>
                                        
                            <div class="col md-6">
                                    <label class="mb-2" for="cvupload">Upload your cv</label>
                                    <input id="name" type="file" class="form-control" name="cvupload"  accept=".pdf" required>
                                    <div class="invalid-feedback">
                                        cv is required
                                    </div>
                                </div>
                            </div>
                            <div class="col md-5">
                                    <label class="mb-2" for="profilePicture">Upload Profile Picture</label>
                                    <input id="name" type="file" class="form-control" name="profilePicture" required>
                                    <div class="invalid-feedback">
                                    profilePicture required
                                    </div>
                                </div>
                                <br>
                                <button type="submit" name="submit" class="btn btn-success" style="width: 522px; margin left:35px;">
                                    Register
                                </button>
                                <div class="card-footer py-3 border-0">
                                 <div class="text-center">
                                  Already have an account? <a href="employee_login.php" class="text-dark">Login</a>
                                 </div>
                               </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5 text-light">
            Copyright &copy; 2023 &mdash; workFinder
        </div>
    </div>
</section>

<script src="js/login.js"></script>
</body>
</html>
