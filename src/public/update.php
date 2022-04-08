<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=memo; charset=utf8", $dbUserName, $dbPassword);
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $newTitle = $_POST['title'];
    $newContent = $_POST['content'];
    $id = $_POST['id'];
    $sql = "update pages set title=:title, content=:content where id=:id";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':title', $newTitle, PDO::PARAM_STR);
    $statement->bindValue(':content', $newContent, PDO::PARAM_STR);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}
header('Location: ./index.php');
