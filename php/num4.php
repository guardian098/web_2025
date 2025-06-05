<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" /> 
        <title>num_4</title> 
    </head>
    <body>
        <form method="post">
            <label for="date">Введите дату: </label>
            <input type="text" name="date">
            <button type="submit">Принять</button>
        </form>

        <?php
            function DateIn(string $date){
                $elem = [];
                $i = 0;
                for ($c = 0; $c < strlen($date); $c++){
                    if ((int)$date[$c] >= 0 && (int)$date[$c] <= 9){
                        $elem[$i] = $date[$c];
                        $i++;
                    }
                }
                if (count($elem) >= 4){
                    $day = $elem[0] . $elem[1];
                    $month = $elem[2] . $elem[3];
                    if (count($elem) >= 8){
                        $year = $elem[4] . $elem[5] . $elem[6] . $elem[7];
                    }
                } 
            }
            function ZodiacSign(string $date){
                global $day;
                global $month;
                global $year;
                DateIn($date);
                echo($day);
                echo($day);
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
                $date = (string)$_POST["date"];
                echo ZodiacSign($date);
            }
        ?>
    </body>
</html>