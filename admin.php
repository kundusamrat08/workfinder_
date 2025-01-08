<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin'])) {
    // Redirect back to the login page
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>
    body {
    background-image: url('images/admin_panel.jpg'); /* Replace 'path-to-your-image.jpg' with the actual path to your background image */
    background-size: cover; /* Cover the entire viewport */
    background-repeat: no-repeat; /* Prevent image from repeating */
    background-attachment: fixed; /* Keep the image fixed while scrolling */
}
</style>

<body>
    <div class="container">
        <h1 class="mt-5" style="color: white;">Welcome, Admin</h1>

        <!-- Logout button -->
        <form method="post" action="admin_logout.php">
            <button type="submit" name="logout" class="btn btn-danger mt-3">Logout</button>
        </form>

        <!-- Button group to toggle tables -->
        <div class="btn-group mt-3" role="group">
            <button id="toggleEmployerTable" class="btn btn-secondary">View Employer Table</button>
            <button id="togglePostedJobsTable" class="btn btn-secondary">View Posted Jobs</button>
            <button id="toggleJobSeekerTable" class="btn btn-secondary">View Job Seeker Information</button>
        </div>

        <!-- Employer table container (hidden by default) -->
        <div id="employerTableContainer" class="table-container mt-3" style="display: none;">
            <?php include("admin_table.php"); ?>
        </div>

        <!-- Posted jobs table container (hidden by default) -->
        <div id="postedJobsTableContainer" class="table-container mt-3" style="display: none;">
            <?php include("admin_posted_jobs.php"); ?>
        </div>

        <!-- Job Seeker Information table container (hidden by default) -->
        <div id="jobSeekerTableContainer" class="table-container mt-3" style="display: none;">
            <?php include("js_display.php"); ?>
        </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js (optional) if needed -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript to toggle table visibility -->
    <script>
        document.getElementById("toggleEmployerTable").addEventListener("click", function () {
            toggleTable("employerTableContainer");
        });

        document.getElementById("togglePostedJobsTable").addEventListener("click", function () {
            toggleTable("postedJobsTableContainer");
        });

        document.getElementById("toggleJobSeekerTable").addEventListener("click", function () {
            toggleTable("jobSeekerTableContainer");
        });

        function toggleTable(tableId) {
            // Get the selected table container
            var tableContainer = document.getElementById(tableId);

            // Check if the selected table container is already visible
            var isVisible = tableContainer.style.display === "block";

            // Hide all table containers
            var allTableContainers = document.querySelectorAll(".table-container");
            allTableContainers.forEach(function (container) {
                container.style.display = "none";
            });

            // If the selected table container was not visible, show it; otherwise, hide it
            if (!isVisible) {
                tableContainer.style.display = "block";
            }
        }
    </script>
</body>
</html>
