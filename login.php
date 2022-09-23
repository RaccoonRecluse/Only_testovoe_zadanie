<?php
session_start();
if (isset($_SESSION['login'])) {
    header('location: /profile');
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="functions.js"></script>
    <title>New</title>
</head>
<body>
<form action="" id="form" method="post" onsubmit="auth(event)">
        <label for="">
            Login
            <input type="text" name="login" placeholder="E-mail or Login" required>
        </label>
        <label for="">
            Password
            <input type="password" name="password" min="8" placeholder="Password" required>
        </label>
        <div class="g-recaptcha" data-sitekey="6LdHziIiAAAAAG0pRUrsN8-PSzSAs2cwD11cgut_"></div>
        <p>Don't have account? <a href="/register">Register</a></p>
        
        <button type="submit">Log in</button>
    </form>
</body>


</html>