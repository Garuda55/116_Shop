<?php 

header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$db = "khdsnthx_data";
$user = "khdsnthx_data";
$password = "123";


$mysqli = mysqli_connect("$host", "$user", "$password", "$db");


if ($mysqli == false)
{
    echo "Error!";

} else
{
    $name = $_POST["userName"];
    $lastname = $_POST["userLastname"];
    $email = trim(mb_strtolower($_POST["userEmail"]));
    $pass = trim($_POST["userPass"]);
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");

    if ($result->num_rows != 0)
    {
        print("user_exist");
    
    } else 
    {
        $sqlAdd = "INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES (?, ?, ?, ?)";
        $stm = $mysqli->prepare($sqlAdd);
        $stm->bind_param("ssss", $name, $lastname, $email, $pass);
        $stm->execute();

        print("Done!");

    }

    
} 
