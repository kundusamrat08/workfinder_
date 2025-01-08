<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: employer_login.php"); // Redirect to the login page if not logged in
    exit();
}

// Fetch all posted jobs for the logged-in employer
require 'connection.php'; // Include the database connection file
$companyname = $_SESSION['cpnyname'];
// $logo = $_FILES["logo"]["name"];
// $logo = $_SESSION["logo"];

// Store $logo in a session variable
$email = $_SESSION['email'];
$query = "SELECT cpny_logo FROM employer WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $logo = $row['cpny_logo'];
}
?>


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
      /* CSS code */
      .btn-danger {
  display: inline-block;
  padding: 11px 21px; /* Adjust the padding to change the button size */
  background-color: red; /* Change this to your desired button color */
  color: white; /* Change this to your desired text color */
  border-radius: 10px; /* This adds curved edges to the button */
  border: none; /* Remove the default button border */
  cursor: pointer;
  font-size: 16px;
  text-align: center;
  text-decoration: none;
  transition: background-color 0.3s ease; /* Add a smooth transition effect on hover */
}

.btn-danger:hover {
  background-color: darkred; /* Change this to your desired hover color */
}
.btn-primary{
  display: inline-block;
  padding: 11px 21px; /* Adjust the padding to change the button size */
  background-color: #0266ff; /* Change this to your desired button color */
  color: white; /* Change this to your desired text color */
  border-radius: 10px; /* This adds curved edges to the button */
  border: none; /* Remove the default button border */
  cursor: pointer;
  font-size: 16px;
  text-align: center;
  text-decoration: none;
  transition: background-color 0.3s ease; /* Add a smooth transition effect on hover */

}
/* Remove dot markers from list items */
/* Remove dot marker from the company name */
.nav-item.cta {
  list-style: none;
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
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
      <a class="navbar-brand" href="empr_homepage_index.php" style="font-size: 44px;">workFinder</a>

	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="empr_homepage_index.php" class="nav-link" style="font-size: 22px;">Home</a></li>
	          <li class="nav-item"><a href="employer_update.php" class="nav-link" style="font-size: 22px;">Profile</a></li>
	          <li class="nav-item"><a href="postjobtable.php" class="nav-link" style="font-size: 22px;">Posted Jobs</a></li>
	          <li class="nav-item"><a href="list_of_job.php" class="nav-link" style="font-size: 22px;">Applied Jobs</a></li>
            
            <ul class="navbar-nav ml-auto">
  <li class="nav-item"><a href="postjob.php" class="btn-primary">Post a Job</a></li>
  <li class="nav-item" style="margin-left: 10px;"><a href="employer_logout.php" class="btn-danger">Log Out</a></li>
</ul>




</ul>

</div>
</div>
<li class="nav-item cta mr-md-2" style="margin-right: 30px;">
  <div style="display: flex; align-items: center;">
    <div style="margin-right: 10px;">
      <span style="font-weight: bold; font-size: 16px;">Welcome, Employer</span>
      <br>
      <span style="font-size: 14px;"><?php echo $_SESSION['cpnyname']; ?></span>
    </div>

      <div class="profile-picture-frame">
      <img src="<?php echo $logo; ?>" alt="Company Logo" class="profile-picture">
      </div>
    <!-- </div> -->
  </div>
</li>



	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/moon.jpg');" data-stellar-background-ratio="0.5">
    

    <div class="overlay"></div>
    <div class="container"> <br>
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
                 
                <p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="font-size: 14px;">
    We have <span class="number" data-number="850000">0</span> candidates all over the world !
</p>
<h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="font-size: 30px;">
    Find the best <br><span>Candidate as your choice</span>
</h1> 


                <div class="ftco-search" style="width: 80%; margin: 0 auto; margin-left: 5px;">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap">
                            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active mr-md-1"  id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Candidate Search</a>
                              

                            </div>
                        </div>
                        <div class="col-md-12 tab-wrap">
                            <div class="tab-content p-2" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="search-job">
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="icon"><span class="icon-briefcase"></span></div>
                                                        <input type="text" class="form-control" style="width: 170px; height: 30px; border-radius: 30px; " name="profession" placeholder="eg. Graphic/Web Developer">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                                        <div class="select-wrap">
                                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                            <select name="jobtype" class="form-control" style="width: px; height: 30px; border-radius: 30px;">
                                                                <option value="">Category</option>
                                                                <option value="FullTime">Full Time</option>
                                                                <option value="PartTime">Part Time</option>
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
                      
                                                        <input type="text" class="form-control" name="location" placeholder="Location" style="width: 130px; height: 30px; border-radius: 30px;">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-field">
                                      
                                                        <input type="submit" name="search" value="Search" class="btn btn-primary" style="width: 150px; height:45px; padding : 5px 0; font-size: 14px; margin-top:5px;">


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
              if(isset($_POST["search"])){
                $profession = $_POST["profession"];
                $jobtype = $_POST["jobtype"];
                $location = $_POST["location"];
              
                // Construct the search query
                $query = "SELECT * FROM jobseeker WHERE 1=1"; // Start with a valid condition
              
                if (!empty($profession)) {
                  $query .= " AND js_profession LIKE '%$profession%'";
                }
              
                if (!empty($jobtype)) {
                  $query .= " AND js_jobtype LIKE '%$jobtype%'";
                }
              
                if (!empty($location)) {
                  $query .= " AND js_country LIKE '%$location%'";
                }
              
                $result = mysqli_query($conn, $query);

                    // Display search results
                    if (mysqli_num_rows($result) > 0) {
                        // echo '<h2>Search Results</h2>';
                        echo '<h2 style="color: white; font-size: 35px;">Search Results</h2>';

                        // echo '<table border="1" cellpadding="10">';
                        // echo '<table border="1" cellpadding="10" style=" backdrop-filter: blur(5px); background-color: rgba(255, 255, 255, 0.5);;">';  Add the background color style
                        // echo '<table style="backdrop-filter: blur(5px); background-color: rgba(255, 255, 255, 0.5); border-collapse: collapse; border-radius: 10px;">'; 
                      echo '<table style="width: 130%; height: auto;; background-color: rgba(93, 63, 211, 0.5); border-collapse: collapse; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">';
                        // echo '<table style="width: 100%; text-align: center; border-collapse: collapse;">';
echo '<tr style="background-color: #0074d9; color: #fff;">';
echo '<th style="padding: 10px;">First name</th>';
echo '<th style="padding: 10px;">Last name</th>';
echo '<th style="padding: 10px;">Phone number</th>';
echo '<th style="padding: 10px;">Email</th>';
echo '<th style="padding: 10px;">Location</th>';
echo '<th style="padding: 10px;">Qualification</th>';
echo '<th style="padding: 10px;">Experience</th>';
echo '<th style="padding: 10px;">Profession</th>';
echo '<th style="padding: 10px;">Job Type</th>';
echo '<th style="padding: 10px;">Cv Download</th>';
echo '</tr>';

while ($row = mysqli_fetch_assoc($result)) {
    // echo '<tr>';
    echo '<tr style="text-align: center;">';
    echo "<td >{$row['js_fname']}</td>";
    echo "<td >{$row['js_lname']}</td>";
    echo "<td >{$row['js_ph']}</td>";
    echo "<td >{$row['js_email']}</td>";
    echo "<td >{$row['js_country']}</td>";
    echo "<td >{$row['js_qualification']}</td>";
    echo "<td >{$row['js_experience']}</td>";
    echo "<td >{$row['js_profession']}</td>";
    echo "<td >{$row['js_jobtype']}</td>";
    echo "<td ><a href='upload/{$row['cv']}' style='background-color: #0074d9; color: #fff; padding: 5px 10px; text-decoration: none; border-radius: 5px; display: inline-block;'>CV</a></td>";
    echo '</tr>';
}

echo '</table>';

// Next section content goes here

                        
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

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | workFinder
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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