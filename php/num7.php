<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" /> 
        <title>num_7</title> 
    </head>
    <body>
        <form method="post">
            <label for="text">Введите пример: </label>
            <input type="text" name="text">
            <button type="submit">Принять</button>
        </form>

        <?php
            function action(int $num1, int  $num2, string $s){
                if($s == "+"){
                    return ($num1 + $num2);
                }elseif($s == "-"){
                    return ($num1 - $num2);
                }elseif($s == "*"){
                    return ($num1 * $num2);
                }
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $text = $_POST["text"];
                $t = "";
                for($i = 0; $i < strlen($text); $i++){
                    if($text[$i] != " "){
                        $t = $t . $text[$i];
                    }
                }
                $rnum = "";
                $num1 = "";
                $num2 = "";
                for($i = 0; $i < strlen($t); $i++){                 
                    if(($t[$i] == "+") || ($t[$i] == "-") || ($t[$i] == "*")){                      
                        $num2 = action($num1, $num2, $t[$i]);
                        $num1 = $rnum;
                    }else{
                        $rnum = $num1;
                        $num1 = $num2;
                        $num2 = $t[$i];
                    }
                }
                echo $num2;
            }
        ?>
    </body>
</html>