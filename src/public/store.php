<?php
$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=memo; charset=utf8',
    $dbUserName,
    $dbPassword
);

$content = filter_input(INPUT_POST, 'content');
$title = filter_input(INPUT_POST, 'title');

if (empty($title) && empty($content)) {
    header('Location: ./edit.php');
    exit();
}

$sql = 'INSERT INTO pages(title, content) VALUES(:title, :content)';
$statement = $pdo->prepare($sql);
$statement->bindValue(':title', $title, PDO::PARAM_STR);
$statement->bindValue(':content', $content, PDO::PARAM_STR);
$statement->execute();

header('Location: ./index.php');
exit();
