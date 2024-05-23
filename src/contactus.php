<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/HeaderFooter.css">
    <link rel="stylesheet" href="Styles/contactus.css">
    <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
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

<body>

    <!--Page up Button-->
    <!-- <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button> -->

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
            <a href="./index.html">Home</a>
            <a href="./shop.php">Store</a>
            <a href="./contactus.php" class="active">Contact Us</a>
        </nav>
    </header>

    <h2 class="contact-title">Contact &nbsp;<span style="font-family: Dancing script;">IS Interiors</span></h2>

    <form class="contact-form" method="POST" action="BackEnd/inq_form.php">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone No:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="inquiry">Inquiry:</label>
        <textarea id="inquiry" name="inquiry" rows="4" required></textarea>

        <button type="submit" class="submit-btn">Submit</button>
        <button type="reset" class="clear-btn">Clear</button>
    </form>

    <footer class="footer">
        <div class="footer-main">
            <div class="footer-sub">

                <div class="links">
                    <div>
                        <h2>Quick Links</h2>
                    </div>
                    <div>
                        <a href="./index.html">Home</a>
                        <a href="./shop.php">Store</a>
                        <a href="#" class="active">Contact Us</a>
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