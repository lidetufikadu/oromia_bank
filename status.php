<?php
session_start();

if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] != 'admin') {
    header("location: index.php");
}

?>
<?php
$conn = new mysqli('localhost', 'root', '', 'ob_helps');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = "";
$status = "";
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET['id'])) {
        header("location: request.php");
        exit;
    }
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM contact WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $status = $row["status"];
    } else {
        header("location: request.php");
        exit;
    }
} else {
    $id = $conn->real_escape_string($_POST["id"]);
    $status = $conn->real_escape_string($_POST["status"]);

    if( $status == 'closed'){
        $closed_at = date('Y-m-d H:i:s');
    }else{
        $closed_at = NULL;
    }

    $stmt = $conn->prepare("UPDATE contact SET status=?, closed_at =? WHERE id=?");
    $stmt->bind_param("sss", $status,$closed_at,$id);

    if ( $stmt->execute()) {
        header("location: request.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
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
    <h1>change status</h1>

    <div class="containe">
    <form action="status.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <label for="status">Status:</label>
    <select id="status" name="status">

        <option value="open" <?php if ($status == 'open') echo 'selected'; ?>>Open</option>
        <option value="Pending" <?php if ($status == 'Pending') echo 'selected'; ?>>Pending</option>
        <option value="closed" <?php if ($status == 'closed') echo 'selected'; ?>>Closed</option>
    </select>

    <input type="submit" value="Update">
</form>

        <div class="userr">
            <a href="request.php">
                <h4>go_back</h4>
            </a>
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