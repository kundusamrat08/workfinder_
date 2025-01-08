<?php
require 'connection.php'; // Include the database connection file

// Fetch all posted jobs
$query = "SELECT * FROM job";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Posted Jobs</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Optional custom CSS (if needed) -->
    <link rel="stylesheet" href="custom.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Posted Jobs</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Company Name</th>
                    <th>Job Type</th>
                    <th>Experience</th>
                    <th>Location</th>
                    <th>Salary</th>
                    <th>Job Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['job_title']}</td>";
                    echo "<td>{$row['cpny_name']}</td>";
                    echo "<td>{$row['job_type']}</td>";
                    echo "<td>{$row['experience']}</td>";
                    echo "<td>{$row['location']}</td>";
                    echo "<td>{$row['salary']}</td>";
                    echo "<td>{$row['job_description']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JS and Popper.js (optional) if needed -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
