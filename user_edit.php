<?php 
    require_once "inc/db.php";
    session_start();
    if(!isset($_SESSION['auth'])){
        header('Location:login.php');
    }

//Select Query

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

//Update query

if(isset($_POST['submit'])){

    $errors = [];

    $name = htmlentities(trim($_POST['name']));//validation
    $email = htmlentities(trim($_POST['email']));//validation
    $photo = $_FILES['photo'];

    if($photo['name']){
        $type = ["jpg", "png", "gif", "jpeg"];
        $fileExt = explode(".", $photo['name']);
        
        if (!in_array(end($fileExt), $type)){
            $errors['imageErr'] = "Enter valid image";
        }elseif($photo['size'] > 1000000){
            $errors['imageErr'] = "Please enter less then 1mb image only";
        }else{

            $path = "profile/".$data['image'];
            if(file_exists($path) && $data['image']){
                unlink($path);
            }

            $photo_name = uniqid() . "." . end($fileExt);
            move_uploaded_file($photo['tmp_name'], 'profile/'. $photo_name);
        }
    }else{
        $photo_name = $data['image'];
    }


    if(empty($name)){
        $errors['nameErr'] = "Enter your name";
    }elseif(strlen($name) > 50){
        $errors['nameErr'] = "please enter less than 50 character";
    }


    if(empty($email)){
        $errors['emailErr'] = "Enter your email";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['emailErr'] = "Enter valid email";
    }

    if(empty($errors)){
        $query = "UPDATE `users` SET name='$name', email='$email', image='$photo_name' WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['$successmsg'] = "User update successfully!";
            header('Location:all_user.php');
        }else{
            $_SESSION['$errormsg'] = "update Error!";
        }
    }


}

require_once "views/user_edit.view.php";
?>