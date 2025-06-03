<?php
session_start();
require_once 'DB.php';

    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];

    $pdo = DB();
    $sql = $pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
    $sql->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR);
    $sql->bindValue(':password', $_SESSION['password'], PDO::PARAM_STR);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $_SESSION['username'] = $result['username'];
        $_SESSION['password'] = $result['password'];
        header("Location: form.php");
    } else {
        header("Location: login.php");
        exit;
    }
    ?>