<?php 
    require_once "inc/db.php";
    session_start();
    if(!isset($_SESSION['auth'])){
        header('Location:login.php');
    }
    $id = $_GET['id'];

    if($id && (int) $id){

        //select query
        $selectquery = "SELECT id,name,email,status,image,created_at FROM `users` WHERE id=$id";
        $selectresult = mysqli_query($conn, $selectquery);//print_r($result);
        if(mysqli_num_rows($selectresult) > 0){
            $data = mysqli_fetch_assoc($selectresult);
        }

        $path = "profile/".$data['image'];
        if(file_exists($path) && $data['image']){
            unlink($path);
        }

        //delete query
        $query = "DELETE FROM `users` WHERE id=$id";
        $result = mysqli_query($conn, $query);//print_r($result);
        if($result){
            header('Location:all_user.php');
        }
    
    
    }else{
        header('Location:404.php');
    }



?>