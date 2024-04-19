<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$database = "portfolio"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Prepare SQL statement to insert data
$stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

// Execute SQL statement
if ($stmt->execute()) {
    // Data inserted successfully
    echo "<script>alert('Your message has been sent. Thank you!');</script>"; // Display pop-up message
    echo "<script>window.location.href = 'index.html';</script>"; // Redirect to index.html
    exit();
} else {
    // Error occurred
    echo "<script>alert('Failed!');</script>"; // Display pop-up message
    // echo "<script>window.location.href = 'index.html';</script>";
    exit();
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
