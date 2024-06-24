<?php

session_start();

header('Content-type: text/html; charset=utf-8');


$host = "localhost";
$db = "khdsnthx_data";
$user = "khdsnthx_data";
$password = "123";


$mysqli = mysqli_connect("$host", "$user", "$password", "$db");

if ($mysqli == false){
    print("error ");
} else 
{
    $name = $_POST["userName"];
    $lastname = $_POST["userLastname"];
    $email = trim(mb_strtolower($_POST["userEmail"]));
    $pass = trim($_POST["userPass"]);
    //$pass = password_hash($pass, PASSWORD_DEFAULT);

    //$email = mb_strtolower(trim($email));
    //$pass = trim($pass);
    $sqlAuth = "SELECT * FROM `users` WHERE `email` = ?";
    $stm = $mysqli->prepare($sqlAuth);
    $stm->bind_param("s", $email);
    $stm->execute();

    $result = $stm->get_result();
    $result = $result->fetch_assoc();

    // $abc = password_verify($pass, $result["userPass"]);

    // echo $abc;

    if (password_verify($pass, $result["pass"])) 
    {
        $_SESSION["id"] = $result["id"];
        print("Done!");
    
    } else 
    {
        print("user_exist");
    }
}