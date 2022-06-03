<?php
require_once(__DIR__ . '/../Lib/pdoInit.php');

function editMemo(string $id)
{
    $pdo = pdoInit();

    $sql = <<<EOF
        SELECT * FROM
            pages
        WHERE
            id = :id
        ;
    EOF;
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $memo = $statement->fetch();
    return $memo;
}
