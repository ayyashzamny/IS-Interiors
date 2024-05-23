<?php
// Include your database connection file
include("Backend/db_connection.php");

// Fetch all products from the database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

// Check if there are any products
if ($result && mysqli_num_rows($result) > 0) {
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
    <title>Exteriors</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/HeaderFooter.css">
    <link rel="stylesheet" href="Styles/shopX.css">
    <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Box icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_package_v0.16/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_package_v0.16/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_package_v0.16/favicon-16x16.png">
    <link rel="manifest" href="img/favicon_package_v0.16/site.webmanifest">
    <link rel="mask-icon" href="img/favicon_package_v0.16/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body id="body">

    <!--Page up Button-->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class='bx bxs-to-top'></i></button>
    <script>
        // Get the button
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <!-- header design -->
    <header class="header">
        <div class="logo">
            <p>IS Interiors</p>
        </div>

        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="shop.php">Awards</a>
            <a href="./interior.php">Interiors</a>
            <a href="./exterior.php" class="active">Exteriors</a>
            <a href="contactus.php">Contact Us</a>
        </nav>
    </header>

    <section class="section-main">

        <!-- heading -->
        <h2 class="head">Exteriors</h2>

        <!-- search bar -->
        <div class="bar">
            <input type="search" placeholder="Search...">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <!-- pop up window -->
        <div class="cover" id="popup">
            <div class="popup">
                <div class="icon"><i class='bx bx-x-circle' onclick="closePopup()"></i></div>
                <div class="box" id="popupContent">
                    <!-- Dynamic content will be loaded here -->
                </div>
            </div>
        </div>

        <!-- products -->
        <div class="contain">
            <?php foreach ($productData as $product) : ?>

                <div class="card">
                    <img src="./uploads/<?php echo $product['image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text">LKR <?php echo $product['price']; ?>.00</p>
                        <div style="display:flex; justify-content: right;">
                            <a href="#" class="btn btn-primary" onclick="moreDetails(<?php echo $product['id']; ?>)">More Details</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    </section>

    <script>
        // for more details
        function moreDetails(productId) {
            // AJAX request to fetch product details based on ID
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetchProductDetails.php?id=' + productId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("popupContent").innerHTML = xhr.responseText;
                    document.getElementById("popup").classList.add("show-popup");
                }
            };
            xhr.send();
        }

        function closePopup() {
            document.getElementById("popup").classList.remove("show-popup");
        }
    </script>

    <footer class="footer">
        <div class="footer-main">
            <div class="footer-sub">

                <div class="links">
                    <div>
                        <h2>Quick Links</h2>
                    </div>
                    <div>
                        <a href="./index.html">Home</a>
                        <a href="#" class="active">Store</a>
                        <a href="./contactus.php">Contact Us</a>
                    </div>
                </div>

                <div class="social-media">
                    <div>
                        <h2>Follow Us</h2>
                    </div>
                    <div style="display: flex;">
                        <a href="#"><i class="bx bxl-instagram-alt" id="instagram"></i></a>
                        <a href="#"><i class="bx bxl-facebook" id="facebook"></i></a>
                        <a href="#"><i class="bx bxl-twitter" id="twitter"></i></a>
                    </div>
                </div>

                <div class="contact">
                    <div>
                        <h2>Contact Us</h2>
                    </div>
                    <div>
                        <p>youremail@gmail.com</p>
                        <p>077 445 5567</p>
                    </div>
                </div>

            </div>

            <div class="footer-sub">
                <iframe class="Footer-logo" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15831.50037014867!2d80.4526826!3d7.255054!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae3158bd97a1d73%3A0x32aa2317c79f7dd6!2sIS%20Interiors!5e0!3m2!1sen!2slk!4v1707720419858!5m2!1sen!2slk" width="40rem" height="20rem" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </footer>
</body>

</html>