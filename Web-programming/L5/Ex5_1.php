<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 5.1</title>
</head>
<body>
    <h1>Задание 5.1</h1>
    <form method="POST" action="">
        <div>
            <h2 id="input">Задача 1: Дана форма с двумя инпутами. В инпуты вводятся числа. После отправки формы выведите сумму введенных чисел.</h2>
            <input name="number1" type="number" placeholder="Введите число" required>
        </div>
        <div>
            <input name="number2" type="number" placeholder="Введите число" required>
        </div>
        <button type="submit" name="send">Send</button>
    </form>
    <h2>Задача 2. По заходу на страницу выведите, сколько дней осталось до Нового Года.</h2>

    <div id="result">
        <?php
        if (isset($_POST['send'])) {
            $num1 = $_POST['number1'];
            $num2 = $_POST['number2'];

            echo "<h3>Ответ:</h3>";

            $sum = $num1 + $num2;

            echo "<p>Задача 1. Сумма чисел $num1 и $num2 равна: $sum</p>";
        }

        echo "<p>Задача 2. По заходу на страницу выведите, сколько дней осталось до Нового Года.</p>";
        $now = time();
        $next_new_year = strtotime('1 January ' . (date('Y') + 1));
        $diff_seconds = $next_new_year - $now;

        $days = floor($diff_seconds / (60 * 60 * 24));

        echo "До Нового года осталось: {$days} дней.";
        ?>
    </div>
</body>
</html>