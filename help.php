<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Contact Us</title>
</head>

<body>
    <header>
        <div class="wrapper">
            <div class="logo">
                <img src="image/ob-logo.png" alt="">
            </div>
            <ul class="nav-area">
                <li><a href="index.php">HOME</a></li>
                <li><a href="help.php">HELP</a></li>

                <?php if (isset($_SESSION['usertype'])) : ?>
                    <li><a href="request.php">REQUESTS</a></li>
                <?php endif ?>

                <?php if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin') : ?>
                    <li><a href="users.php">USERS</a></li>
                <?php endif ?>

                <li><a href="about.php">ABOUT US</a></li>

                <?php if (isset($_SESSION['usertype'])) : ?>
                    <li><a href="logout.php">LOGOUT</a></li>
                <?php else : ?>
                    <li><a href="login.php">LOGIN</a></li>
                <?php endif ?>
            </ul>
        </div>
    </header>
    <H1>CREATE YOUR REQUEST</H1>
    <div class="containe">
        <form action="contact-form.php" method="post" onsubmit="return validateForm()">

            <label for="fname">First Name: </label>
            <input type="text" name="fname" id="fname" placeholder="Your first name...." required>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" placeholder="Your last name.." required>

            <label for="phone">phone number:</label>
            <input type="tel" id="phone" name="phone" placeholder="Your phonenumber.." required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your email.." required><br>

            <label for="Region">Region:</label>
            <select id="region" name="region">

                <option value="Addis Ababa ">Addis Ababa </option>

                <option value="South West Ethiopia Peoples">South West Ethiopia Peoples'</option>

                <option value="Tigray">Tigray</option>

                <option value="Oromia">Oromia</option>

                <option value="SNNP">SNNP</option>

                <option value="Somali">Somali</option>

                <option value="Gambella">Gambella</option>

                <option value="Harari">Harari </option>

                <option value=" Benishangul-Gumuz "> Benishangul-Gumuz </option>

                <option value="Sidama">Sidama</option>

                <option value="Dire Dawa">Dire Dawa</option>
            </select>

            <label for="message">Your Message:</label>
            <textarea id="message" name="message" placeholder="Write your request......" style="height:100px"></textarea>

            <input type="submit" value="Submit">
        </form>
        <script>
            function validateForm() {
                let fname = document.getElementById("fname").value;
                let lname = document.getElementById("lname").value;
                let phone = document.getElementById("phone").value;
                let email = document.getElementById("email").value;

                let lettersOnly = /^[A-Za-z]+$/;
                if (!fname.match(lettersOnly)) {
                    alert("First name must be filled out");
                    return false;
                }

                if (!lname.match(lettersOnly)) {
                    alert("Last name must be filled out");
                    return false;
                }

                if (!/^(\d{10}|\(\d{3}\)\s?\d{3}-\d{4}|\d{3}-\d{3}-\d{4}|\+\d{1,3}\s?\d{1,14})$/.test(phone)) {
                    alert("Please enter a valid phone number");
                    return false;
                }
                if (!/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/.test(email)) {
                    alert("Please enter a valid email address");
                    return false;
                }
                return true;
            }
        </script>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4>OB Headquarters</h4>
                        <ul>
                            <li><a href="#">Africa Avenue, Bole Road,</a></li>
                            <li><a href="#">Addis Ababa, Ethiopia</a></li>
                            <li><a href="#">Tel: +(251) 115 183880</a></li>
                            <li><a href="#">Fax: + 251 115 572
                            <li><a href="#">P.O.Box: 27530/1000</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="#">OrooDigital</a></li>
                            <li><a href="#">Internet Banking</a></li>
                            <li><a href="#">Account Opening</a></li>
                            <li><a href="#">Cyber Security Tips</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Our Services</h4>
                        <ul>
                            <li><a href="#">Conventional Banking</a></li>
                            <li><a href="#">Interest Free Banking</a></li>
                            <li><a href="#">International Banking</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="about.php">Who We Are</a></li>
                            <li><a href="about.php">Board Of Directors</a></li>
                            <li><a href="about.php">Corporate Governance</a></li>
                            <li><a href="about.php">Bank Achievement</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>follow us</h4>
                        <div class="social-link">
                            <a href="https://www.facebook.com/oibsc/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/oromiabank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/oromiaintbank/"><i class="fab fa-instagram"></i></a>
                            <a href="https://t.me/OromiabankOfficial"><i class="fab fa-telegram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
</body>

</html>