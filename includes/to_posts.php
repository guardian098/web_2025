<?php

function savePostToDatabase(PDO $connection, array $postParams): int {
    $query = <<<SQL
        INSERT INTO post(title, subtitle, content)
        VALUES (:title, :subtitle, :content)
        SQL;
    
    $statement = $connection->prepare($query);
    $statement->execute([
        ':title' => $postParams['title'],
        ':subtitle' => $postParams['subtitle'],
        ':content' => $postParams['content']
    ]);
    
    return (int)$connection->lastInsertId();
}

function findPostInDatabase(PDO $connection, int $id): ?array {
    $query = <<<SQL
        SELECT 
            id, title, subtitle, content, posted_at 
        FROM post 
        WHERE id = $id
        SQL;
    $statement = $connection->prepare($query);
    $statement->execute([$id]);
    
    return $statement->fetch(PDO::FETCH_ASSOC) ?: null;
}

function findAllPosts(PDO $connection): array {
    $query = <<<SQL
        SELECT * 
        FROM post 
        ORDER BY posted_at DESC
        SQL;
    return $connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
}
?>