<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 10.1</title>
</head>
<body>
    <h1>Задание 10.1</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <div>
            <h2 id="input">Задача 1. Сделайте функцию, которая параметром будет принимать английское существительное в единственном числе и возвращать его во множественном числе.</h2>
            <input name="in1" type="text">
        </div>
        <div>
            <h2 id="input2">Задача 2. Дан текст со знаками препинаний. Получите массив слов из такого текста.</h2>
            <textarea name="in2" rows="5" cols="40"></textarea>
        </div>
        <br>
        <button type="submit" name="send">Отправить</button>
    </form>

    <div id="result">
        <?php
        if (isset($_POST['send'])){
            echo "<h3>Ответ:</h3>";
            if (!empty($_POST['in1'])) {
                $word = trim($_POST['in1']);
                
                function makePlural($singular) {
                    $lastChar = strtolower(substr($singular, -1));
                    $lastTwoChars = strtolower(substr($singular, -2));

                    if ($lastChar == 'y') {
                        return substr($singular, 0, -1) . 'ies';
                    }
                    elseif (in_array($lastChar, ['s', 'x']) || in_array($lastTwoChars, ['ch', 'sh'])) {
                        return $singular . 'es';
                    }
                    else {
                        return $singular . 's';
                    }
                }

                $plural = makePlural($word);
                echo "<p>Задача 1: Множественное число слова $word — $plural</p>";
            }

            if (!empty($_POST['in2'])) {
                $text = $_POST['in2'];
                $wordsArray = preg_split('/[^a-z0-9а-яё]+/ui', $text, -1, PREG_SPLIT_NO_EMPTY);
                
                echo "<p>Задача 2: Полученный массив слов:</p>";
                echo "<pre>";
                print_r($wordsArray);
                echo "</pre>";
            }
        }
        ?>
    </div>
</body>
</html>