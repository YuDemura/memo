<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=memo; charset=utf8", $dbUserName, $dbPassword);

$id = $_GET['id'];
$sql = "select * from pages where id=:id";
$statement = $pdo->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
$memo = $statement->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>メモ編集ページ</title>
</head>
<body>
    <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $memo['id'] ?>">
        <p>編集</p>
        <table>
            <tr>
                <td>title</td>
            </tr>
            <tr>
                <td><input type="text" name="title" value="<?php echo $memo['title'] ?>"></td>
            </tr>
            <tr>
                <td>本文</td>
            </tr>
            <tr>
                <td><input type="text" name="content" value="<?php echo $memo['content'] ?>"></td>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td><p><input type="submit" value="更新"></p></td>
            </tr>
        </table>
    </form>
</body>
