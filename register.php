<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="functions.js"></script>
    <title>Registration</title>
</head>
<?php
session_start();
if (isset($_SESSION['login'])) {
    header('location: /profile');
}
?>
<body>
    <form id="form" method="post" onsubmit="registration(event)">
        <label for="">
            Name
            <input type="text" name="name" placeholder="Name" required>
        </label>
        <label for="">
            E-mail
            <input type="email" name="email" placeholder="E-mail" required>
        </label>
        <label for="">
            Phone number
            <input type="tel" name="phone_number" placeholder="Phone number without plus" required minlength="11" maxlength="11" pattern="[0-9]{11}">
        </label>
        <label for="">
            Password
            <input type="password" name="password" minlength="8" placeholder="Minimum 8 characters" required>
        </label>
        <label for="">
            Repeat password
            <input type="password" name="repeat_password" minlength="8" placeholder="Repeat password" required>
        </label>
        <p>Already have account? <a href="/login">Login</a></p>
        <button type="submit">Registration</button>
    </form>
</body>


</html>