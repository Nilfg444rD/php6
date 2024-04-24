<?php
session_start();
if (isset($_POST['login_submit'])) {
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        $file = file('users.txt');
        $found = false;
        foreach ($file as $line) {
            if (trim($line) == $login . ":" . $password) {
                $found = true;
                break;
            }
        }
        if ($found) {
            $_SESSION['login'] = $login;
            header('Location: dashboard.php');
        } else {
            echo 'Неверный логин или пароль.';
        }
    } else {
        echo 'Пожалуйста, заполните все поля.';
    }
}

