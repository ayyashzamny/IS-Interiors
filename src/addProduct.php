<?php
<<<<<<< HEAD
    session_start();
=======

session_start();
>>>>>>> b4d416eadd53b612ae750604c889db0796c2fb3e

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['Uname'])) {
  header("Location: login.html");
  exit();
}

?>

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
            $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (!in_array($imageExtension, $validImageExtension)) {
                echo "<script> alert('Invalid Image Extension'); </script>";
            } else if ($fileSize > 1000000) {
                echo "<script> alert('Image Size Is Too Large'); </script>";
            } else {
                $newImageName = uniqid() . '.' . $imageExtension;

                move_uploaded_file($tmpName, 'uploads/' . $newImageName);

                $query = "INSERT INTO products (name, price, category, description, image) 
                          VALUES ('$productName', '$productPrice', '$productCategory', '$productDescription', '$newImageName')";

                if (mysqli_query($conn, $query)) {
                    echo "
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js'></script>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Product added successfully',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(() => {
                                // Redirect to addProduct.php after success
                                window.location.href = 'addProduct.php';
                            });
                        </script>";
                } else {
                    echo "<script> alert('Failed to add product: " . mysqli_error($conn) . "'); </script>";
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Product</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
  <!-- style sheets -->
  <link rel="stylesheet" href="./Styles/header.css">
  <link rel="stylesheet" href="./Styles/addProducts.css">

<<<<<<< HEAD
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="img/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="img/favicon_package_v0.16/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
=======
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_package_v0.16/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_package_v0.16/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_package_v0.16/favicon-16x16.png">
  <link rel="manifest" href="img/favicon_package_v0.16/site.webmanifest">
  <link rel="mask-icon" href="img/favicon_package_v0.16/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

>>>>>>> b4d416eadd53b612ae750604c889db0796c2fb3e
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
        <a class="nav-link active" aria-current="page" href="#">New Product</a>
      </li>
      <li class="nav-item font-weight-bold">
        <a class="nav-link" href="./editProducts.php">Customise Products</a>
      </li>
      <li class="nav-item font-weight-bold">
        <a class="nav-link" href="./inquiry.php">Messages</a>
      </li>
    </ul>
  </div>

  <div class="form-container">
<<<<<<< HEAD
=======

>>>>>>> b4d416eadd53b612ae750604c889db0796c2fb3e
    <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
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
          <textarea class="form-control" id="productDescription" rows="3" name="productDescription"></textarea>
        </div>
      </div>
      <div class="form-group row mb-4">
        <label for="productImage" class="col-sm-3 col-form-label"> Select Image:</label>
        <div class="col-sm-9">
          <input type="file" class="form-control-file" id="productImage" accept=".jpg, .jpeg, .png" name="productImage" value="">
        </div>
      </div>
      <div class="form-group row justify-content-between">
        <div class=" col-6 col-sm-2">
          <button type="reset" class="btn btn-danger btn-block btn-sm">CLEAR</button>
        </div>
        <div class="col-6 col-sm-2">
<<<<<<< HEAD
          <button type="submit" name="submit" id="btnf" class="btn btn-primary btn-block">Submit</button>
        </div>
        <div class="col-6 col-sm-2">
          <button type="reset" class="btn btn-danger btn-block">CLEAR</button>
=======
          <button type="submit" name="submit" id="btnf" class="btn btn-primary btn-block btn-sm">SUBMIT</button>
>>>>>>> b4d416eadd53b612ae750604c889db0796c2fb3e
        </div>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>
  <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>

</html>
