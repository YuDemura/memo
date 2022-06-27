<?php
require_once(__DIR__ . '/../app/Redirect/redirect.php');
require_once __DIR__ . '/../vendor/autoload.php';
use App\Infrastructure\Dao\PageDao;

$id = filter_input(INPUT_POST, 'id');
$title = filter_input(INPUT_POST, 'title');
$content = filter_input(INPUT_POST, 'content');

$pageDao = new PageDao();
$pageDao->updateMemo($title, $content, $id);

redirect('./index.php');
?>
