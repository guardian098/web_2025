<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" /> 
        <title>num_6</title> 
    </head>
    <body>
        <form method="post">
            <label for="num">Введите число: </label>
            <input type="text" name="num">
            <button type="submit">Принять</button>
        </form>

        <?php
            function fact(int $num){ //обработка отрицатльных чисел
                if ($num == 0){
                    return 1;
                } elseif ($num < 0) {
                    return false;
                } else {
                    return $num * fact($num - 1);
                }
            } 
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $num = $_POST["num"];
            }
            if ((int)$num >= 0){
                echo fact((int)$num);
            } else {
                echo "Введите неотрицательное число";
            }
        ?>
    </body>
</html>