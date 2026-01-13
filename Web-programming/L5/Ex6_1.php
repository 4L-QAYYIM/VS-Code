<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 6.1</title>
</head>
<body>
    <h1>Задание 6.1</h1>
    <form method="POST" action="">
        <div>
            <h2 id="input">Задача 1: Дана форма с инпутом. В инпут вводится дата. После отправки формы определите, была уже дата в текущем году. Результат выведите в абзац.</h2>
            <input name="number1" type="date" placeholder="Введите число" required>
        </div>
        <br>
        <button type="submit" name="send">Send</button>
    </form>
    <h2>Задача 2. Дан массив, по которому нужно реализовать структуру на HTML.</h2>

    <div id="result">
        <?php
        if (isset($_POST['send'])) {
            $date = $_POST['number1'];

            echo "<h3>Ответ:</h3>";

            $dateNow = time();

            if(strtotime($date) - $dateNow < 0){
                echo "<p>Задача 1. Дата $date уже прошла.";
            }
            else{
                echo "<p>Задача 1. Дата $data еще не наступила.";
            }
        }

        echo "<p>Задача 2. Дан массив, по которому нужно реализовать структуру на HTML.</p>";
        $arr = [
            ['href'=>'page1.html', 'text'=>'text1'],
            ['href'=>'page2.html', 'text'=>'text2'],
            ['href'=>'page3.html', 'text'=>'text3'],
        ];

        echo "<ul>";
        foreach ($arr as $obj) {
            echo "<li><a href=\"" . $obj['href'] . "\">" . $obj['text'] . "</a></li>";
        }
        echo "</ul>";

        ?>
    </div>
</body>
</html>