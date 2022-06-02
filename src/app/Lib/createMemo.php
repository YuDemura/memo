<?php
require_once(__DIR__ . '/../Lib/pdoInit.php');

function createMemo(string $title, string $content): void
{
    $pdo = pdoInit();

    $sql = <<<EOF
        INSERT INTO
            pages
                (title
                , content)
        VALUES
            (:title
            , :content)
        ;
    EOF;
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':content', $content, PDO::PARAM_STR);
    $statement->execute();
}
