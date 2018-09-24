<?php
    include "db.php";
    include "header.php";
    if(isset($_POST['reg'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
    $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=> 12));
    $query = "INSERT INTO users (user_username, user_password, user_role) ";
    $query .= "VALUES(?, ?, ?)";
    $registerUser = $connection->prepare($query);
    $registerUser->execute(array($username, $password, "admin"));
    if($registerUser){
       header("Location: ../admin/");
    }
