<?php
function connectDataBase(): PDO
{
    $dsn = "mysql:host=localhost;dbname=blog";
    $user = "root";
    $pass = "";
    return new PDO($dsn, $user, $pass);
};

function updatePostInDatabase(PDO $connection, array $params, int $id):int
{
    $content = $connection->quote($params['title']);
    $query = <<<SQL
                UPDATE post
                SET content = $content 
                WHERE
                    id = $id
                SQL;
    $connection->exec($query);
    return (int)$connection->lastInsertId();
}

function savePostToDataBase(PDO $connection, array $params): int
{
    $user_id = $connection->quote($params['user_id']);
    $img_1 = $connection->quote($params['img_1']);
    $img_2 = $connection->quote($params['img_2']);
    $img_3 = $connection->quote($params['img_3']);
    $title = $connection->quote($params['title']);
    $query = <<<SQL
                INSERT INTO
                    post(
                        user_id, 
                        title,
                        img_1,
                        img_2,
                        img_3
                    )
                VALUES(
                    $user_id,
                    $title,
                    $img_1,
                    $img_2,
                    $img_3
                )
                SQL;
    $connection->exec($query);
    return (int)$connection->lastInsertId();
}

function saveUserToDataBase(PDO $connection, array $params): int
{
    $user_name = $connection->quote($params['user_name']);
    $img_src = $connection->quote($params['img_src']);
    $age = $connection->quote($params['age']);
    $email = $connection->quote($params['email']);
    $user_description = $connection->quote($params['user_description']);
    $query = <<<SQL
                INSERT INTO
                    user(
                        user_name, 
                        user_description,
                        img_src, 
                        age,
                        email
                    )
                VALUES(
                    $user_name,
                    $user_description,
                    $img_src,
                    $age,
                    $email
                )
                SQL;
    $connection->exec($query);
    return (int)$connection->lastInsertId();
}

function findPostInDatabase(PDO $connection, int $id): array|bool
{
    $query = <<<SQL
                SELECT * 
                FROM
                    post
                WHERE
                    id=$id
                SQL;
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function findUserInDatabase(PDO $connection, int $id): array|bool
{
    $query = <<<SQL
                SELECT * 
                FROM user
                WHERE id=$id
                SQL;
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}
