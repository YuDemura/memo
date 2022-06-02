<?php
require_once(__DIR__ . '/../app/Lib/appshowMessage.php');
require_once(__DIR__ . '/../app/Lib/createMemo.php');
require_once(__DIR__ . '/../app/Lib/redirect.php');

$content = filter_input(INPUT_POST, 'content');
$title = filter_input(INPUT_POST, 'title');

if (empty($title) && empty($content)) {
    redirect('./edit.php');
}

createMemo($title, $content);

redirect('./index.php');
