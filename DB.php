<?php
function DB()
{
    $param = 'mysql:host=mysql320.phy.lolipop.lan;
              dbname=LAA1554144-board;charset=utf8';
    $user = 'LAA1554144';
    $pass = 'arakame';
    try {
        $pdo = new PDO($param, $user, $pass);
        return $pdo;
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
