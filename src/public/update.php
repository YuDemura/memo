<?php
require_once(__DIR__ . '/../app/Lib/updateMemo.php');
require_once(__DIR__ . '/../app/Lib/redirect.php');

$id = filter_input(INPUT_POST, 'id');
$title = filter_input(INPUT_POST, 'title');
$content = filter_input(INPUT_POST, 'content');

updateMemo($title, $content, $id);

redirect('./index.php');
?>
