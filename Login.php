<?php
// Replace these values with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "khawarcr7";
$dbname = "my1stapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from request
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Sanitize user input to prevent SQL injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Debugging: Output received username and password
echo "Received username: " . $username . "<br>";
echo "Received password: " . $password . "<br>";

// Query to check if the user exists and credentials are correct
$sql = "SELECT * FROM logintable WHERE Username = '$username' AND Password = '$password'";
$result = $conn->query($sql);

// Debugging: Output the SQL query being executed
echo "SQL query: " . $sql . "<br>";

if ($result && $result->num_rows > 0) {
    // User exists and credentials are correct, return success
    echo "success";
} else {
    // User does not exist or credentials are incorrect, return failure
    echo "failure";
}

$conn->close();
?>
