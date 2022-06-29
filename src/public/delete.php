<?php
require_once(__DIR__ . '/../app/Redirect/redirect.php');
require_once __DIR__ . '/../vendor/autoload.php';
use App\Infrastructure\Dao\PageDao;

$id = filter_input(INPUT_GET, 'id');

$pageDao = new PageDao();
$pageDao->deleteMemo($id);

redirect('./index.php');
