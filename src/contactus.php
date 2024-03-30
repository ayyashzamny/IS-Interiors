
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/HeaderFooter.css">
    <link rel="stylesheet" href="Styles/contact.css">
    <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
    <!-- Box icons -->
    <link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet"
    />

</head>
<body>

    <!--Page up Button-->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        
        
    <script>
      // Get the button
      let mybutton = document.getElementById("myBtn");

      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {scrollFunction()};

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
        <div class="logo"><p>IS Interiors</p></div>
        <!-- <a href="#" class="logo"><img src="./images/spice-icon.png" alt=""></a>
        <i class="bx bx-menu" id="menu-icon"></i> -->

        <nav class="navbar">
            <a href="./index.html" >Home</a>
            <a href="./shop.php">Store</a>
            <a href="./contactus.php" class="active">Contact Us</a>
        </nav>
    </header>

    <h2 class="contact-title">Contact IS Interiors</h2>

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
                <h2>Quick Links</h2>
                <a href="#home" class="active">Home</a>
                <a href="./myservices.html">Store</a>
                <a href="./mycontacts.html">Contact Us</a>

                <div class="social-media">
                    <a href="#"><i class="bx bxl-instagram-alt" id="instagram"></i></a>
                    <a href="#"><i class="bx bxl-facebook" id="facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter" id="twitter"></i></a>
                </div>
                <div class="contact"><p>youremail@gmail.com</p><p>077 445 5567</p></div>

            </div>

            <div class="footer-sub">
                <iframe class="Footer-logo" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.9052507463275!2d80.4530728750816!3d7.251623792754959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae36b35d02f1cdd%3A0x8e3ccc3de5f2411!2sAyyTec!5e0!3m2!1sen!2slk!4v1707075791861!5m2!1sen!2slk" width="40rem" height="20rem" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </footer>

    
   

</body>
</html>
