<?php
require_once(__DIR__ . '/../Lib/pdoInit.php');

function deleteMemo(string $id): void
{
    $pdo = pdoInit();

    $sql = <<<EOF
        DELETE FROM
            pages
        WHERE
             id = :id
        ;
    EOF;
    $statement = $pdo->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
}
