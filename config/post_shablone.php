<?php
require_once 'database.php';

function displayPost(array $postData): void {
    
    $connection = connectDataBase();
    $user = findUserInDatabase($connection, $postData['user_id']);
    
    $user_avatar = htmlspecialchars($user['avatar']);
    $user_name = htmlspecialchars($user['username'] ?? 'Аноним');
    $post_text = htmlspecialchars($postData['title'] ?? '');
    $post_likes = (int)($postData['likes_count'] ?? 0);
    $post_time = date('d.m.Y', strtotime($postData['posted_at'] ?? 'now'));

    ?>
    <div class="post">
        <div class="post__header">
            <div class="post_author author">
                <img class="home__avatar" src="<?= $user_avatar ?>" alt="Аватар">
                <span class="author__name"><?= $user_name ?></span>
            </div>
            <button class="post__edit-button">
                <img class="pen_icon" src="../image/pen.png" alt="Добавить пост">
            </button>
        </div>
        <div class="post__main">
            <div class="post__modal-window">
                <div class="post__images">
                    <?php 
                        $images = [];
                        for ($i = 1; $i <= 3; $i++) {
                            if (!empty($postData["img_$i"]) && ($postData["img_$i"] != '../image/')) {
                                $images[] = $postData["img_$i"];
                            }
                        }
                        $totalImages = count($images);
                    ?>
    
                    <?php if ($totalImages > 0): ?>
                    <div class="slider-container" data-slider data-post-id="<?= $postData['id'] ?? uniqid() ?>">
                        <?php foreach ($images as $index => $image): ?>
                        <img class="post__photo <?= $index === 0 ? 'active' : '' ?>" 
                        src="<?= htmlspecialchars($image) ?>" 
                        alt="Изображение поста">
                        <?php endforeach; ?>
            
                        <?php if ($totalImages > 1): ?>
                        <button class="slider-arrow prev" type="button">
                            <img src="../image/Slider_Button_left.png" alt="Предыдущее">
                        </button>
                        <button class="slider-arrow next" type="button">
                            <img src="../image/Slider_Button_right.png" alt="Следующее">
                        </button>
                        <div class="slider-indicator">
                            <span class="current-slide">1</span>/<span class="total-slides"><?= $totalImages ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="modal-overlay" id="modal-<?= $postData['id'] ?? '' ?>">
                <div class="modal-container">
                    <button class="modal-close">&times;</button>
                    <div class="modal-slider">
                        <?php foreach ($images as $index => $image): ?>
                            <img class="modal-image <?= $index === 0 ? 'active' : '' ?>" 
                                src="<?= htmlspecialchars($image) ?>"
                                data-index="<?= $index ?>">
                        <?php endforeach; ?>
                    </div>
                    <?php if ($totalImages > 1): ?>
                    <button class="modal-nav modal-prev">&larr;</button>
                    <button class="modal-nav modal-next">&rarr;</button>
                    <div class="modal-counter">
                        <span class="modal-current">1</span>/<span class="modal-total"><?= $totalImages ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <button class="post__reaction">
                <img class="likes" src="../image/heart.png" alt="Like"><span class="likes-text"><?= $post_likes ?></span>
            </button>
            <p class="home__comment"><?= $post_text ?></p>
            <button class="more_btn">еще</button>
            <span class="date_text"><?= $post_time ?></span><br><br>
        </div>
    </div>
    <?php
}

function displayAllPosts(): void {
    $connection = connectDataBase();
    $posts = $connection->query("SELECT * FROM post ORDER BY posted_at DESC")->fetchAll();
    
    foreach ($posts as $post) {
        displayPost($post);
    }
}
?>