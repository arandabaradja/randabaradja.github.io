<?php
session_start();
include "db_growtopia";

if(isset($_POST ['uname']) && isset($_POST['pass'])){
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return data;
    }
}

$uname = validate($_POST['uname']);
$pass = bcscale($_POST['pass']);

if(empty($uname)) {
    header ("Location: login.php?erro=User Name is required");
    exit();
}
else if(empty($pass)) {
    header("Location: login.php?erro=Password is required");
    exit();
}

$sql = "SELECT * FROM db_growtopia WHERE username='$uname' AND password='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['user_name'] === $uname && $row['password'] === $pass) {
        echo "Logged In!";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: home.php")
        exit();
    }
    else{
        header("Location: login.php?error=Incorect User Name or Password")
    }
}
else{
    header("Location: login.php");
    exit();
}

?>