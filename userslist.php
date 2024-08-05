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
    <H1>USERS LIST</H1>
    <div class="containe">
        <table>

            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>username</th>
                <th>user_type</th>
                <th>action</th>

            </tr>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'ob_helps');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT id, fname, lname,username, usertype FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["fname"] . "</td>
                            <td>" . $row["lname"] . "</td>
                            <td>" . $row["username"] . "</td>
                            <td>" . $row["usertype"] . "</td>
                            <td>
                                <div class='flex'>
                                    <a href='update.php?id=" . $row["id"] . "' class='btn btn-update'>Update</a>
                                    <a href='delete.php?id=" . $row["id"] . "' class='btn btn-delete' onclick= 'return confirmDelete();'>Delete</a>
                                </div>
                            </td>
                         </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>0 results</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
    <div class="userr">
        <a href="users.php">
            <h4>go_back</h4>
        </a>

    </div>


    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this user?');
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

    </footer>
</body>

</html>