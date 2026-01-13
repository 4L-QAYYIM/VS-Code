<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 4.1</title>
</head>
<body>
    <h1>Задание 4.1</h1>
    <form method="POST" action="">
        <div>
            <h2 id="input">Задача 1: Сделайте функцию, которая параметром будет принимать секунды, а возвращать количество суток, соответствующих этим секундам.</h2>
            <input name="in1" type="number" required>
        </div>
        <button type="submit" name="send">Отправить</button>
    </form>
    <h2>Задача 2. Сделайте функцию, которая вернет текущий день недели словом.</h2>
 
    <div id="result">
        <?php

        function getDay() {
            $days = [
                'Воскресенье', 
                'Понедельник', 
                'Вторник',     
                'Среда',       
                'Четверг',     
                'Пятница',     
                'Суббота'      
            ];
            $dayIt = date('w');

            return $days[$dayIt];
        }

        function getCountOfDay($num){
            return (($num/60)/60)/24;
        }

        if (isset($_POST['send'])) {
            $in1 = $_POST['in1'];

            echo "<h3>Ответ:</h3>";

            echo "Задача 1. В $in1 секундах содержится суток: " . round(getCountOfDay($in1), 2);

            echo "<p>Задача 2:</p>";
            echo "Сегодня: " . getDay();
        }
        ?>
    </div>
</body>
</html>