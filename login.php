<?php
session_start();
include "inc/db.php";
?>
<?php


if(isset($_POST['submit'])){

$errors = [];


$password = htmlentities(trim($_POST['password']));
$encpass = md5($password);
$email = htmlentities(trim($_POST['email']));//validation





if(empty($password)){
    $errors['passErr'] = "Enter your password";
}elseif(strlen($password) < 4){
    $errors['passErr'] = "password must be 4 digit long";
}

if(empty($email)){
    $errors['emailErr'] = "Enter your email";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['emailErr'] = "Enter valid email";
}

if(empty($errors)){
    $selectquery = "SELECT id,name,email,status,image,created_at FROM `users` WHERE email='$email' AND password='$encpass'";
    $selectresult = mysqli_query($conn, $selectquery);//print_r($result);
    if(mysqli_num_rows($selectresult) > 0){
        $data = mysqli_fetch_assoc($selectresult);
        $_SESSION['auth'] = $data;
        header('Location:all_user.php');

    }else{
        $errormsg = "user not found!";
    }
}


}



?>



<?php
include "views/login_view.php";
?>