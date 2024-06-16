<?php
// Include your database connection file
include("./Backend/db_connection.php");

// Initialize search query
$searchQuery = "";

// Check if the search form was submitted
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}

// Fetch all products from the database based on the search query
$query = "SELECT * FROM products WHERE category = 'Interior' AND name LIKE '%$searchQuery%' ORDER BY id DESC";
$result = mysqli_query($conn, $query);

// Check if there are any products
if ($result && mysqli_num_rows($result) > 0) {
    $productData = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $productData = array(); // Empty array if no data or error
}

// Generate HTML for products
foreach ($productData as $product) {
    echo '<div class="card">';
    echo '<img src="./uploads/' . $product['image'] . '" class="card-img-top" alt="...">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $product['name'] . '</h5>';
    echo '<p class="card-text">LKR ' . $product['price'] . '.00</p>';
    echo '<div style="display:flex; justify-content: right;">';
    echo '<a href="#" class="btn btn-primary" onclick="moreDetails(' . $product['id'] . ')">More Details</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

// Close the database connection
mysqli_close($conn);
?>
