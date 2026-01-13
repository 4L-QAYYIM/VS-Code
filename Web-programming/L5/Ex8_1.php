<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 8.1</title>
</head>
<body>
    <h1>Задание 8.1</h1>
    <form method="POST" action="">
        <div>
            <h2 id="input">Задача 1: Дан некоторый URL. Вывести имя домена.</h2>
            <textarea name="in1" cols="150" type="text" required></textarea>
        </div>
        <br>
        <button type="submit" name="send">Отправить</button>
    </form>

    <div id="result">
        <?php
        echo "<h3>Ответ:</h3>";
        echo "Задача 1:";
        if (isset($_POST['send'])) {
            $text = $_POST['in1'];
            $host = parse_url($text, PHP_URL_HOST);
            
            echo "<p>Имя домена: <b>" . htmlspecialchars($host) . "</b></p>";

        }
        echo "Задача 2:";
        echo "<p>x</p>";
        echo "<p>xx</p>";
        echo "<p>xxx</p>";
        echo "<p>xxxx</p>";
        echo "<p>xxxxx</p>";
        ?>
    </div>
</body>
</html>