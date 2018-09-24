<?php
    include "db.php";
    global $connection;
    ob_start();
    session_start();
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT * FROM users WHERE user_username = ?";
        $user = $connection->prepare($query);
        $theUser = $user->execute(array($username));
        while($row = $user->fetch()){
            $user_id = $row["user_id"];
            $user_username = $row["user_username"];
            $user_password = $row["user_password"];
            $firstname = $row["user_first_name"];
            $lastname = $row["user_last_name"];
            $user_role = $row["user_role"];
        }

        if(password_verify($password, $user_password)){
            $_SESSION['username'] = $user_username;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['user_role'] = $user_role;
            header("Location: ../admin");
        }else{
            header("Location: ../index.php");
        }
    }
