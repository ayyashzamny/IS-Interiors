<?php
// Include your database connection file
include("db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the image filename from the database before deletion
    $getImageQuery = "SELECT image FROM products WHERE id = $id";
    $imageResult = mysqli_query($conn, $getImageQuery);
    $imageRow = mysqli_fetch_assoc($imageResult);
    $imageFilename = $imageRow['image'];

    // Delete the product by ID
    $deleteQuery = "DELETE FROM products WHERE id = $id";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Delete the corresponding image file from the uploads folder
        $imagePath = "../uploads/" . $imageFilename;
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }

        // Redirect to EditProducts.php after successful deletion
        header("Location: ../editProducts.php");
        exit();
    } else {
        // Handle error if deletion fails
        echo "Error deleting : " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect to EditProducts.php if no ID is provided
    header("Location: ../editProducts.php");
    exit();
}
?>
