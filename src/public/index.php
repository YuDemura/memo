<?php
require_once(__DIR__ . '/../app/Lib/showMemoList.php');

if (isset($_GET['order'])) {
    $direction = $_GET['order'];
} else {
    $direction = 'desc';
}

if (isset($_GET['search'])) {
    $title = '%' . $_GET['search'] . '%';
    $content = '%' . $_GET['search'] . '%';
} else {
    $title = '%%';
    $content = '%%';
}

$pages = showMemoList($title, $content, $direction);
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>top画面</title>
</head>

<body>
  <div>
    <div>
      <form action="index.php" method="get">
        <div>
          <input name="search" type="text" value="<?php echo $_GET['search'] ??
              ''; ?>" placeholder="キーワードを入力" />
        </div>
        <div>
          <label>
            <input type="radio" name="order" value="desc" class="">
            <span>新着順</span>
          </label>
          <label>
            <input type="radio" name="order" value="asc" class="">
            <span>古い順</span>
          </label>
        </div>
        <button type="submit">送信</button>
      </form>
    </div>
    <div>
      <a href="./create.php">メモを追加</a><br>
    </div>
    <div>
      <table border="1">
        <tr>
          <th>タイトル</th>
          <th>内容</th>
          <th>作成日時</th>
          <th>編集</th>
          <th>削除</th>
        </tr>
        <?php foreach ($pages as $page): ?>
          <tr>
            <td><?php echo $page['title']; ?></td>
            <td><?php echo $page['content']; ?></td>
            <td><?php echo $page['created_at']; ?></td>
            <td><a href="./edit.php?id=<?php echo $page['id']; ?>">編集</a></td>
            <td><a href="./delete.php?id=<?php echo $page[
                'id'
            ]; ?>">削除</a></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</body>

</html>
