<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="reportcrime";
$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $sql_command= "insert into user crime ('".$_POST["email"]."' , '".$_POST["password"]."' , '".$_POST["username"]."' , '".$_POST["phoneNumber"]."','-1','-1', '".$_POST["aadhaar"]."');";
    $result=$conn->query($sql_command);

    $cookie_name = "user";
    $cookie_value = $_POST["username"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

?>