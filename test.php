<?php
require 'config/database.php';
require 'includes/posts.php';

$connection = connectDatabase();

// Тест сохранения
$postId = savePostToDatabase($connection, [
    'title' => 'Тестовый пост',
    'subtitle' => 'Пример подзаголовка',
    'content' => 'Содержание тестового поста...'
]);

// Тест чтения
$post = findPostInDatabase($connection, $postId);
echo "<pre>";
print_r($post);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    <time><?= $post['posted_at'] ?></time>
</body>
</html>