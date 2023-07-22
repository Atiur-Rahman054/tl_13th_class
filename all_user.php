<?php
session_start();
require_once "inc/db.php";

if(!isset($_SESSION['auth'])){
    header('Location:login.php');
}
    $query = "SELECT id,name,image,email,status,created_at FROM `users`";
    $result = mysqli_query($conn, $query);//print_r($result);
    if(mysqli_num_rows($result) > 0){
        $datas = mysqli_fetch_all($result, true);
    }



    require_once "views/all_users.view.php";

?>

    

    