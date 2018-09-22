<?php
    include "db.php";
    session_start();
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT * FROM users WHERE user_username = ? AND user_password = ?";
        $user = $connection->prepare($query);
        $user->execute(array($username, $password));
        while($row = $user->fetch()){
            $user_id = $row["user_id"];
            $user_username = $row["user_username"];
            $user_password = $row["user_password"];
            $firstname = $row["user_first_name"];
            $lastname = $row["user_last_name"];
            $user_role = $row["user_role"];
        }

        if($username === $user_username && $password === $user_password){
            $_SESSION['username'] = $user_username;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['user_role'] = $user_role;
            header("Location: ../admin");
        }else{
            header("Location: ../index.php");
        }

    }
