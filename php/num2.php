<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" /> 
        <title>num_2</title> 
    </head>
    <body>
        <form method="post">
            <label for="digit">Введите цифру: </label>
            <input type="text" name="digit">
            <button type="submit">Принять</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["digit"])) {
                    $digit = (int)$_POST["digit"];
                }
            }
            $return_value = match($digit){
                0 => "Нуль",
                1 => "Один",
                2 => "Два",
                3 => "Три",
                4 => "Четыре",
                5 => "Пять",
                6 => "Шесть",
                7 => "Семь",
                8 => "Восемь",
                9 => "Девять",
                default => "Введите цифру от 0 до 9"
            };
            echo $return_value;
        ?>
    </body>
</html>