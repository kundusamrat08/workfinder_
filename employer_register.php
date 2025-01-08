<?php
require 'connection.php';
$firname = $lstname = $phno = $email = $pswd = $country = $empcpny = $cpny_email = $cpny_ph = $cpnyadd = $logo = '';

if(isset($_POST["submit"])){
  $firname = $_POST["firname"];
  $lstname = $_POST["lstname"];
  $phno = $_POST["phno"];
  $email = $_POST["email"];
  $pswd = $_POST["pswd"];
  $country = $_POST["country"];
  $empcpny = $_POST["empcpny"];
  $cpny_email = $_POST["cpnyemail"];
  $cpny_ph = $_POST["cpnyph"];
  $cpnyadd = $_POST["cpnyadd"];
  $logo = $_FILES["logo"]['name'];

  $query = "INSERT INTO employer VALUES('$firname', '$lstname','$phno', '$email', '$pswd','$country', '$empcpny','$cpny_email', '$cpny_ph','$cpnyadd','$logo','Not Approved')";
  $query_run=mysqli_query($conn,$query);
  if($query_run)
  {
    move_uploaded_file($_FILES["logo"]["tmp_name"], "upload/" .$_FILES["logo"]["name"]);
    header("location: employer_login.php");
  }
  else {
    header("location: employer_login.php"); 
  }
  // echo "<script> alert('Register Successfully'); </script>";
  
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
            background-image: url('images/bc.png'); /* Replace 'path-to-your-image.jpg' with the actual path to your background image */
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
        .custom-form-container {
        margin-left: 440px; /* Adjust the margin as needed */
    }
    .content{
        margin-left: 100px; /* Adjust the margin as needed */

    }
    .custom-form-container.my-form-box {
        margin-left: 421px; /* Adjust the left margin as needed */
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
        
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9  custom-form-container my-form-box">
                <div class="card border-0 ">
                    <div class="card-body p-5">
                       
                        <div class="form-box">
                        <form method="POST" class="needs-validation" novalidate="" autocomplete="off" enctype="multipart/form-data">
                            <div class="row mb-3">
                            <h1 class="fs-2 card-title fw-bold mb-4" class=""> Employer Register</h1>
                                <div class="col-md-6">
                                    <label class="mb-2" for="firname">First Name</label>
                                    <input id="name" type="text" class="form-control" name="firname" placeholder="Enter your first name" value="<?php echo  $firname; ?>" required>
                                    <div class="invalid-feedback">
                                        First Name is required
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2" for="lstname">Last Name</label>
                                    <input id="name" type="text" class="form-control" name="lstname" placeholder="Enter your last name" value="<?php echo $lstname; ?>" required>
                                    <div class="invalid-feedback">
                                        Last Name is required
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2" for="firname">Phone</label>
                                    <input id="name" type="text" class="form-control" name="phno" placeholder="Enter your phone number" value="<?php echo  $phno; ?>" required>
                                    <div class="invalid-feedback">
                                        Phone Number is required
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2" for="lstname">Email</label>
                                    <input id="name" type="email" class="form-control" name="email" placeholder="Enter your last name" value="<?php echo $email; ?>" required>
                                    <div class="invalid-feedback">
                                        Email is required
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2" for="firname">Password</label>
                                    <input id="name" type="password" class="form-control" name="pswd" placeholder="Enter your Password" value="<?php echo  $pswd; ?>" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2" for="lstname">Country</label>
                                    <!-- <input id="name" type="text" class="form-control" name="country" value="<?php echo $lstname; ?>" required> -->
                                    <select class="form-control" name="country" id="name">
                                    <option class="mb-2 text-muted" value="">Select Country</option>
                                    <option class="mb-2 text-muted" value="India" <?php echo ($country == 'India') ? 'selected' : ''; ?>>India</option>
                                    <option class="mb-2 text-muted" value="USA" <?php echo ($country == 'USA') ? 'selected' : ''; ?>>USA</option>
                                    <option class="mb-2 text-muted" value="Russia" <?php echo ($country == 'Russia') ? 'selected' : ''; ?>>Russia</option> 
                                    <option class="mb-2 text-muted" value="Afghanistan" <?php echo ($country == 'Afghanistan') ? 'selected' : ''; ?>>Afghanistan</option>
                                    <option class="mb-2 text-muted" value="Argentina" <?php echo ($country == 'Argentina') ? 'selected' : ''; ?>>Argentina</option>
                                    <option class="mb-2 text-muted" value="Australia" <?php echo ($country == 'Australia') ? 'selected' : ''; ?>>Australia</option>
                                    <option class="mb-2 text-muted" value="Belgium" <?php echo ($country == 'Belgium') ? 'selected' : ''; ?>>Belgium</option>
                                    <option class="mb-2 text-muted" value="Brazil" <?php echo ($country == 'Brazil') ? 'selected' : ''; ?>>Brazil</option>
                                    <option class="mb-2 text-muted" value="Canada" <?php echo ($country == 'Canada') ? 'selected' : ''; ?>>Canada</option>
                                    <option class="mb-2 text-muted" value="Chile" <?php echo ($country == 'Chile') ? 'selected' : ''; ?>>Canada</option>
                                    <option class="mb-2 text-muted" value="Canada" <?php echo ($country == 'Canada') ? 'selected' : ''; ?>>Canada</option>
                                    <option class="mb-2 text-muted" value="Colombia" <?php echo ($country == 'Colombia') ? 'selected' : ''; ?>>Colombia</option>
                                    <option class="mb-2 text-muted" value="France" <?php echo ($country == '    France') ? 'selected' : ''; ?>>France</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Last Name is required
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2" for="firname">Company</label>
                                    <input id="name" type="text" class="form-control" name="empcpny" placeholder="Enter your company name" value="<?php echo  $empcpny; ?>" required>
                                    <div class="invalid-feedback">
                                        company Name is required
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2" for="lstname">Company email</label>
                                    <input id="name" type="email" class="form-control" name="cpnyemail" placeholder="Enter your last name" value="<?php echo $cpny_email; ?>" required>
                                    <div class="invalid-feedback">
                                        Compnay email is required
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="mb-2" for="firname">Company Phone</label>
                                    <input id="name" type="text" class="form-control" name="cpnyph" placeholder="Enter your comany email" value="<?php echo  $cpny_ph; ?>" required>
                                    <div class="invalid-feedback">
                                        company phone Number is required
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-2" for="lstname">Compnay Address</label>
                                    <input id="name" type="text" class="form-control" name="cpnyadd" placeholder="Enter your last name" value="<?php echo $cpnyadd; ?>" required>
                                    <div class="invalid-feedback">
                                    Compnay Address is required
                                    </div>
                                </div>
                            </div>

                           
                                
                                <div class="col-md-13">
                                    <label class="mb-2" for="email">Compnay Logo</label>
                                    <input id="name" type="file" class="form-control" name="logo" value="<?php echo $logo; ?>" required>
                                    <div class="invalid-feedback">
                                        Profile picture is invalid
                                    </div>
                                    <br>
                                    <button type="submit" name="submit" class="btn btn-success" style="width: 397px; margin left:30px;">Register</button><br><br>

                            </div>
        
                            
                                <div class="d-flex content">
                                    <div class="mr-5">
                                        <p class="mb-0 font-weight-bold text-black">Already have an account?</p>
                                    </div>
                                   
                                    <a href="employer_login.php" class="" style="width: 100px;">Login</a>
                                </div>
                                
                         </form>   
                         </div>

                    </div>
                </div>
            </div>
        
    </div>
</section>

<script src="js/login.js"></script>
</body>
</html>
