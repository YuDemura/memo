<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>メモ登録</title>
</head>
<body>
    <form action="./store.php" method="POST">
        <p>メモ登録</p>
        <table>
            <tr>
                <td>title</td>
            </tr>
            <tr>
                <td><input type="text" name="title" placeholder="タイトル" /></td>
            </tr>
            <tr>
                <td>本文</td>
            </tr>
            <tr>
                <td><input type="text" name="content" placeholder="本文" /></td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td><button type="submit" name="button">送信</button>
</td>
            </tr>
        </table>
    </form>
</body>
</html>
