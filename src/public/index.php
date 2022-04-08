<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=memo; charset=utf8", $dbUserName, $dbPassword);

//一覧表示
$sql = "select * from pages";
$statement = $pdo->prepare($sql);
$statement->execute();
$memos = $statement->fetchAll();

//あいまい検索機能
$textbox = $_POST['textbox'];
if (!empty($textbox)) {
    $sql = "select * from pages where content like '%$textbox%'";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $memos = $statement->fetchAll();
}
//並べ替え機能
//新しい順（降順）
if (isset($_POST['new'])) {
    $sql = "select * from pages order by created_at desc";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $memos = $statement->fetchAll();
}
//古い順（昇順）
if (isset($_POST['old'])) {
$sql = "select * from pages order by created_at";
$statement = $pdo->prepare($sql);
$statement->execute();
$memos = $statement->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>メモ一覧</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="textbox" placeholder="search..">
    <input type="submit" name="search" value="検索">
<h3>メモ一覧</h3>
<a href="./create.php">
    <p>メモを追加</p>
</a>
    <input type="submit" name="new" value="新しい順">
    <input type="submit" name="old" value="古い順">
    <table>
        <tr>
            <th>タイトル</th>
            <th>内容</th>
            <th>作成日時</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        <?php foreach ($memos as $memo): ?>
        <tr>
            <td><?php echo $memo['title']; ?></td>
            <td>    <?php echo $memo['content']; ?>
</td>
            <td><?php echo $memo['created_at']; ?>
</td>
            <td><a href="edit.php?id=<?php echo $memo['id'] ?>">編集</a>
</td>
            <td><a href="delete.php?id=<?php echo $memo['id'] ?>">削除</a>
</td>
        </tr>
        <?php endforeach; ?>
    </table>
</form>
</body>
</html>
