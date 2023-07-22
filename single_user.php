<?php 
require_once "inc/db.php";
session_start();
if(!isset($_SESSION['auth'])){
    header('Location:login.php');
}

$id = $_GET['id'];

if($id && (int) $id){

    $query = "SELECT id,name,email,status,image,created_at FROM `users` WHERE id=$id";
    $result = mysqli_query($conn, $query);//print_r($result);
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
    }


}else{
    header('Location:404.php');
}

require_once "views/single_user.view.php";
?>