<?php
require_once(__DIR__ . '/../app/Redirect/redirect.php');
require_once __DIR__ . '/../vendor/autoload.php';
use App\Infrastructure\Dao\PageDao;

$content = filter_input(INPUT_POST, 'content');
$title = filter_input(INPUT_POST, 'title');

if (empty($title) && empty($content)) {
    redirect('./create.php');
}

$pageDao = new PageDao();
$pageDao->createMemo($title, $content);

redirect('./index.php');
