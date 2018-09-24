<?php
    ob_start();
    $db['db_host'] = "localhost";
    $db['db_user'] = "root";
    $db['db_pass'] = "";
    $db['db_name'] = "classes";

//    $db['db_host'] = "localhost";
//    $db['db_user'] = "u143232536_emma1";
//    $db['db_pass'] = "R0utematch@101";
//    $db['db_name'] = "u143232536_emma";

    foreach($db as $key => $value){
        define(strtoupper($key), $value);
    }
    try{
        $connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }


?>
