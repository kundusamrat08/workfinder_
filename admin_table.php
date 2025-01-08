<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Employer Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    $con = mysqli_connect("localhost", "root", "", "data_research");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        $sql = "UPDATE employer SET Status='Approved' WHERE email='" . $email . "'";
        mysqli_query($con, $sql);
        echo "Successfully Approved<br>";
    }

    $result = mysqli_query($con, "SELECT * FROM employer");
    echo "<div class='container'>";
    echo "<h1 class='mt-4' style='color: white;'>Employer Table</h1>";
    echo "<table class='table table-bordered table-striped mt-4'>
        <thead class='bg-dark text-white'>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Country</th>
                <th>Company Name</th>
                <th>Company Email</th>
                <th>Company Phone No</th>
                <th>Company Address</th>
                <th>Company Logo</th>
                <th>Status</th>
            </tr>
        </thead>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['phon_number'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['country'] . "</td>";
        echo "<td>" . $row['empe_cpny'] . "</td>";
        echo "<td>" . $row['cpny_email'] . "</td>";
        echo "<td>" . $row['cpny_ph'] . "</td>";
        echo "<td>" . $row['cpny_add'] . "</td>";
        echo "<td><img src='upload/" . $row['cpny_logo'] . "' width='50' height='50'></td>";

        if ($row['Status'] == 'Not Approved') {
            echo "<td>
                    <form method='GET'>
                        <input type='hidden' name='email' value='" . $row['email'] . "'>
                        <button type='submit' class='btn btn-success' name='approve'>Approve</button>
                    </form>
                  </td>";
        } else {
            echo "<td class='approved-status'>Approved</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    mysqli_close($con);
    ?>

    <!-- Add Bootstrap JS and jQuery (optional) if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
