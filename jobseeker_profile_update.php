
<?php
session_start();
require 'connection.php';

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: employee_login.php');
    exit();
}

$email = $_SESSION['email'];

// Fetch the user's information from the database
$query = "SELECT * FROM jobseeker WHERE js_email = '$email'";
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
    $newdateofbirth = $_POST["dob"];
    $newgender = $_POST["gender"];
    $newcountry = $_POST["country"];
    $newlanguage = isset($_POST["language"]) ? implode(',', $_POST["language"]) : "";
    $newqualification = $_POST["Qualification"];
    $newexperience = $_POST["experience"];
    $newprofession = $_POST["profession"];
    $newjobtype = $_POST["jobtype"];

    // Handle CV file upload
    if (!empty($_FILES['cvupload']['name'])) {
        $cvFileName = $_FILES['cvupload']['name'];
        $cvTempPath = $_FILES['cvupload']['tmp_name'];
        $cvUploadPath = 'upload/' . $cvFileName; // Using the "upload" folder

        if (move_uploaded_file($cvTempPath, $cvUploadPath)) {
            // Update the CV field in the database
            $updateCvQuery = "UPDATE jobseeker SET cv = '$cvFileName' WHERE js_email = '$email'";
            $updateCvResult = mysqli_query($conn, $updateCvQuery);

            if (!$updateCvResult) {
                echo "CV update failed: " . mysqli_error($conn);
            }
        } else {
            echo "CV upload failed.";
        }
    }

    // Handle profile picture upload
    if (!empty($_FILES['profilePicture']['name'])) {
        $profilePictureFileName = $_FILES['profilePicture']['name'];
        $profilePictureTempPath = $_FILES['profilePicture']['tmp_name'];
        $profilePictureUploadPath = 'upload/' . $profilePictureFileName;

        if (move_uploaded_file($profilePictureTempPath, $profilePictureUploadPath)) {
            // Update the profilePicture field in the database
            $updateProfilePictureQuery = "UPDATE jobseeker SET profilePicture = '$profilePictureUploadPath' WHERE js_email = '$email'";
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
        $deleteQuery = "DELETE FROM jobseeker WHERE js_email = '$email'";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
            // Redirect to the login page after successful deletion
            session_destroy(); // Destroy the session
            header('Location: homepage.php');
            exit();
        } else {
            echo "Delete failed: " . mysqli_error($conn);
        }
    }

    // Update the database with the new information
    $updateQuery = "UPDATE jobseeker SET
        js_fname = '$newFirname',
        js_lname = '$newLstname',
        js_ph = '$newphno',
        -- js_email = '$newemail',
        js_password = '$newpassword',
        js_dob = '$newdateofbirth',
        gender = '$newgender',
        js_country = '$newcountry',
        js_language = '$newlanguage',
        js_qualification = '$newqualification',
        js_experience = '$newexperience',
        js_profession = '$newprofession',
        js_jobtype = '$newjobtype'
    WHERE js_email = '$email'";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Redirect back to the profile page after successful update
        header('Location: jobseeker_profile_update.php');
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
    <a class="navbar-brand" href="index1.php" style="font-size: 44px; color: white; font-weight: bold;">workFinder</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item active" style="margin-left: -200px;"> <!-- Adjust margin-left as needed -->
            <a class="nav-link text-center" href="employee_homepage.php" style="font-size: 25px;">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="#" style="font-size: 25px;">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" href="#" style="font-size: 25px;">Services</a>
        </li>
    </ul>
</div>


        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <!-- <a class="nav-link text-center btn btn-danger" href="#">Logout</a> -->
                <a class="nav-link text-center btn btn-danger large-button"  href="employee_logout.php" onclick="return confirm('Are you sure you want to logout your profile? This action cannot be undone.')">Logout</a>


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
        <?php if (!empty($row['profilePicture'])) { ?>
            <img id="profilePreview" src="<?php echo $row['profilePicture']; ?>" width="100" height="100" alt="Current Profile Picture">
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
            <input type="text" class="form-control" id="firname" name="firname" value="<?php echo $row['js_fname']; ?>">
        </div>
        <div class="col-md-6">
            <label for="lstname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lstname" name="lstname" value="<?php echo $row['js_lname']; ?>" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $row['js_ph']; ?>">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['js_email']; ?>" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['js_password']; ?>">
        </div>
        <div class="col-md-6">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['js_dob']; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="country" class="form-label">Country</label>
            <select class="form-control" name="country" id="country">
            <option value="India" <?php if ($row['js_country'] === 'India') echo 'selected'; ?>>India</option>
            <option value="USA" <?php if ($row['js_country'] === 'USA') echo 'selected'; ?>>USA</option>
            <option value="Russia" <?php if ($row['js_country'] === 'Russia') echo 'selected'; ?>>Russia</option>
            <option value="Afghanistan" <?php if ($row['js_country'] === 'Afghanistan') echo 'selected'; ?>>Afghanistan</option>
            <option value="Argentina" <?php if ($row['js_country'] === 'Argentina') echo 'selected'; ?>>Argentina</option>
            <option value="Australia" <?php if ($row['js_country'] === 'Australia') echo 'selected'; ?>>Australia</option>
            <option value="Belgium" <?php if ($row['js_country'] === 'Belgium') echo 'selected'; ?>>Belgium</option>
            <option value="Brazil" <?php if ($row['js_country'] === 'Brazil') echo 'selected'; ?>>Brazil</option>
            <option value="Canada" <?php if ($row['js_country'] === 'Canada') echo 'selected'; ?>>Canada</option>
            <option value="Chile" <?php if ($row['js_country'] === 'Chile') echo 'selected'; ?>>Chile</option>
            <option value="Colombia" <?php if ($row['js_country'] === 'Colombia') echo 'selected'; ?>>Colombia</option>
            <option value="France" <?php if ($row['js_country'] === 'France') echo 'selected'; ?>>France</option>
<!-- Add more countries here with the same pattern -->
            </select>
        </div>
        <div class="col-md-6">
        <label for="language" class="form-label">Language</label><br>
        <input type="checkbox" name="language[]" value="English" <?php if(in_array('English', explode(',', $row['js_language']))) echo 'checked'; ?>> English<br>
        <input type="checkbox" name="language[]" value="Hindi" <?php if(in_array('Hindi', explode(',', $row['js_language']))) echo 'checked'; ?>> Hindi<br>
        <input type="checkbox" name="language[]" value="Bengali" <?php if(in_array('Bengali', explode(',', $row['js_language']))) echo 'checked'; ?>> Bengali<br>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="Qualification" class="form-label">Qualification</label>
            <select class="form-control" name="Qualification" id="Qualification">
            <option value="Higher Secondary" <?php if($row['js_qualification'] === 'Higher Secondary') echo 'selected'; ?>>Higher Secondary</option>
            <option value="Bachelors Degree" <?php if($row['js_qualification'] === 'Bachelors Degree') echo 'selected'; ?>>Bachelors Degree</option>
            <option value="Masters Degree" <?php if($row['js_qualification'] === 'Masters Degree') echo 'selected'; ?>>Masters Degree</option>
            <option value="PhD" <?php if($row['js_qualification'] === 'PhD') echo 'selected'; ?>>PhD</option>
                <!-- Add more options for other qualifications -->
            </select>
        </div>
        <div class="col-md-6">
            <label for="experience" class="form-label">Experience</label>
            <select class="form-control" name="experience" id="experience">
            <option value="freshers" <?php if($row['js_experience'] === 'freshers') echo 'selected'; ?>>Freshers</option>
            <option value="1year" <?php if($row['js_experience'] === '1year') echo 'selected'; ?>>1 Year</option>
            <option value="2years" <?php if($row['js_experience'] === '2years') echo 'selected'; ?>>2 Years</option>
            <option value="3years" <?php if($row['js_experience'] === '3years') echo 'selected'; ?>>3 Years</option>
            <option value="4years" <?php if($row['js_experience'] === '4years') echo 'selected'; ?>>4 Years</option>
            <option value="5years and above" <?php if($row['js_experience'] === '5years and above') echo 'selected'; ?>>5 Years and above</option>
                <!-- Add more options for other experience levels -->
            </select>
        </div>
        </div>
        
        <div class="row mb-3">
        <div class="col-md-6">
        <label for="profession" class="form-label">Profession</label>
        <input type="text" class="form-control" name="profession" value="<?php echo $row['js_profession']; ?>">
    </div>
        <div class="col-md-6">
            <label for="jobtype" class="form-label">Job Type</label>
            <select class="form-control" name="jobtype" id="jobtype">
            <option value="parttime" <?php if($row['js_jobtype'] === 'parttime') echo 'selected'; ?>>Part Time</option>
            <option value="fulltime" <?php if($row['js_jobtype'] === 'fulltime') echo 'selected'; ?>>Full Time</option>
            <option value="freelance" <?php if($row['js_jobtype'] === 'freelance') echo 'selected'; ?>>Freelance</option>
            <option value="internship" <?php if($row['js_jobtype'] === 'internship') echo 'selected'; ?>>Internship</option>
            <option value="temporary" <?php if($row['js_jobtype'] === 'temporary') echo 'selected'; ?>>Temporary</option>
            </select>
        </div>
    </div>
    


<div class="col-md-12">
    <label for="cvupload" class="form-label">Upload Your CV</label>
    <input type="file" class="form-control" name="cvupload" id="cvupload">
    <?php if (!empty($row['cv'])) { ?>
        <div class="mt-2">
            <!-- Display the currently stored CV file name if available -->
            <?php echo 'Current CV File: ' . basename($row['cv']); ?>
        </div>
    <?php } ?>
    <div class="invalid-feedback">
        Please upload your CV.
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
