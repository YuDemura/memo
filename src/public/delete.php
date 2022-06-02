<?php
require_once(__DIR__ . '/../app/Lib/deleteMemo.php');
require_once(__DIR__ . '/../app/Lib/redirect.php');

$id = filter_input(INPUT_GET, 'id');

deleteMemo($id);

redirect('./index.php');
