# requestform_orbank
# oromia-bank

<a href='delete.php?id=" . $row["id"] . "' class='btn btn-delete'>Delete</a>

.userr a {
    background-color: #96c83c;
    margin: 0 auto;
    color: #fff;
    font-size: 16px;
    border: none;
    padding-top: 5px;
    margin-top: 10px;
    border-radius: 500px;
    text-align: center;
    font-weight: bold;
    width: 500px;
    height: 30px;
    border-bottom: 2px solid #000;
   
}

.userr a:hover {
    background: #5863ac;
    color: #fff;
    border-radius: 500px;
}
 #css for in ai exchang

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype'];

       /* $con = new mysqli('localhost', 'root', '', 'ob_helps');
        
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } */
      try{  require_once"action.php";

        $query="UPDATE users SET fname= :fname, lname=:lname,
         username=:username, password=:password, usertype=:usertype WHERE id=1;";

    $stmt=$pdo->prepare($query);

     $stmt->bindparam(":fname", $fname);
     $stmt->bindparam(":lname", $lname);
     $stmt->bindparam(":username", $username);
     $stmt->bindparam(":password", $password);
     $stmt->bindparam(":usertype", $usertype);

     $stmt->excute();

     $pdo=null;
     $stmt=null;

     header("location: users.php");
     die();
    }catch(PDOException $lname){
    die("con faild: " . $e->getmessage());
}
}else{
    header("location: users.php");
}
<td>
                    <a href="update.php">edit</a>
                    <a href="delete.php">delete</a>
                </td>
