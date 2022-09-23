<?php

//регистрация
function registration($arr)
{
    require_once('connect.php');
    session_start();
    //validation
    if ($arr['name'] && $arr['email'] && $arr['phone_number'] && $arr['password'] && $arr['repeat_password']) {
        $errors = '';
        $name =  $_POST['name'];
        $uniqueField = mysqli_fetch_assoc(mysqli_query($connect, "select id from `users` where `name` = '$name'"));
        if ($uniqueField) $errors = "Login is not unique";

        $email =  $_POST['email'];
        $uniqueField = mysqli_fetch_assoc(mysqli_query($connect, "select id from `users` where `email` = '$email'"));
        if ($uniqueField) $errors = $errors . "\nE-mail is not unique";

        $phone_number =  $_POST['phone_number'];
        $uniqueField = mysqli_fetch_assoc(mysqli_query($connect, "select id from `users` where `phone_number` = '$phone_number'"));
        if ($uniqueField) $errors = $errors . "\nPhone number is not unique";

        if ($_POST['password'] !== $_POST['repeat_password']) $errors = $errors . "\nPasswords do not match";

        if ($errors) {
            return $errors;
        }
        $password = hash('md4', $_POST['password']);

        //send data to DB
        mysqli_query($connect, "INSERT INTO `users`(`name`, `email`, `phone_number`, `password`) VALUES ('$name', '$email', '$phone_number', '$password')");
        $_SESSION['login'] = mysqli_fetch_assoc(mysqli_query($connect, "select id from `users` where `name` = '$name'"))['id'];
        return "Successed registration";
    } else {
        return "Some data is not entered";
    }
}
// авторизация
function auth($arr)
{
    session_start();
    require_once('connect.php');
    if ($arr['login'] && $arr['password']) {
        $login =  $_POST['login'];
        $password = hash('md4', $_POST['password']);
        $uniqueField = mysqli_fetch_assoc(mysqli_query($connect, "select id from `users` where `password` = '$password' and `name` = '$login' or `email`='$login'"));

        if ($uniqueField) {
            $_SESSION['login'] = $uniqueField['id'];
            return "Successfully login";
        }
        return "Login or password don't match";
    } else {
        return "Some data is not entered";
    }
}
//выход из профиля
function logout()
{
    session_start();
    session_unset();
    return 'Successfully logout';
}

// сохранение изменения
function change($arr)
{
    session_start();
    require_once('connect.php');

    if ($arr['param'] && $arr['value']) {
        $param = $arr['param'];
        $value = $arr['value'];
        $id = $_SESSION['login'];
        if ($param != 'password') {
            $uniqueField = mysqli_fetch_assoc(mysqli_query($connect, "select id from `users` where `$param` = '$value'"));
            if ($uniqueField) return "That " . $param . " already taken";
        }else{
            $value = hash('md4', $value);
        }

        mysqli_query($connect, "update `users` set `$param` = '$value' where `id` = $id");
        return "Successfully changed";
    } else {
        return "Data is not entered";
    }
}
