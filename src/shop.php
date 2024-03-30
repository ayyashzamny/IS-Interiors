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
    <title>Home Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/HeaderFooter.css">
    <link rel="stylesheet" href="Styles/shopX.css">
    <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Box icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body id="body">
    <!-- header design -->
    <header class="header">
        <div class="logo">
            <p>IS Interiors</p>
        </div>

        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="shop.php" class="active">Store</a>
            <a href="contactus.php">Contact Us</a>
        </nav>
    </header>

    <section class="section-main">

        <!-- heading -->
        <h2 class="head">Welcome to &nbsp;<span class="spc">IS Interiors</span></h2>

        <!-- search bar -->
        <div class="bar">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" placeholder="Search...">
            <button>Search</button>
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
        <div class="cont">
        <?php foreach ($productData as $product): ?>

            <div class="card">
                <div class="imag"><img src="uploads/<?php echo $product['image']; ?>" alt=""></div>
                <div class="layer">
                    <h4 class="name"><?php echo $product['name']; ?></h4>
                    <p class="price">LKR <?php echo $product['price']; ?>.00</p>
                    <!-- Pass product ID to moreDetails function -->
                    <button class="btn" onclick="moreDetails(<?php echo $product['id']; ?>)">More Details</button>
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
            xhr.onreadystatechange = function () {
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
                <h2>Quick Links</h2>
                <a href="" class="active">Home</a>
                <a href="">Store</a>
                <a href="">Contact Us</a>

                <div class="social-media">
                    <a href="#"><i class="bx bxl-instagram-alt" id="instagram"></i></a>
                    <a href="#"><i class="bx bxl-facebook" id="facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter" id="twitter"></i></a>
                </div>
                <div class="contact">
                    <p>youremail@gmail.com</p>
                    <p>077 445 5567</p>
                </div>

            </div>

            <div class="footer-sub">
                <iframe class="Footer-logo"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.9052507463275!2d80.4530728750816!3d7.251623792754959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae36b35d02f1cdd%3A0x8e3ccc3de5f2411!2sAyyTec!5e0!3m2!1sen!2slk!4v1707075791861!5m2!1sen!2slk"
                    width="40rem" height="20rem" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </footer>
</body>

</html>
