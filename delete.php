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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id=$id";
        $conn->query($sql);
    }
    header("location: userslist.php");
    exit;
    ?>