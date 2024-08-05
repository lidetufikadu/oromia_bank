<?php
session_start();

if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] != 'admin') {
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <h1>ADD NEW USER</h1>

    <div class="containe">
        <form action="#" method="POST">

            <label for="fname">First Name: </label>
            <input type="text" name="fname" id="fname" placeholder="Your first name...." required>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" placeholder="Your last name.." required>

            <label for="username">username:</label>
            <input type="username" name="username" required>

            <label for="password">password:</label>
            <input type="password" name="password" required>

            <label for="user_type">user_type:</label>
            <select id="user_type" name="usertype">

                <option value="user">User</option>
                <option value="admin">Admin </option>

            </select>
            <input type="submit" value="add">
            <div class="userr">
                <a href="userslist.php">users_list</a>
            </div>
        </form>
    </div>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype'];

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $con = new mysqli('localhost', 'root', '', 'ob_helps');

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $sql_check = "SELECT * FROM users WHERE username = '$username'";
        $result = $con->query($sql_check);
        if ($result->num_rows > 0) {
            echo "User already exists!";
        } else {
            // User doesn't exist, insert them into the table
            // $sql_insert = "INSERT INTO users (fname, lname, username, password, usertype) VALUES ('$fname', '$lname','$username', '$hashed_password', '$usertype')";
            $stmt = $con->prepare("INSERT INTO users (fname, lname, username, password, usertype) VALUES ('$fname', '$lname',?, ?, '$usertype')");
            $stmt->bind_param('ss', $username, $hashed_password);

            $result = $stmt->execute();

            if ($result === TRUE) {
                echo "New user created successfully!";
            } else {
                echo "Error creating user: " . $con->error;
            }
        }
    }
    ?>

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