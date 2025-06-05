<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" /> 
        <title>num_1</title> 
    </head>
    <body>
        <form method="post">
            <label for="year">Введите год: </label>
            <input type="text" name="year" min=1 max=30000> 
            <button type="submit">Принять</button>
        </form>

        <?php
            $year = 0;
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                if (isset($_POST["year"])) {
                    $year = (int)$_POST["year"];
                    if ($year >= 1 && $year <= 30000){
                        if ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0)) {
                            echo "YES";
                        } else {
                            echo "NO";
                        }
                    } else {
                        echo "Введите год от 1 до 30000";
                    }
                }
            } 
        ?>
    </body>
</html>