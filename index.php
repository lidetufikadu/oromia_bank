<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>oromia bank</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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

                <li><a href="about.php">ABOUT US</a></li>
                <?php if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin') : ?>
                    <li><a href="users.php">USERS</a></li>
                <?php endif ?>

                <?php if (isset($_SESSION['usertype'])) : ?>
                    <li><a href="logout.php">LOGOUT</a></li>
                <?php else : ?>
                    <li><a href="login.php">LOGIN</a></li>
                <?php endif ?>
            </ul>
        </div>
    </header>

    <div class="oro">
        <!-- <img src="oro.jpg" alt=""> -->
        <div class="wtext">
            <h1>Serving To Empower You</h1>
            <a href="help.php">create request</a>
        </div>
    </div>
    <div class="imj">
        <div class="branch">
            <img src="image/branch.png" alt="">
            <h3>570</h3>
            <h4>Branches</h4>
        </div>
        <div class="agent">
            <img src="image/agent-2.png" alt="">
            <h3>1190</h3>
            <h4>Agents</h4>
        </div>
        <div class="atm">
            <img src="image/Atm.png" alt="">
            <h3>168</h3>
            <h4>ATMs</h4>
        </div>
    </div>
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

    </footer>
</body>

</html>