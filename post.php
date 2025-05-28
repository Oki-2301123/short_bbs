<?php
require_once './DB.php';
$name = htmlspecialchars($_POST['name'] ?? '名無し');
$comment = htmlspecialchars($_POST['comment'] ?? '');
$time = date('Y-m-d H:i:s');

if (trim($comment) === '') {
    header("Location: form.php");
    exit;
}
$sql = $pdo->prepare('INSERT INTO comment (user_id, content, created_at) 
                    VALUES (?, ?, ?)');
$sql->execute([1, $comment, $time]);
$entry = "$time\t$name\t$comment\n";
file_put_contents('comments.txt', $entry, FILE_APPEND);
header("Location: view.php");
exit;
