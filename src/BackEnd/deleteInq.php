<?php
// Include your database connection file
include("db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the certificate by ID
    $query = "DELETE FROM contact WHERE cot_id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to EditDetails.php after successful deletion
        header("Location: ../inquiry.php");
        exit();
    } else {
        // Handle error if deletion fails
        echo "Error deleting certificate: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect to EditDetails.php if no ID is provided
    header("Location: ../inquiry.php");
    exit();
}
?>