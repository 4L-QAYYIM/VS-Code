<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 1.1</title>
</head>
<body>
    <h1>Задание 1.1</h1>
    <form method="POST" action="">
        <div>
            <h2 id="input">Задача 1: Дано число. Проверьте, отрицательное оно или нет. Выведите об этом информацию в консоль.</h2>
            <input name="number1" type="number" placeholder="Введите число" required>
        </div>
        <div id="div2">
            <h2 id="input2">Задача 2: Дано число. Проверьте, четное оно или нет.</h2>
            <input name="number2" type="number" placeholder="Введите число" required>
        </div>
        <br>
        <button type="submit" name="send">Send</button>
    </form>

    <div id="result">
        <?php
        if (isset($_POST['send'])) {
            $num1 = $_POST['number1'];
            $num2 = $_POST['number2'];

            echo "<h3>Ответ:</h3>";

            if ($num1 < 0) {
                echo "<p>Задача 1: Число $num1 отрицательное.</p>";
            } else {
                echo "<p>Задача 1: Число $num1 не отрицательное.</p>";
            }

            if ($num2 % 2 == 0) {
                echo "<p>Задача 2: Число $num2 четное.</p>";
            } else {
                echo "<p>Задача 2: Число $num2 нечетное.</p>";
            }
        }
        ?>
    </div>
</body>
</html>