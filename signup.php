<?php
    require_once "inc/db.php";
    session_start();

    if(isset($_POST['submit'])){

        $errors = [];

        $name = htmlentities(trim($_POST['name']));//validation
        $password = htmlentities(trim($_POST['password']));
        $encpass = md5($password);
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
                $photo_name = uniqid() . "." . end($fileExt);
                move_uploaded_file($photo['tmp_name'], 'profile/'. $photo_name);
            }
        }else{
            $photo_name = null;
        }


        if(empty($name)){
            $errors['nameErr'] = "Enter your name";
        }elseif(strlen($name) > 50){
            $errors['nameErr'] = "please enter less than 50 character";
        }

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
           $query = "INSERT INTO `users`(`name`, `password`, `email`, `image`) VALUES ('$name', '$encpass', '$email', '$photo_name')";
           $result = mysqli_query($conn, $query);
            if($result){
                $successmsg = "User inserted successfully!";
            }else{
                $errormsg = "Insert Error!";
            }
        }


    }


    require_once "views/signup.view.php";
    ?>

        