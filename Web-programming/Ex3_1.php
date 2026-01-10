<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 3.1</title>
</head>
<body>
    <h1>Задание 3.1</h1>
    <form method="POST" action="">
        <div>
            <h2 id="input">Задача 1: Дано некоторое число. Проверьте, что цифры этого числа расположены по возрастанию.</h2>
            <input name="in1" type="number" required>
        </div>
        <div id="div2">
            <h2 id="input2">Задача 2: Удалите из массива все пустые строки.</h2>
            <input name="in2">
        </div>
        <br>
        <button type="submit" name="send">Отправить</button>
    </form>

    <div id="result">
        <?php
        if (isset($_POST['send'])) {
            $in1 = $_POST['in1'];
            $in2 = $_POST['in2'];

            echo "<h3>Ответ:</h3>";

            $status = true;

            for($i = 0; $i < strlen($in1) - 1; $i++){
                if($in1[$i] > $in1[$i + 1]){
                    $status = false;
                    break;
                }
            }

            if ($status) {
                echo "<p>Задача 1: В числе $in1 цифры расположены по возрастанию.</p>";
            } else {
                echo "<p>Задача 1: В числе $in1 цифры расположены не по возрастанию.</p>";
            }

            echo "<p>Задача 2:</p>";
            $text1 = $_POST['in2'];
            $V3_2_1 = [];
            $v = 0;

            while ($v < strlen($text1)) {
                if ($text1[$v] != " ") {
                    $t = $v;
                    $el = "";

                    while ($t < strlen($text1) && $text1[$t] != " ") {
                        $el .= $text1[$t];
                        $t++;
                        $v = $t;
                    }
                    $V3_2_1[] = (int)$el; 
                }
                $v++;
            }

            $arr = implode(", ", $V3_2_1);
            $count = count($V3_2_1);
            echo "Массив без пустых строк: [$arr] Длина: $count";
        }
        ?>
    </div>
</body>
</html>