<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" /> 
        <title>num_5</title> 
    </head>
    <body>
        <form method="post">
            <label for="startt">Первый билет: </label>
            <input type="text" name="startt">
            <label for="endt">Второй билет: </label>
            <input type="text" name="endt">
            <button type="submit">Принять</button>
        </form>

        <?php
            function LuckyTicket(string $ticket){
                $suml = 0;
                $sumr = 0;
                if (strlen($ticket) == 6){
                    $suml = (int)$ticket[0] +(int)$ticket[1] + (int)$ticket[2];
                    $sumr = (int)$ticket[3] + (int)$ticket[4] + (int)$ticket[5]; 
                } else {
                    return false;
                }
                return $suml == $sumr;
            }   
            function CreatTicket($startt, $endt){
                if ((strlen($startt) != 6) || (strlen($endt) != 6)){
                    return "Введите 6 значные номера";
                }
                if ((int)$startt >= (int)$endt){
                    return "Введите номера правильно";
                }
                $ticket = (int)$startt;
                for ($c = (int)$startt; $c <= (int)$endt; $c++){
                    $ticket++;
                    if (LuckyTicket($ticket)){
                        echo $ticket . "<br>";
                    }
                }
            }  
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $startt = $_POST['startt'];
                $endt = $_POST['endt'];
                CreatTicket($startt, $endt);
                }
        ?>
    </body>
</html>