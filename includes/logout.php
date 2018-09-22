<?php 
    ob_start(); 
    session_start();
    //Set all Sesion variables to null
    $_SESSION['username'] = null;
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['user_role'] = null;
    //Redirect to index page when user hits logout button
    header("Location: ../index.php");
?>