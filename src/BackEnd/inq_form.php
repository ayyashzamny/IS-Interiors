<?php
// Include the database connection file
include("db_connection.php");

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $inquiry = $_POST['inquiry'];
    
    // Check if connection is established
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO contact (name, email, phone, inquiry) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    // Bind parameters
    $stmt->bind_param("ssss", $name, $email, $phone, $inquiry);

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Thank you for your inquiry. We will get back to you soon.";
    } else {
        $_SESSION['error_message'] = "Oops! Something went wrong. Please try again later.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    header("Location: ../contactus.php");
    exit();
}
?>
