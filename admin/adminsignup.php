<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input from the form
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$security_question = $_POST['security_question'];
$security_answer = $_POST['security_answer'];

// Hash the username and password using SHA-256
$hashedUsername = hash('sha256', $username);
$hashedPassword = hash('sha256', $password);
$hashedSecurity_question = hash('sha256', $security_question);
$hashedSecurity_answer = hash('sha256', $security_answer);

// Check if any user is already registered for the selected role
$query = "SELECT * FROM $role";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    // Sign-up is disabled for the role
    echo "<script>alert('Sign-up is disabled for $role. Only one account is allowed.'); window.location.href = 'login.php';</script>";
    exit;
} else {
    // Insert the new user into the respective table based on the role
    $query = "INSERT INTO $role (username, password, security_question, security_answer) VALUES ('$hashedUsername', '$hashedPassword', '$hashedSecurity_question', '$hashedSecurity_answer')";
    if ($conn->query($query) === TRUE) {
        // Registration successful
        echo "<script>alert('Registration successful!'); window.location.href = 'login.php';</script>";
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
