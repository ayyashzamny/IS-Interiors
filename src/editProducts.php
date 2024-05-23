<?php

session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['Uname'])) {
  header("Location: login.html");
  exit();
}

?>

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
  <title>Customize Products</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
  <!-- style sheets -->
  <link rel="stylesheet" href="Styles/header.css">
  <link rel="stylesheet" href="Styles/editProducts.css">

  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="img/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="img/favicon_package_v0.16/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
</head>

<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand ml-3" href="#">IS Interiors</a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="BackEnd/logout.php"><button class="btn btn-logout">LOGOUT</button></a>
      </li>
    </ul>
  </nav>
  
  <!-- pages -->
  <div class="top-container">
    <ul class="nav nav-tabs">
      <li class="nav-item font-weight-bold">
        <a class="nav-link" href="./addProduct.php">New Product</a>
      </li>
      <li class="nav-item font-weight-bold">
        <a class="nav-link active" aria-current="page" href="#">Customise Products</a>
      </li>
      <li class="nav-item font-weight-bold">
        <a class="nav-link" href="./inquiry.php">Messages</a>
      </li>
    </ul>
  </div>

  <!-- table -->
  <div class="container">
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
            <td><a href="BackEnd/updateProduct.php?id=<?php echo $product['id']; ?>" class="btn btn-update btn-sm">update</a></td>
            <td><a class="btn btn-delete btn-sm" href="BackEnd/DeleteProduct.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure you want to delete the Product ?')">Delete</a></td>
          </tr>
          <?php endforeach; ?>
          <!-- Add more rows as needed -->
          </tbody>
      </table>
    </div>
  </div>

  <!-- sweet alert -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>
    <script>
        // Function to show SweetAlert2 confirmation dialog
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this product!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete product PHP file with the product ID
                    window.location.href = `BackEnd/DeleteProduct.php?id=${id}`;
                }
            });
        }
    </script>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>

</html>