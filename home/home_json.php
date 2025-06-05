<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />   
        <link rel="stylesheet" href="../font.css">
        <link href="home.css" rel="stylesheet">
        <title>home</title>
    </head>
    <body> 
        <div class='container'>
        <div>
            <div class="icons_round">
                <button class="icons"><img src="../image/Home_24.png" alt="Лента"></button>
            </div>
            <div class="icons_round">
                <button class="icons"><img src="../image/User_24.png" alt="Профиль"></button>
            </div>
            <div class="icons_round">
                <button class="icons"><img src="../image/Plus_24.png" alt="Добавить"></button>  
            </div>
        </div>
        <div class='posts'>
        <?php
            include "../post_shablone.php";
            if (isset($_GET["user"])){
                $user_id = trim($_GET["user"]);
                post_format($user_id);
            } else {
                $users = 
                [
                    $user1 = "1",
                    $user2 = "2"
                ];
                foreach ($users as $key => $value) {
                    post_format($value);
                }
            }
        ?>
        </div>
        </div>
    </body>
</html>