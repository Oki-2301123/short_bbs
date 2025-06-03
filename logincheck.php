<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
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
        header("LOcation: form.php");
    } else {
        header("Location: Login.php");
        exit;
    }
    ?>

</body>

</html>