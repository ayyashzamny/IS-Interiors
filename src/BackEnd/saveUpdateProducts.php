<?php
// Include your database connection file
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["productName"];
    $price = $_POST["productPrice"];
    $category = $_POST["productCategory"];
    $description = $_POST["productDescription"];

    // Update the product data in the database
    $query = "UPDATE products SET name = '$name', price = '$price', category = '$category', description = '$description' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to EditDetails.php after successful update
        header("Location: ../editProducts.php");
        exit();
    } else {
        // Handle error if update fails
        echo "Error updating product: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect to EditDetails.php if accessed directly without a POST request
    header("Location: ../editProducts.php");
    exit();
}
?>
