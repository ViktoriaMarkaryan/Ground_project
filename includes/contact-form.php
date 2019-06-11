<?php

ini_set('display_errors', 'on');
$db = new PDO('mysql:host=127.0.0.1:3306;dbname=test', 'root', 'root');
if (!empty($_POST)){
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = $db->prepare("
        INSERT INTO users (first_name, last_name, email, password)
        VALUES (:first_name, :last_name, :email, :password)
    ");
    
    $user->execute([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'password' => $password,
    ]);    
}
?>
<!DOCTYPE httml>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registration/ Log in page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <form action="index.php" method="post" autocomplete="off">
            <input type="text" name="first_name" placeholder="First name"> 
            <br>
            <input type="text" name="last_name" placeholder="Last name"> 
            <br>
            <input type="email" name="email" placeholder="Email"> 
            <br>
            <input type="password" name="password" maxlenght="20" placeholder="Password"> 
            <br>
            <input type="submit" value="Register">
        </form>
    </body>
</html>