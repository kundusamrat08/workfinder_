<?php
session_start();
require 'connection.php'; // Include the database connection file

// Check if the user is logged in and is an employer
if (!isset($_SESSION['email']) || !isset($_SESSION['cpnyname'])) {
    header("Location: employer_login.php"); // Redirect to the login page if not logged in or missing cpnyname
    exit();
}

// Fetch the company name of the logged-in employer
$companyname = $_SESSION['cpnyname'];

// Fetch all job applications for the logged-in employer's posted jobs
$query = "SELECT ja.* 
          FROM job_application ja
          JOIN job jp ON ja.job_id = jp.id
          WHERE jp.cpny_name = '$companyname'";

$result = mysqli_query($conn, $query);

$email = $_SESSION['email'];

// Query to fetch the company logo for the logged-in employer
$logoQuery = "SELECT cpny_logo FROM employer WHERE email = '$email'";
$logoResult = mysqli_query($conn, $logoQuery);

if ($logoResult && mysqli_num_rows($logoResult) > 0) {
    $row = mysqli_fetch_assoc($logoResult);
    $profilePicturePath = $row['cpny_logo'];
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Posted Jobs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/moon.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-color: #f0f0f0; /* Fallback color for older browsers */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }

        .container {
    background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background */
    padding: 20px;
    border-radius: 10px;
    margin-top: 100px;
    max-width: 1000px;
}


        h1 {
            color: #007acc; /* Blue title color */
            text-align: center; /* Center the title */
        }

        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto; /* Center the table horizontally */
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007acc;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Add hover effect to table rows */
        tr:hover {
            background-color: #cce6ff;
        }
        /* Customize the navbar background color */
.navbar {
    background-color: #007acc;
}

/* Style the navbar toggler icon color */
.navbar-toggler-icon {
    background-color: #fff;
}

/* Style the navbar links */
.navbar-nav .nav-link {
    color: #fff; /* Text color */
    padding: 10px 20px; /* Adjust padding as needed */
    font-weight: bold; /* Font weight */
    text-transform: uppercase; /* Uppercase text */
    transition: color 0.3s; /* Smooth color transition on hover */
}

/* Style the navbar links on hover */
.navbar-nav .nav-link:hover {
    color: #ccc; /* Text color on hover */
}

/* Center the navbar links horizontally */
.navbar-nav {
    margin-left: auto;
}

/* Center the brand/logo in the middle of the navbar */
.navbar-brand {
    margin-left: auto;
    margin-right: auto;
}
.nav-link {
        color: white; /* Default text color */
    }

    .nav-link:hover {
        color: #007bff; /* Text color on hover */
        background-color: #f8f9fa; /* Background color on hover */
    }

    .nav-link:focus,
    .nav-link:active {
        color: #007bff; /* Text color when active */
        background-color: #f8f9fa; /* Background color when active */
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
<nav style="background-color: transparent" class="navbar">
    <!-- <a class="navbar-brand" href="">workFinder</a> -->
    <a class="navbar-brand" href="employer_homepage.php" style="font-weight: bold; color: white; font-size: 35px;">workFinder</a>


    <div style="margin: 0 auto;">
        <ul style="list-style: none; padding-right: 80px; display: flex; justify-content: center; font-size: 20px;">
            <li style="margin-right: 20px;">
                <a class="nav-link" href="employer_homepage.php">Home</a>
            </li>
            <li style="margin-right: 20px;">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li>
                <a class="nav-link" href="postjob.php">Post Job</a>
            </li>
            <li>
                <a class="nav-link" href="postjobtable.php">Posted Jobs</a>
            </li>
        </ul>
    </div>
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


<div class="container">
    <h1>List of Job Applications</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th>Id</th>
            <th>Employee Id</th>
            <th>Job ID</th>
            <th>Apply Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
           while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['js_id']}</td>";
            echo "<td>{$row['job_id']}</td>";
            echo "<td>{$row['apply_date']}</td>";
            echo "</tr>";   
        }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
