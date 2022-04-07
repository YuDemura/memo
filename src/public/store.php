<?php
$title = $_POST['title'];
$content = $_POST['content'];

$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=memo; charset=utf8", $dbUserName, $dbPassword);

$sql = "insert into pages(title, content) VALUES(:title, :content)";
// $sql = 'INSERT INTO `pages`(`title`, `content`) VALUES(:title, :content)';
$statement = $pdo->prepare($sql);
$statement->bindValue(':title', $title, PDO::PARAM_STR);
$statement->bindValue(':content', $content, PDO::PARAM_STR);
$statement->execute();
header('Location: ./index.php');
