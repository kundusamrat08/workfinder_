<?php

// require 'connection.php';


// session_start();
// $js_id = $_SESSION['email']; 
// $j_id = $_GET['job_id'];
// $cd = date('m-d-y');

// $sql = "INSERT INTO job_application (js_id, job_id, apply_date) VALUES ('".$js_id."','".$j_id."','".$cd."')";

// mysqli_query($conn, $sql);
// header("location: employee_homepage.php");
?>


  
<?php

require 'connection.php';


session_start();
$js_id = $_SESSION['email']; 
$j_id = $_GET['job_id'];
$cd = date('m-d-y');

$sql = "INSERT INTO job_application (js_id, job_id, apply_date) VALUES ('".$js_id."','".$j_id."','".$cd."')";

mysqli_query($conn, $sql);
header("location: employee_homepage.php");
?>