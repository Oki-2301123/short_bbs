<?php
session_start();

//セッション変数を空にする
session_unset();
$_SESSION = array();
//クッキーの削除
if (isset($_COOKIE['PHPSESSID'])) {
    setcookie('PHPSESSID', '', time() - 3600, '/');
}
//セッションを破棄する
session_destroy();
header('Location: ./login.php');
exit();
