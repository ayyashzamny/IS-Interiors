<?php
// Include your database connection file
include("Backend/db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch product details by ID from the database
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
?>
<div class="imge">
    <img src="uploads/<?php echo $product['image']; ?>" alt="Product Image">
</div>
<div class="detail">
    <h1>Product Name</h1>
    <p><?php echo $product['name']; ?></p>
    <h1>Price</h1>
    <p><?php echo 'Rs. ' . number_format($product['price'], 2); ?></p>
    <h1>Category</h1>
    <p><?php echo $product['category']; ?></p>
    <h1>Description</h1>
    <textarea class="txtAre" cols="30" rows="10" readonly><?php echo $product['description']; ?></textarea>
</div>
<?php
    } else {
        echo "Product not found.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid product ID.";
}
?>
