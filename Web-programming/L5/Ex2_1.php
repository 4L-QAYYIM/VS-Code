<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2.1</title>
</head>
<body>
    <h1>Задание 2.1</h1>
    <form method="POST" action="">
        <div>
            <h2 id="input">Задача 1: Дана некоторая строка. Найдите позицию первого нуля в строке.</h2>
            <input name="in1" required>
        </div>
        <h2 id="input2">Задача 2: Выведите в консоль все числа в промежутке от 1 до 1000, сумма первой и второй цифры которых равна пяти.</h2>
        <br>
        <button type="submit" name="send">Отправить</button>
    </form>

    <div id="result">
        <?php
        if (isset($_POST['send'])) {
            $in1 = $_POST['in1'];
            $in2 = $_POST['in2'];

            echo "<h3>Ответ:</h3>";

            for($i = 0; $i < strlen($in1); $i++){
                if($in1[$i] == '0'){
                    echo "<p>Задача 1:Строка $in1. Первый '0' на индексе " . $i;
                }
            }

            echo "<p>Задача 2:</p>";
            echo "5\n";
            for($i = 10; $i < 1001; $i++){
                if((int)((string)$i)[0] + (int)((string)$i)[1] == 5){
                    echo "$i\n";
                }
            }
        }
        ?>
    </div>
</body>
</html>