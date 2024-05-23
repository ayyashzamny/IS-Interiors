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
include("db_connection.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Fetch certificate data by ID
  $query = "SELECT * FROM products WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    $ProData = mysqli_fetch_assoc($result);
  } else {
    $ProData = array(); // Empty array if no data or error
  }

  // Close the database connection
  mysqli_close($conn);
} else {
  // Redirect to EditDetails.php if no ID is provided
  header("Location: ../editProducts.php");
  exit();
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
  <link rel="stylesheet" href="../Styles/header.css">
  <link rel="stylesheet" href="../Styles/addProducts.css">

</head>

<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand ml-3" href="#">IS Interiors</a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <!-- <a href=""><button class="btn btn-logout" >LOGOUT</button></a> -->
      </li>
    </ul>
  </nav>


  <div class="form-container">

    <form action="saveUpdateProducts.php" method="POST" autocomplete="off">

      <input type="hidden" name="id" value="<?php echo $ProData['id']; ?>">

      <div class="form-group row mb-4">
        <label for="productName" class="col-sm-3 col-form-label">Name:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $ProData['name']; ?>">
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="productPrice" class="col-sm-3 col-form-label">Price:</label>
        <div class="col-sm-9">
          <input type="number" class="form-control" id="productPrice" name="productPrice" value="<?php echo $ProData['price']; ?>">
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="productCategory" class="col-sm-3 col-form-label">Category:</label>
        <div class="col-sm-9">
          <select class="form-select" aria-label="Default select example">
            <option selected>Select Category</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="productDescription" class="col-sm-3 col-form-label">Description:</label>
        <div class="col-sm-9">
          <textarea class="form-control" id="productDescription" rows="3" name="productDescription"><?php echo $ProData['description']; ?></textarea>
        </div>
      </div>
      <!-- <div class="form-group row mb-4">
        <label for="productImage" class="col-sm-3 col-form-label"> Select Image:</label>
        <div class="col-sm-9">
          <input type="file" class="form-control-file" id="productImage" accept=".jpg, .jpeg, .png" name="productImage" value=""> 
        </div>
      </div> -->
      <div class="form-group row justify-content-between">
        <div class="col-6 col-sm-2">

          <button type="submit" name="submit" id="btnf" class="btn btn-primary btn-block">Update</button>
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