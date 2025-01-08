<?php

if(isset($_POST["submit"])){

$con=mysqli_connect("localhost","root","","data_research");
// Check connection

if(mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$email = $_POST['email'];
$pswd = $_POST['pswd'];

$sql = "SELECT * FROM employer where email='" . $email . "' and password='" . $pswd . "'";

$result = mysqli_query($con,$sql);

$row = mysqli_fetch_array($result);

if($row==null)
{
  echo "Invalid id/password";
}elseif ($row['Status'] == 'Not Approved') {
    echo "Your account has not been approved yet. Please wait for approval.";
}else
{
    //check wheather the employer has approved or not

    session_start();    
	$_SESSION['email'] = $row['email'];
	$_SESSION['cpnyname'] = $row['empe_cpny'];
	$_SESSION['logo'] = $row['cpny_logo'];

    


	header( 'Location: employer_homepage.php' ) ;
}
mysqli_close($con);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Employer Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<style>
		/* body {
            background: -webkit-linear-gradient(left, #a445b2, #fa4299);
		} */
        body {
            background-image: url('images/moon.jpg'); /* Replace 'path-to-your-image.jpg' with the actual path to your background image */
            background-size: cover; /* Cover the entire viewport */
            background-repeat: no-repeat; /* Prevent image from repeating */
            background-attachment: fixed; /* Keep the image fixed while scrolling */
        }
        .card{
            box-shadow: 5px 5px 15px black;
        }
	</style>
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-9"> <!-- Reduced the width of the form -->
					<div class="text-center my-5">
						<!-- <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100"> -->
					</div>
					<div class="card">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
										<a href="" class="float-end">
											Forgot Password?
										</a>
									</div>
									<input id="password" type="password" class="form-control" name="pswd" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Remember Me</label>
									</div>
									<button type="submit" name="submit" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="employer_register.php" class="text-dark">Create One</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5">
						Copyright &copy;2023  &mdash; workFinder
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>

