
<?php
session_start();
require 'connection.php';

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: employer_login.php');
    exit();
}

$email = $_SESSION['email'];
// $companyname = $_SESSION['cpnyname'];

// Fetch the user's information from the database
$query = "SELECT * FROM employer WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

// Handle form submission for updating profile
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect updated data from the form
    $newFirname = $_POST["firname"];
    $newLstname = $_POST["lstname"];
    $newphno = $_POST["phone"];
    // $newemail = $_POST["email"];
    $newpassword = $_POST["password"];
    $newcountry = $_POST["country"];
    $newEmpeCpny = $_POST["empcpny"];
    $newCpnyEmail = $_POST["cpnyemail"];
    $newcpnyph = $_POST["cpnyph"];
    $newCpnyAdd = $_POST["cpnyadd"];

    // Handle CV file upload

    // Handle profile picture upload
    // Handle profile picture upload
if (!empty($_FILES['profilePicture']['name'])) {
    $profilePictureFileName = $_FILES['profilePicture']['name'];
    $profilePictureTempPath = $_FILES['profilePicture']['tmp_name'];
    $profilePictureUploadPath = 'upload/' . $profilePictureFileName;

    if (move_uploaded_file($profilePictureTempPath, $profilePictureUploadPath)) {
        // Update the cpny_logo field in the database
        $updateProfilePictureQuery = "UPDATE employer SET cpny_logo = '$profilePictureUploadPath' WHERE email = '$email'";
        $updateProfilePictureResult = mysqli_query($conn, $updateProfilePictureQuery);

        if (!$updateProfilePictureResult) {
            echo "Profile picture update failed: " . mysqli_error($conn);
        }
    } else {
        echo "Profile picture upload failed.";
    }
}

    

    // Check if the "Delete Profile" button is clicked
    if (isset($_POST['delete'])) {
        // Delete the user's information from the database
        $deleteQuery = "DELETE FROM employer WHERE email = '$email'";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
            // Redirect to the login page after successful deletion
            session_destroy(); // Destroy the session
            header('Location: index1.php');
            exit();
        } else {
            echo "Delete failed: " . mysqli_error($conn);
        }
    }

    // Update the database with the new information
    $updateQuery = "UPDATE employer SET
    first_name = '$newFirname',
    last_name = '$newLstname',
    phon_number = '$newphno',
    -- email = '$newemail',
    password = '$newpassword',
    country = '$newcountry',
    empe_cpny = '$newEmpeCpny',
    cpny_email = '$newCpnyEmail',
    cpny_ph = '$newcpnyph',
    cpny_add = '$newCpnyAdd'
WHERE email = '$email'";


    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Redirect back to the profile page after successful update
        header('Location: employer_update.php');
        exit();
    } else {
        echo "Update failed: " . mysqli_error($conn);
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
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/profile_picture.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
        background-image: url('images/moon.jpg'); 
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.5); /* Semi-transparent white background for the entire card */
    }

    .container {
        max-width: 9000px;
    }

    .form-control {
        background-color: rgba(255, 255, 255, 0.3); /* More transparent white background for input boxes */
        border: 2px solid #ccc;
        border-radius: 5px;
        box-shadow: none;
        padding: 6px 10px;
    }

    .form-box {
        /* border: 1px solid #ccc; */
        padding: 20px; /* Adjust the padding to reduce the form height */
        border-radius: 10px;
        width: 100%;
    }
/* Custom CSS for the navbar */
.navbar {
    background-color: transparent; /* Change the background color to your preferred color */
}

.navbar-toggler-icon {
    background-color: #fff; /* Change the color of the hamburger icon */
}

.nav-link {
    color: #fff !important; /* Change the link text color to white */
}

.nav-link:hover {
    color: #ccc !important; /* Change the link text color on hover */
}
.professional-text {
        font-size: 18px;
        font-weight: bold;
        color: #333; /* You can adjust the color to your preference */
    }
    /* custom.css */
.large-button {
    padding: 12px 24px; /* Adjust padding to make the button bigger */
    font-size: 18px; /* Adjust font size to make the text larger */
}


</style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
    <a class="navbar-brand" href="employer_homepage.php" style="font-size: 44px; color: white; font-weight: bold;">workFinder</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item active" style="margin-left: -200px;"> <!-- Adjust margin-left as needed -->
            <a class="nav-link text-center" href="employer_homepage.php" style="font-size: 25px;">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="about.php" style="font-size: 25px;">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="#" style="font-size: 25px;">Services</a>
        </li>
    </ul>
</div>


        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-center btn btn-danger large-button"  href="employer_logout.php" onclick="return confirm('Are you sure you want to logout your profile? This action cannot be undone.')">Logout</a>


            </li>
        </ul>
    </div>
</nav>
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
           
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9" style="margin-top: 50px; margin-bottom: 50px; border-radius: 30px;">
                <div class="card border-0">
                    <div class="card-body p-1">
                       
                    <div class="form-box">
                    <form method="POST" class="needs-validation" novalidate="" autocomplete="off" enctype="multipart/form-data">
    <h1 class="fs-2 card-title fw-bold mb-4 text-center">Edit Profile</h1>
    <div class="upload">
        <?php if (!empty($row['cpny_logo'])) { ?>
            <img id="profilePreview" src="<?php echo $row['cpny_logo']; ?>" width="100" height="100" alt="Current Logo">
        <?php } else { ?>
            <img id="profilePreview" src="" width="100" height="100" alt="">
        <?php } ?>
        <div class="round">
            <input type="file" class="form-control-file" name="profilePicture" id="profilePictureInput" onchange="previewProfilePicture(this);">
            <i class="fa fa-camera" style="color: #fff;"></i>
        </div>
    </div>
    <br>   

    <script>
        function previewProfilePicture(input) {
            var previewImage = document.getElementById('profilePreview');
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



    <div class="row mb-3">
        <div class="col-md-6">
            <label for="firname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firname" name="firname" value="<?php echo $row['first_name']; ?>">
            <div class="invalid-feedback">
                Please provide your first name.
            </div>
        </div>
        <div class="col-md-6">
            <label for="lstname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lstname" name="lstname" value="<?php echo $row['last_name']; ?>" required>
            <div class="invalid-feedback">
                Please provide your last name.
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phon_number']; ?>">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>">
        </div>
        
        <div class="col-md-6">
            <label for="country" class="form-label">Country</label>
            <select class="form-control" name="country" id="country">
            <option value="India" <?php if ($row['country'] === 'India') echo 'selected'; ?>>India</option>
            <option value="USA" <?php if ($row['country'] === 'USA') echo 'selected'; ?>>USA</option>
            <option value="Russia" <?php if ($row['country'] === 'Russia') echo 'selected'; ?>>Russia</option>
            <option value="Afghanistan" <?php if ($row['country'] === 'Afghanistan') echo 'selected'; ?>>Afghanistan</option>
            <option value="Argentina" <?php if ($row['jsuntry'] === 'Argentina') echo 'selected'; ?>>Argentina</option>
            <option value="Australia" <?php if ($row['country'] === 'Australia') echo 'selected'; ?>>Australia</option>
            <option value="Belgium" <?php if ($row['country'] === 'Belgium') echo 'selected'; ?>>Belgium</option>
            <option value="Brazil" <?php if ($row['country'] === 'Brazil') echo 'selected'; ?>>Brazil</option>
            <option value="Canada" <?php if ($row['country'] === 'Canada') echo 'selected'; ?>>Canada</option>
            <option value="Chile" <?php if ($row['country'] === 'Chile') echo 'selected'; ?>>Chile</option>
            <option value="Colombia" <?php if ($row['country'] === 'Colombia') echo 'selected'; ?>>Colombia</option>
            <option value="France" <?php if ($row['country'] === 'France') echo 'selected'; ?>>France</option>
<!-- Add more countries here with the same pattern -->

            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="Qualification" class="form-label">Compnay</label>
            <input type="text" class="form-control" id="empcpny" name="empcpny" value="<?php echo $row['empe_cpny']; ?>">
          
        </div>
    
        <div class="col-md-6">
            <label for="experience" class="form-label">Company Email</label>
            <input type="email" class="form-control" id="cpnyemail" name="cpnyemail" value="<?php echo $row['cpny_email']; ?>">
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="cpnyph" class="form-label">Company Phone </label>
            <input type="number" class="form-control" id="cpnyph" name="cpnyph" value="<?php echo $row['cpny_ph']; ?>">
           
        </div>
<div class="col-md-6">
    <label for="cpnyadd" class="form-label">Company Address</label>
    <input type="text" class="form-control" id="cpnyadd" name="cpnyadd" value="<?php echo $row['cpny_add']; ?>">
</div>
    </div>




<!-- JavaScript to display the selected PDF file name -->
<script>
    document.getElementById('cvupload').addEventListener('change', function (event) {
        const input = event.target;
        const fileNameDisplay = document.getElementById('selectedFileName');

        if (input.files.length > 0) {
            const fileName = input.files[0].name;
            fileNameDisplay.textContent = 'Selected File: ' + fileName;
        } else {
            fileNameDisplay.textContent = '';
        }
    });
</script>

<!-- Display the selected file name -->
<div id="selectedFileName"></div>
    
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">Update Profile</button>
        <button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your profile? This action cannot be undone.')">Delete Profile</button>
    </div>
</form>

<script src="js/login.js"></script>
</section>
</body>
</html>
