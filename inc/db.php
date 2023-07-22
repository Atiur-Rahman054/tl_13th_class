<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'user_management');

    try{
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }catch(Exception $e){
        echo "Connection failed: " . $e->getMessage();
    }
?>