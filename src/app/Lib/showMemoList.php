<?php
require_once(__DIR__ . '/../Lib/pdoInit.php');

function showMemoList(string $title, string $content, string $direction): ?array
{
    $pdo = pdoInit();

    $sql = <<<EOF
        SELECT * FROM
            pages
        WHERE
         title
            LIKE
                :title
            OR
            content
                LIKE
                    :content
        ORDER BY
            id
            $direction
        ;
    EOF;
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':content', $content, PDO::PARAM_STR);
    $statement->execute();
    $pages = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $pages;
}
