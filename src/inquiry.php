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
    $query = "SELECT * FROM contact ORDER BY cot_id DESC";
    $result = mysqli_query($conn, $query);

    // Check if there are any certificates
    if ($result) {
        $certificatesData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $certificatesData = array(); // Empty array if no data or error
    }

    // Close the database connection
    mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inquiry</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>

    <!-- style sheets -->
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="Styles/inquiry.css">

</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand ml-3" href="#">IS Interiors</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="BackEnd/logout.php"><button class="btn btn-logout" >LOGOUT</button></a>
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

    
    <?php foreach ($certificatesData as $certificate): ?>

    <div class="container">
        <div class="row justify-content-center  my-4">
            <div class="col-md-8">
                <div class="form-container">
                    <form>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" value="<?php echo $certificate['name']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" value="<?php echo $certificate['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone:</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="phone" value="<?php echo $certificate['phone']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inquiry" class="col-sm-3 col-form-label">Inquiry:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inquiry" value="<?php echo $certificate['inquiry']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                <!-- <button type="button" class="btn btn-danger float-right">Delete</button> -->
                                <a class="btn btn-danger float-right" href="BackEnd/deleteInq.php?id=<?php echo $certificate['cot_id']; ?>" onclick="return confirm('Are you sure you want to delete this ?')">Delete</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        





    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>

</body>

</html>