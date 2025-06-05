<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../font.css">
    <link href="profile.css" rel="stylesheet">
    <title>Профиль</title>
</head>

<body>
    <div class="container">
        <div class="container__icon-menu">
            <div class="icons_round">
                <button class="icons"><a href="../home/home.php"><img src="../image/Home_24.png" alt="Лента"></a></button>
            </div>
            <div class="icons_round">
                <button class="icons"><img src="../image/User_24.png" alt="Профиль"></button>
                <div class="icons__dot">
                    <img src="../image/Dot.png">
                </div>
            </div>
            <div class="icons_round">
                <button class="icons"><img src="../image/Plus_24.png" alt="Добавить"></button>
            </div>
        </div>
        <div class="container__profile">
            <?php
            include "../profile_shablone.php";
            if (isset($_GET["id"])) {
                $id_check = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
                if ($id_check) {
                    $id = trim($_GET["id"]);
                    $users_data = json_decode(file_get_contents("../users.json"), true);
                    $user_exists = false;
                    foreach ($users_data['users'] as $u) {
                        if ($u['id'] == $id_check) {
                            $user_exists = true;
                            break;
                        }
                    }
                    if ($user_exists) {
                        profile_layout($id);
                    } else {
                        header("Location: ../home/home.php");
                        exit;
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>