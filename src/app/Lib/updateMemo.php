<?php
require_once(__DIR__ . '/../Lib/pdoInit.php');

function updateMemo(string $title, string $content, string $id): void
{
	$pdo = pdoInit();

	$sql = <<<EOF
		UPDATE
			pages
		SET
			title=:title
			, content=:content
		WHERE
			id = :id
		;
	EOF;
	$statement = $pdo->prepare($sql);
	$statement->bindValue(':title', $title, PDO::PARAM_STR);
	$statement->bindValue(':content', $content, PDO::PARAM_STR);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
	$statement->execute();
}
