<?php 
    require_once "inc/db.php";
    session_start();
    if(!isset($_SESSION['auth'])){
        header('Location:login.php');
    }
    $id = $_GET['id'];

    if($id && (int) $id){

        //select query
        $selectquery = "SELECT id,status FROM `users` WHERE id=$id";
        $selectresult = mysqli_query($conn, $selectquery);//print_r($result);
        if(mysqli_num_rows($selectresult) > 0){
            $data = mysqli_fetch_assoc($selectresult);
        }

        //status update query
        if($data['status'] == 1){
            $query = "UPDATE `users` SET status = 2 WHERE id=$id";
            $result = mysqli_query($conn, $query);
            $_SESSION['$successmsg'] = "status update successfully!";
            header('Location:all_user.php');
            
        }else{
            $query = "UPDATE `users` SET status = 1 WHERE id=$id";
            $result = mysqli_query($conn, $query);
            $_SESSION['$successmsg'] = "status update successfully!";
            header('Location:all_user.php');
        }
    
    
    }else{
        header('Location:404.php');
    }



?>