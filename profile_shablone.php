<?php 
function profile_layout(string $id) {

    $users_data = json_decode(file_get_contents(__DIR__ . '/users.json'), true);
    
    $user_key = $id;
    $user = null;
    foreach ($users_data['users'] as $u) {
        if ($u['id'] == $user_key) {
            $user = $u;
            break;
        }
    }
    if (!$user) return;

    $avatar = $user['avatar'];
    $name = $user['name'];
    $text = $user['bio'];
    $post_count = $user['stats']['posts'];

    echo <<<HTML
        <div class="profile__user-unit">
            <img class="profile_avatar" src=$avatar alt="User_profile_photo">
            <h2 class="profile_name">$name</h2>
            <span class="profile_des">$text</span>
            <button class="profile_post-count"><img src="/image/posts.png"><span class="profile_post-count-text">$post_count поста</span></button>
        </div>
    HTML;
echo <<<HTML
    <div class="profile__photo">
HTML;
    foreach ($user['profile_photos'] as $photo) {
        echo <<<HTML
            <img class="photo" src=$photo alt="User_photo">  
        HTML;
    }
echo <<<HTML
        </div>
HTML;
}
