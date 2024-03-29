<?php
    // Include your database connection file
    include("Backend/db_connection.php");

    // Fetch certificates data from the database
    $query = "SELECT * FROM products ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    // Check if there are any certificates
    if ($result) {
        $productData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $productData = array(); // Empty array if no data or error
    }

    // Close the database connection
    mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edit product</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
  <!-- style sheets -->
  <link rel="stylesheet" href="Styles/header.css">
  <link rel="stylesheet" href="Styles/editProducts.css">

</head>

<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand ml-3" href="#">IS Interiors</a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <button class="btn btn-logout">LOGOUT</button>
      </li>
    </ul>
  </nav>
  <!-- buttons for pages -->
  <div class="top-container">
    <div class="top-buttons d-flex justify-content-between my-5">
      <button class="btn btn-lighter border font-weight-bold btn-lg w-25"><a href="addProduct.php">Add Product</a></button>
      <button class="btn btn-lighter border font-weight-bold btn-lg w-25"><a href="editProducts.php">Edit Products</a></button>
      <button class="btn btn-lighter border font-weight-bold btn-lg w-25"><a href="inquiry.php">Inqueries</a></button>
    </div>
  </div>

  <!-- table -->
  <div class="container mt-4">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Added Date</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <?php foreach ($productData as $product): ?>
        <tbody>
          <!-- Sample Data (Replace with dynamic data) -->
          <tr>
            <td><img src="uploads/<?php echo $product['image']; ?>" alt=""></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['category']; ?></td>
            <td><button class="btn btn-update btn-sm">update</button></td>
            <td><a class="btn btn-delete btn-sm" href="BackEnd/DeleteProduct.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure you want to delete the Product ?')">Delete</a></td>
          </tr>
          <?php endforeach; ?>
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>

</html>