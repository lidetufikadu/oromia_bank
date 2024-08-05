<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $region = $_POST['region'];
    $message = $_POST['message'];
    $status = 'open';
}
$con = new mysqli('localhost', 'root', '', 'ob_helps');
if ($con) {
    $sql = "insert into contact(fname,lname,phone,email,region,message,status)
    values('$fname','$lname','$phone','$email','$region','$message', '$status')";

    $result = mysqli_query($con, $sql);
}
if ($result) {
    echo "your request inserted successfully";
} else {
    die(mysqli_error($con));
}
