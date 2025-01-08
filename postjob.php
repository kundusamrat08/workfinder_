<?php
session_start();    
require 'connection.php';

$cpnyname = $_SESSION['cpnyname'];
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
if (!$email) {
  // Redirect to the login page if the employer is not logged in
  header("Location: employer_login.php");
  exit();
}


if(isset($_POST["postjob"])){
  
  $jobtitle = $_POST["jobtitle"];
  $qualification = $_POST["qualification"];
  $jobtype = $_POST["jobtype"];
  $expr = $_POST["expr"];
  $location = $_POST["location"];
  $salary = $_POST["salary"];
  $jobdes = $_POST["jobdes"];

  

  $query = "INSERT INTO job VALUES('','$jobtitle','$qualification', '$cpnyname','$jobtype', '$expr', '$location','$salary', '$jobdes')";
  mysqli_query($conn,$query);
  header("location:postjobtable.php"); 
  // echo "<script> alert('Posted Successfully'); </script>";
  
}
$email = $_SESSION['email'];
$query = "SELECT cpny_logo FROM employer WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $profilePicturePath = $row['cpny_logo'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Post Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        body {
            background-image: url('images/moon.jpg'); /* Replace 'path-to-your-image.jpg' with the actual path to your background image */
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
            width: 130%;

        }
        .navbar {
    background-color: transparent; /* Background color for the navbar */
    border-bottom: 0px solid #e0e0e0; /* Add a subtle border at the bottom */
}

.navbar-brand {
    font-size: 24px;
    font-weight: bold;
}

.navbar-toggler-icon {
    background-color: #333; /* Background color for the mobile menu icon */
}

.navbar-nav .nav-link {
    font-size: 18px;
    margin-right: 20px; /* Add spacing between navigation links */
    color: #333; /* Text color for navigation links */
}

.navbar-nav .nav-link:hover {
    color: #007bff; /* Text color on hover */
}
.profile-picture-frame {
        position: relative;
    }

    .profile-picture {
        width: 60px; /* Adjust the size as needed */
        height: 60px; /* Adjust the size as needed */
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #fff; /* Optional: Add a border */
        
    }
        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="employer_homepage.php" style="color: white; font-size: 30px;">workFinder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav" style="margin-right:-100px;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color: white; font-size: 20px;" href="employer_homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white; font-size: 20px;" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white; font-size: 20px;" href="postjobtable.php">Posted Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white; font-size: 20px;" href="list_of_job.php">Applied Jobs</a>
                </li>
            </ul>
        </div>
        
        <!-- Profile Picture Section -->
        <div class="d-flex align-items-center ml-auto"> <!-- Use flex utilities to align elements -->
        <div style="margin-right: 20px;">
    <span style="font-weight: bold; font-size: 16px; color: white;">Welcome, Employer</span>
    <br>
    <span style="font-size: 14px; color: white;"><?php echo $_SESSION['cpnyname']; ?></span>
</div>


            <div class="profile-picture-frame">
                <img src="<?php echo $profilePicturePath; ?>" alt="Company Logo" class="profile-picture">
            </div>
        </div>
    </div>
</nav>




<!-- <section class="h-100" style="margin-left:-100px;"> -->
<section class="h-100" style="margin-left: -100px; opacity: 0.9;"> <!-- Adjust opacity as needed -->
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="card border-0">
                    <div class="card-body p-5">
                       
                        <div class="form-box">
                        <form method="POST" class="needs-validation" novalidate="" autocomplete="off" enctype="multipart/form-data">
                            <div class="row mb-3">
                            <h1 class="fs-2 card-title fw-bold mb-4" class="">POST JOB</h1>
                                <div class="col-md-6">
                                    <label class="mb-2 fw-bold" for="jobtitle">Job Title</label>
                                    <input id="name" type="text" class="form-control" name="jobtitle" placeholder="Enter your Job Title" required>
                                    <div class="invalid-feedback">
                                        job title is required
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2 fw-bold" for="Qualification">Qualification</label>
                                    <!-- <input id="name" type="text" class="form-control" name="lstname" required> -->
                                    <select class="form-control" name="qualification" required>
                                    <option value="" selected hidden>Select Qualification</option>
                                    <option value="Higher Secondary">Higher Secondary</option>
                                    <option value="BCA">BCA</option>
                                    <option value="Bsc">Bsc</option>
                                    <option value="B.Tech">B.tech</option>
                                    <option value="MCA">MCA</option>
                                    <option value="Msc">Msc</option>
                                    <option value="M.Tech">M.Tech</option>
                                     </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2 fw-bold" for="cpnyname">Company Name</label>
                                    <input id="name" type="text" class="form-control" name="cpnyname" placeholder="Enter your Company" required value="<?php echo $cpnyname; ?>" disabled>
                                    <div class="invalid-feedback">
                                    Company Name is required
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2 fw-bold"  for="jobtype">Job Type</label>
                                    <!-- <input id="name" type="email" class="form-control" name="email" placeholder="Enter your email" required> -->
                                    <select class="form-control" name="jobtype" required>
                                    <option value="" selected hidden>Select Job Type</option>
                                    <option value="Part_time">Part Time</option>
                                    <option value="Full_time">Full Time</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Internship">Internship</option>
                                    <option value="Temporary">Temporary</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2 fw-bold" for="expr">Experience</label>
                                    <!-- <input id="name" type="password" class="form-control" name="pswd" placeholder="Enter your Password" value="<?php echo  $pswd; ?>" required> -->
                                    <select class="form-control" name="expr" required>
                                    <option value="" selected hidden>Select Experience</option>
                                    <option value="freshers">Freshers</option>
                                    <option value="1year">1 Year</option>
                                    <option value="2years">2 Years</option>
                                    <option value="3years">3 Years</option>
                                    <option value="4years">4 Years</option>
                                    <option value="5years&above">5 yeras & Above</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2 fw-bold" for="location">country</label>
    
                                    <select class="form-control" name="location" id="name">
                                    <option class="mb-2 text-muted" value="">Select Country</option>
                                    <option class="mb-2 text-muted" >India</option>
                                    <option class="mb-2 text-muted" >USA</option>
                                    <option class="mb-2 text-muted" >Russia</option> 
                                    <option class="mb-2 text-muted" >Afghanistan</option>
                                    <option class="mb-2 text-muted" >Argentina</option>
                                    <option class="mb-2 text-muted" >Australia</option>
                                    <option class="mb-2 text-muted" >Belgium</option>
                                    <option class="mb-2 text-muted" >Brazil</option>
                                    <option class="mb-2 text-muted" >Canada</option>
                                    <option class="mb-2 text-muted" >Chile</option>
                                    <option class="mb-2 text-muted" >Chaina</option>
                                    <option class="mb-2 text-muted" >Colombia</option>
                                    <option class="mb-2 text-muted" >France</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        countryis required
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2 fw-bold" for="salary">Salary</label>
                                    <input id="salary" type="text" class="form-control" name="salary" placeholder="Enter your Salary"  required>
                                    <div class="invalid-feedback">
                                    Salary is required
                                    </div>
                                </div>
                    
                                <div class="col-md-6">
                                    <label class="mb-2 fw-bold" for="lstname">Job Description</label>
                                    <textarea class="form-control" name="jobdes" id="jobdes" cols="30" rows="1" placeholder="Type here"></textarea>
                                    <div class="invalid-feedback">
                                    Compnay Address is required
                                    </div>
                                    <br>
                                    <br>
                                    <!-- <button type="submit" name="submit" class="btn btn-primary"> -->
                                    <button type="submit" name="postjob" class="btn btn-primary" style="width: 200px; padding: 10px 20px; font-size: 16px; border-radius: 5px; margin-left:-110px;">Post</button>

                                </button>
                                </div>
                            </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                <div class="text-center mt-5 text-light">
                    Copyright &copy; 2024 &mdash; JobX
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/login.js"></script>
</body>
</html>