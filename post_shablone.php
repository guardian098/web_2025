<?php
function post_format(string $user_id){
 
    $users_data = json_decode(file_get_contents(__DIR__ . '/users.json'), true);
    $posts_data = json_decode(file_get_contents(__DIR__ . '/posts.json'), true);

    $user_key = $user_id;
    $user = null;
    foreach ($users_data['users'] as $u) {
        if ($u['id'] == $user_key) {
            $user = $u;
            break;
        }
    }
    if (!$user) return;

    $post = null;
    foreach ($posts_data['posts'] as $p) {
        if ($p['user_id'] == $user_key) {
            $post = $p;
            break;
        }
    }
    if (!$post) return;

    $avatar = $user['avatar'];
    $name = $user['name'];
    $post_photo = $post['content']['media'];
    $likes = $post['stats']['likes'];
    $text = $post['content']['text'];
    $post_time = date("d.m.Y", $post['timestamp']);

    echo <<<HTML
        <div>
            <img class="home__avatar" src=$avatar alt="Аватар 1">
            <span class="user_name">$name</span>
            <button class="pen_icon_round"><img class="pen_icon" src="../image/pen.png" alt="Добавить пост"></button>
        </div>
        <div>
            <img class="post_photo" src=$post_photo alt="Первый пост">
            <button class="home__like_zone"><img src="../image/heart.png" alt="Like">$likes</button>
            <span class="home__comment">$text</span>
            <button class="more_btn">еще</button>
            <span class="date_text">$post_time</span>
        </div>
    HTML;
}
?>