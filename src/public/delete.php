<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=memo; charset=utf8", $dbUserName, $dbPassword);
$id = $_GET['id'];
if (isset($id) && is_numeric($id)) {
    $sql = "delete from pages where id=:id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}
header('Location: ./index.php');
