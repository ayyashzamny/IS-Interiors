<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include("db_connection.php");

    // Get user input
    $userName = $_POST["firstName"];

    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $error_message = "Passwords do not match";
        header("location: signup.php?error=$error_message");
        exit();
    }

    // Hash the password (use a strong hashing algorithm)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user data into the database
    $query = "INSERT INTO users (username, password) VALUES ('$userName', '$hashedPassword')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Registration successful, redirect to login page
        header("location: login.html");
        exit();
    } else {
        $error_message = "Error executing query: " . mysqli_error($conn);
        header("location: signup.php?error=$error_message");
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
}
