<?php
require 'connect.php';

session_start();
$data = '';
if (key_exists('login', $_SESSION) && $_SESSION['login']) {
    $id = $_SESSION['login'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "select * from `users` where `id` = '$id'"));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Profile</title>
</head>
<body>
    <div class="profDiv">
    <p>Name: <?=$data['name']?> <button onclick="change('name')">Change</button></p>
    <p>E-mail: <?=$data['email']?> <button onclick="change('email')">Change</button></p>
    <p>Phone number: <?=$data['phone_number']?> <button onclick="change('phone_number')">Change</button></p>
    <button onclick="change('password')">Change password</button>
    <button onclick="logout()">Log out</button>

    <script src="functions.js"></script>
    </div>


    

</body>
</html>