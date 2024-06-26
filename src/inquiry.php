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
    <title>Messages</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>

    <!-- style sheets -->
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="Styles/inquiry.css">

    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="img/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="img/favicon_package_v0.16/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
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
                <a class="nav-link" aria-current="page" href="./editProducts.php">Customise Products</a>
            </li>
            <li class="nav-item font-weight-bold">
                <a class="nav-link active" href="#">Messages</a>
            </li>
        </ul>
    </div>

    <?php foreach ($certificatesData as $certificate) : ?>

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
                                <a class="btn btn-danger float-right" href="#" onclick="confirmDelete(<?php echo $certificate['cot_id']; ?>)">Delete</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>
    <script>
        // Function to show SweetAlert2 confirmation dialog
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this record!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete inquiry PHP file with the inquiry ID
                    window.location.href = `BackEnd/deleteInq.php?id=${id}`;
                }
            });
        }
    </script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>

</body>

</html>
