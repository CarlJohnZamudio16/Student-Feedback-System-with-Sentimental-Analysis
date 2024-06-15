<?php
// Connect to your database and retrieve the total count of texts for the selected year and semester
// Replace the database connection details with your actual credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the total count from the database
$year = $_GET['year'];
$semester = $_GET['semester'];

$sql = "SELECT COUNT(*) AS total FROM adfeed WHERE school_year = '$year' AND semester = '$semester'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalTexts = $row['total'];
    echo $totalTexts;
} else {
    echo "0"; // If no data found, return 0
}

$conn->close();
?>
