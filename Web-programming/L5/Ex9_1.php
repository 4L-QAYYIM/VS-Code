<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 9.1</title>
</head>
<body>
    <h1>Задание 9.1</h1>
    <form method="POST" action="">
        <div>
            <h2 id="input">Задача 1: Дан текст со знаками препинаний. Получите массив предложений этого текста..</h2>
            <textarea name="in1" rows="5" cols="40" type="text"></textarea>
        </div>
        <div>
            <h2 id="input2">Задача 1: Всем ссылкам, ведущим на чужой сайт, добавьте target="_blank".</h2>
            <textarea name="in2" cols="150" type="text"></textarea>
        </div>
        <br>
        <button type="submit" name="send">Отправить</button>
    </form>

    <div id="result">
        <?php
        echo "<h3>Ответ:</h3>";
        if (isset($_POST['send'])) {
            if (!empty($_POST['in1'])) {
            $text = $_POST['in1'];
            $sentences = preg_split('/(?<=[.!?])\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
            
            echo "<h4>Предложения:</h4><ul>";
            foreach ($sentences as $s) {
                echo "<li>" . htmlspecialchars($s) . "</li>";
            }
            echo "</ul>";
            }

            if (!empty($_POST['in2'])) {
                $html = $_POST['in2'];
                $pattern = '/<a\s+(?!.*?target="_blank")(href="https?:\/\/[^"]+")/i';
                $replacement = '<a $1 target="_blank"';
                $resultHtml = preg_replace($pattern, $replacement, $html);
                
                echo "<h4>Задача 2:</h4>";
                echo "<textarea cols='100' rows='5'>" . htmlspecialchars($resultHtml) . "</textarea>";
            }
        }
        ?>
    </div>
</body>
</html>