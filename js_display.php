<?php
// session_start();
require 'connection.php';

// Fetch job seeker data from the database
$query = "SELECT * FROM jobseeker";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker Information</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Job Seeker Information</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>Languages</th>
                    <th>Qualification</th>
                    <th>Experience</th>
                    <th>Profession</th>
                    <th>Job Type</th>
                    <th>CV</th>
                    <th>Profile Picture</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $counter = 1; // Add a counter for row numbering
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$counter}</td>"; // Display a row number
                    echo "<td>{$row['js_fname']}</td>";
                    echo "<td>{$row['js_lname']}</td>";
                    echo "<td>{$row['js_ph']}</td>";
                    echo "<td>{$row['js_email']}</td>";
                    echo "<td>{$row['js_dob']}</td>";
                    echo "<td>{$row['gender']}</td>";
                    echo "<td>{$row['js_country']}</td>";
                    echo "<td>{$row['js_language']}</td>";
                    echo "<td>{$row['js_qualification']}</td>";
                    echo "<td>{$row['js_experience']}</td>";
                    echo "<td>{$row['js_profession']}</td>";
                    echo "<td>{$row['js_jobtype']}</td>";
                    echo "<td><a href='{$row['cv']}' target='_blank'>View CV</a></td>";
                    echo "<td><img src='{$row['profilePicture']}' alt='Profile Picture' width='100'></td>";
                    echo "</tr>";
                    $counter++; // Increment the counter
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JS and Popper.js (optional) if needed -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
