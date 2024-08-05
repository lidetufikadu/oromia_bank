<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>

    </style>
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
    <div class="abcc">
        <div class="about">
            <h1>About Our Bank</h1>
            <p>
                Oromia Bank was established in accordance with the pertinent laws,
                regulations and the 1960 Commercial Code of Ethiopia, by the Monetary
                and Banking Proclamation No. 83/1994 and by the Licensing and Supervision of
                Banking Proclamation No. 592/2008. Accordingly, on September 18, 2008,
                Oromia Bank obtained a banking business license. At the time of its establishment,
                OIBs authorized capital was Birr 1.5 billion, whereas its subscribed capital was Birr 279.2 million,
                and its paid-up capital Birr 91.2 million. OIB began operation on October 25, 2008 by opening
                its first branch at Dembel City Center, named Bole Branch. Now, the Banks branches reached more than 300.
            </p>
        </div>
        <div class=" future">
            <h6>LEARN HOW OUR PAST IS SHAPING OUR FUTURE</h6>
            <h1>Past, present and future</h1>
            <p>Since the establishment of Oromia Bank on September 18, 2008, OB obtained a banking business license,
                we Have drawn on our financial strength to serve customers. We also recognize that this past year has
                fundamentally changed banking by accelerating the shift to digital products and services. We Are
                positioned well for this future, having launched new tools
                like our Oroclick and Mobile Banking app to complement our 500 branch footprint.</p>
        </div>
        <div class="vision">
            <h6>OUR VISION</h6>
            <em>
                <h2>To Become the Bank of Your First Choice</h2>
            </em>
            <h6>OUR MISSION</h6>
            <p>We are committed in providing full-fledged and best quality commercial banking services within
                the pertinent regulatory requirement with due diligence to sustainable business while empowering
                the missing middle and discharging social responsibility by engaging highly qualified, skilled,
                motivated and disciplined employees and state-of-the- art information technology,
                adding real value to the shareholders interest and win the public trust.</p>

        </div>
        <div class="valus">
            <h1>Modest beginnings, steady growth</h1>
            <p>Through the years, our presence has grown tremendously. After opening the first Bole branch on October
                25, 2008 in Addis Ababa – Africa avenue, we continued to expand by establishing over 500 branches
                across the nation. But growth, as a company, is more than just brick-and-mortar. It’s a reflection
                of our performance and our ability to earn the public’s trust.
                Today, we continue to be recognized as a top performing bank with paid up capital to Birr 5.4 Billion.</p>

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