<?php
namespace App\Infrastructure\Dao;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PDO;
/**
 * メモ情報を操作するDAO
 */
final class PageDao extends Dao
{
    /**
     * メモ登録処理
     * @param string $title
     * @param string $content
     */
    public function createMemo(string $title, string $content): void
    {
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
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':content', $content, PDO::PARAM_STR);
        $statement->execute();
    }

    /**
     * メモ削除
     * @param string $id
     */
    public function deleteMemo(string $id): void
    {
        $sql = <<<EOF
            DELETE FROM
                pages
            WHERE
                id = :id
            ;
        EOF;
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    /**
     * 編集するメモの呼び出し
     *@param string $id
     */
    public function editMemo(?string $id): ?array
    {
        $sql = <<<EOF
            SELECT * FROM
                pages
            WHERE
                id = :id
            ;
        EOF;
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $memo = $statement->fetch();
        return $memo;
    }

    /**
     *検索によるメモ一覧表示
     * @param string $title
     * @param string $content
     * @param string $direction
     */
    public function showMemoList(string $title, string $content, string $direction): ?array
    {
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
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':content', $content, PDO::PARAM_STR);
        $statement->execute();
        $pages = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $pages;
    }

    /**
     * メモ更新
     * @param string $title
     * @param string $content
     * @param string $id
     */
    public function updateMemo(string $title, string $content, string $id): void
    {
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
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':content', $content, PDO::PARAM_STR);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
