<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" /> 
        <title>num_3</title> 
    </head>
    <body>
        <form method="post">
            <label for="date">Введите дату: </label>
            <input type="text" name="date">
            <button type="submit">Принять</button>
        </form>

        <?php
            function ZodiacSign(string $date) : string{
                $day = 0;
                $month = 0;
                $parts = explode('.', $date); 
                if (count($parts) != 3){
                    echo "Введите полную дату";
                }
                $day = (int)$parts[0];
                $month = (int)$parts[1];
                $year = (int)$parts[2];

                if (!checkdate($month, $day, $year)) {
                    return "Введите правильную дату";
                }
                if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 20)){
                    return "Овен";
                }
                if (($month == 4 && $day >= 21) || ($month == 5 && $day <= 20)){
                    return "Телец";
                }
                if (($month == 5 && $day >= 21) || ($month == 6 && $day <= 21)){
                    return "Близнецы";
                }
                if (($month == 6 && $day >= 22) || ($month == 7 && $day <= 22)){
                    return "Рак";
                }
                if (($month == 7 && $day >= 23) || ($month == 8 && $day <= 23)){
                    return "Лев";
                }
                if (($month == 8 && $day >= 24) || ($month == 9 && $day <= 23)){
                    return "Дева";
                }
                if (($month == 9 && $day >= 24) || ($month == 10 && $day <= 23)){
                    return "Весы";
                }
                if (($month == 10 && $day >= 24) || ($month == 11 && $day <= 22)){
                    return "Скорпион";
                }
                if (($month == 11 && $day >= 23) || ($month == 12 && $day <= 21)){
                    return "Стрелец";
                }
                if (($month == 12 && $day >= 22) || ($month == 1 && $day <= 20)){
                    return "Козерог";
                }
                if (($month == 1 && $day >= 21) || ($month == 2 && $day <= 20)){
                    return "Водолей";
                }
                if (($month == 2 && $day >= 21) || ($month == 3 && $day <= 20)){
                    return "Рыбы";
                }
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["date"])) {
                    $date = (string)$_POST["date"];
                    echo ZodiacSign($date);
                }
            }
        ?>
    </body>
</html>