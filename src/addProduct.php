<?php
require 'Backend/db_connection.php';

if (isset($_POST["submit"])) {
  $productName = $_POST["productName"];
  $productPrice = $_POST["productPrice"];
  $productCategory = $_POST["productCategory"];
  $productDescription = $_POST["productDescription"];

  if ($_FILES["productImage"]["error"] == 4) {
    echo "<script> alert('Image Does Not Exist'); </script>";
  } else {
    $fileName = $_FILES["productImage"]["name"];
    $fileSize = $_FILES["productImage"]["size"];
    $tmpName = $_FILES["productImage"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));

    if (!in_array($imageExtension, $validImageExtension)) {
      echo "<script> alert('Invalid Image Extension'); </script>";
    } else if ($fileSize > 1000000) {
      echo "<script> alert('Image Size Is Too Large'); </script>";
    } else {
      $newImageName = uniqid() . '.' . $imageExtension;

      move_uploaded_file($tmpName, 'uplords/' . $newImageName);

      $query = "INSERT INTO products (id , name, price, category, description, image) 
	  VALUES ('', '$productName', '$productPrice', '$productCategory','$productDescription', '$newImageName')";
      mysqli_query($conn, $query);

      echo "
        <script>
          alert('Successfully Added');
          document.location.href = '../addProduct.php';
        </script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>add new product</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
  <!-- style sheets -->
  <link rel="stylesheet" href="Styles/header.css">
  <link rel="stylesheet" href="Styles/addProducts.css">

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
      <button class="btn btn-lighter border font-weight-bold btn-lg w-25"><a href="addProduct.html">Add Product</a></button>
      <button class="btn btn-lighter border font-weight-bold btn-lg w-25"><a href="editProducts.html">Edit Products</a></button>
      <button class="btn btn-lighter border font-weight-bold btn-lg w-25"><a href="inquiry.html">Inqueries</a></button>
    </div>
  </div>

  <div class="form-container">
    
    <form action="" method="POST" autocomplete="off">
      <div class="form-group row mb-4">
        <label for="productName" class="col-sm-3 col-form-label">Name:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="productName" name="productName">
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="productPrice" class="col-sm-3 col-form-label">Price:</label>
        <div class="col-sm-9">
          <input type="number" class="form-control" id="productPrice" name="productPrice">
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="productCategory" class="col-sm-3 col-form-label">Category:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="productCategory" name="productCategory">
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="productDescription" class="col-sm-3 col-form-label">Description:</label>
        <div class="col-sm-9">
          <textarea class="form-control" id="productDescription" rows="3" name="productDescription"></textarea>
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="productImage" class="col-sm-3 col-form-label"> Select Image:</label>
        <div class="col-sm-9">
          <input type="file" class="form-control-file" id="productImage" accept="image/*" name="productImage"> 
        </div>
      </div>
      <div class="form-group row justify-content-between">
        <div class="col-6 col-sm-2">
          
          <button type="submit" name="submit" id="btnf" class="btn btn-primary btn-block">Submit</button>
      </div>
      <div class=" col-6 col-sm-2">
            <button type="reset" class="btn btn-danger btn-block">CLEAR</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>

</html>