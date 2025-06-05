<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />   
        <link rel="stylesheet" href="../font.css">
        <link href="home.css" rel="stylesheet" >
        <title>home</title> 
    </head>
    <body> 
        <div class="container">
        <div class="container__icon-menu">
            <div class="icons_round">
                <button class="icons"><img src="../image/Home_24.png" alt="Лента"></button>
                <div class="icons__dot">
                    <img src="../image/Dot.png">
                </div>
            </div>
            <div class="icons_round">
                <button class="icons"><a href="../profile/profile.php?id=1"><img src="../image/User_24.png" alt="Профиль"></a></button>
            </div>
            <div class="icons_round">
                <button class="icons"><img src="../image/Plus_24.png" alt="Добавить"></button>  
            </div>
        </div>
        <div class="container__posts">
        <?php
            require_once '../config/post_shablone.php';
            displayAllPosts(); 
        ?>
        </div>
    </div>
    <script src="../config/slider.js"></script>
    <script src="../config/modal.js"></script>
    </body>
</html>