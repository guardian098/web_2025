<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />  
        <link rel="stylesheet" href="../font.css">
        <link href="profile.css" rel="stylesheet" > 
        <title>profile</title> 
    </head>
    <body>
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
        <?php
            include "../profile_shablone.php";
            if (isset($_GET["id"])) {
                $id_check = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
                if ($id_check) {
                    $id = "user" . trim($_GET["id"]);
                    if (isset(json_decode(file_get_contents("../profile.json"), true)[$id])) 
                    {
                        profile_layout($id);
                    }
                   else 
                    {
                        header("Location: ../home/home.php");
                        exit;
                    }
                }
                else
                {
                    header("Location: ../home/home.php");
                    exit;
                }
            }
            else
                {
                    header("Location: ../home/home.php");
                    exit;
                }
        ?>
    </body>
</html>