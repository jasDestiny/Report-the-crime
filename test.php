<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="reportcrime";
$conn = new mysqli($servername, $username, $password, $database);

echo $_COOKIE["whoisuser"]."lookhere";

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $sql_command= "insert into user values ('".$_POST["email"]."' , '".$_POST["password"]."' , '".$_POST["username"]."' , '".$_POST["phoneNumber"]."','-1','-1', '".$_POST["aadhaar"]."');";
    $result=$conn->query($sql_command);

    $cookie_name = "user";
    $cookie_value = $_POST["username"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{   
    if(isset($_GET["usr"]))
    {
        $sql_command="select * from user where username='".$_GET["usr"]."' and password='".$_GET["pass"]."';";
        $result=$conn->query($sql_command);
        if($result->num_rows>0)
        {
            $cookie_name = "user";
            $cookie_value = $_GET["usr"];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        }

        else
        {
            echo "<script>alert('Invalid user data');</script>";
        }
    }   

    else{
        echo "not logged in";
    }
}
#navbar - userdata, view complaints status, view crime data, add complaint
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    if(isset($_COOKIE["user"])){
        echo "<h1>Hello ".$_COOKIE["user"]."</h1>";
    }
    else{
        echo "<button>Login/ Sign up</button>";
    }
    ?>
    <form action="index.php" method="post">
        <input type="textbox" name="email" placeholder="email">   
        <input type="password" name="password" placeholder="password">
        <input type="textbox" name="username" placeholder="choose username"> 
        <input type="textbox" name="phoneNumber" placeholder="phone number"> 
        <input type="textbox" name="aadhaar" placeholder="aadhaar number">
        <input type="submit"></input>
    </form>

    <form action="index.php" method="get">
        <input type="textbox" name="usr" placeholder="username">   
        <input type="password" name="pass" placeholder="password">
        <input type="submit"></input>
    </form>

    <form action="complaints.php" method="post">
        <input type="textbox" name="user" placeholder="username">   
        <input type="password" name="crime" placeholder="crime_type">
        <input type="textbox" name="username" placeholder="choose username"> 
        <input type="textbox" name="phoneNumber" placeholder="phone number"> 
        <input type="textbox" name="aadhaar" placeholder="aadhaar number">
        <input type="submit"></input>
    </form>

</body>
</html>
