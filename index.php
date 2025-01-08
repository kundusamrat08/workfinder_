<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JobPortal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
      
    </style>
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
      <a class="navbar-brand" href="index1.php" style="font-size: 44px;">workFinder</a>

	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.html" class="nav-link" style="font-size: 22px;">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link" style="font-size: 22px;">About</a></li>
	          <li class="nav-item"><a href="" class="nav-link" style="font-size: 22px;">Blog</a></li>
	          <!-- <li class="nav-item"><a href="contact.html" class="nav-link" style="font-size: 22px;">Contact</a></li> -->
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" style="font-size: 22px;" id="jobSeekerDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Employer</a>
              <div class="dropdown-menu" aria-labelledby="jobSeekerDropdown">
                <a class="dropdown-item" href="employer_login.php">Login</a>
                <a class="dropdown-item" href="employer_register.php">Register</a>
                <!-- Add more options as needed -->
              </div>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" style="font-size: 22px;" id="employeeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Job Seeker</a>
                <div class="dropdown-menu" aria-labelledby="employeeDropdown">
                  <a class="dropdown-item" href="employee_login.php">Login</a>
                  <a class="dropdown-item" href="employee_register.php">Register</a>
                  <!-- Add more options as needed -->
                </div>
              </li>
              <li class="nav-item cta mr-md-2"><a href="employer_login.php" class="nav-link">Post a Job</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/moon.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
                <p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have <span class="number" data-number="850000">0</span> great job offers you deserve!</p>
                <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Dream <br><span>Job is Waiting</span></h1>

                <div class="ftco-search">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap">
                            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active mr-md-1"  id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Job</a>
                              

                            </div>
                        </div>
                        <div class="col-md-12 tab-wrap">
                            <div class="tab-content p-4" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="search-job">
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="icon"><span class="icon-briefcase"></span></div>
                                                        <input type="text" class="form-control" name="jobtitle" placeholder="eg. Graphic/Web Developer">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                            <select name="jobtype" class="form-control">
                                                                <option value="">Job Type</option>
                                                                <option value="Full Time">Full Time</option>
                                                                <option value="Part Time">Part Time</option>
                                                                <option value="Freelance">Freelance</option>
                                                                <option value="Internship">Internship</option>
                                                                <option value="Temporary">Temporary</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="icon"><span class="icon-map-marker"></span></div>
                                                        <input type="text" class="form-control" name="location" placeholder="Location">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <input type="submit" name="search" value="Search" class="form-control btn btn-primary">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search Results -->
                <?php
                if (isset($_POST["search"])) {
                    require 'connection.php';

                    // Process search form submission
                    $jobtitle = $_POST["jobtitle"];
                    $jobtype = $_POST["jobtype"];
                    $location = $_POST["location"];

                    // Construct the search query
                    $query = "SELECT * FROM job WHERE 1=1"; // Start with a valid condition

                    if (!empty($jobtitle)) {
                        $query .= " AND job_title LIKE '%$jobtitle%'";
                    }

                    if (!empty($jobtype)) {
                        $query .= " AND job_type LIKE '%$jobtype%'";
                    }

                    if (!empty($location)) {
                        $query .= " AND location LIKE '%$location%'";
                    }

                    $result = mysqli_query($conn, $query);

                    // Display search results
                    if (mysqli_num_rows($result) > 0) {
                        // echo '<h2>Search Results</h2>';
                        echo '<h2 style="color: white; font-size: 35px;">Search Results</h2>';

                        // echo '<table border="1" cellpadding="10">';
                        // echo '<table border="1" cellpadding="10" style=" backdrop-filter: blur(5px); background-color: rgba(255, 255, 255, 0.5);;">';  Add the background color style
                        // echo '<table style="backdrop-filter: blur(5px); background-color: rgba(255, 255, 255, 0.5); border-collapse: collapse; border-radius: 10px;">'; 
                        echo '<table style="width: 925px; height: 200px; backdrop-filter: blur(5px); background-color: rgb(93, 63, 211, 0.5); border-collapse: collapse; border-radius: 10px;">';

                        // echo '<tr><th>Job Title</th><th>Company Name</th><th>Job Type</th><th>Experience</th><th>Location</th><th>Salary</th><th>Job Description</th><th>Apply Here</th></tr>';
                        echo '<tr style="text-align: center;">';
                        echo '<th>Job Title</th>';
                        echo '<th>Company Name</th>';
                        echo '<th>Job Type</th>';
                        echo '<th>Experience</th>';
                        echo '<th>Location</th>';
                        echo '<th>Salary</th>';
                        echo '<th>Job Description</th>';
                        echo '<th>Apply Here</th>';
                        echo '</tr>';


                        while ($row = mysqli_fetch_assoc($result)) {
                            // echo "<tr>";
                            echo '<tr style="text-align: center;">';
                            echo "<td>{$row['job_title']}</td>";
                            echo "<td>{$row['cpny_name']}</td>";
                            echo "<td>{$row['job_type']}</td>";
                            echo "<td>{$row['experience']}</td>";
                            echo "<td>{$row['location']}</td>";
                            echo "<td>{$row['salary']}</td>";
                            echo "<td>{$row['job_description']}</td>";
                            // echo "<td><a href='employee_login.php'>Apply</a></td>";
                            echo '<td><a href="employee_login.php" style="background-color: #0074d9; color: #fff; padding: 5px 10px; text-decoration: none; border-radius: 5px; display: inline-block;">Apply</a></td>';

                            echo "</tr>";
                        }

                        echo '</table>';
                    } else {
                        echo '<p>No results found.</p>';
                    }

                    mysqli_close($conn);
                }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<!-- <section class="ftco-section services-section bg-light"> -->
<!-- <section class="ftco-section services-section;"> -->
<section class="ftco-section services-section" style="background-image: url('white.jpg'); background-size: 100% auto;">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-resume"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Millions of Jobs</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-collaboration"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Easy To Manage Jobs</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon custom-icon-color"><span class="flaticon-promotions"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Top Careers</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-employee"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Expert Candidates</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

    
	
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
        	<div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Employers</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Register</a></li>
                <li><a href="#" class="py-2 d-block">Post a Job</a></li>
                <li><a href="#" class="py-2 d-block">Advance Skill Search</a></li>
                <li><a href="#" class="py-2 d-block">Recruiting Service</a></li>
                <li><a href="#" class="py-2 d-block">Blog</a></li>
                <li><a href="#" class="py-2 d-block">Faq</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Workers</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Register</a></li>
                <li><a href="#" class="py-2 d-block">Post Your Skills</a></li>
                <li><a href="#" class="py-2 d-block">Job Search</a></li>
                <li><a href="#" class="py-2 d-block">Emploer Search</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | workFinder
  </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>