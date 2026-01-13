<?php

$link = mysqli_connect("MySQL-8.4", "root", "", "my_db");

if (!$link) {
    die("Error: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
    <div class="container">
        <h1>Авторизация</h1>
        <form method="POST" action="authorization.php">
            <div class="form-group">
                <label>E-mail:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
            </div>
            <br>
            <div class="form-group">
                <label>Пароль:</label>
                <input type="password" name="password">
            </div>
            <br>
            <button type="submit" name="login">Войти</button>
        </form>
        <?php
            if (isset($_POST['login'])) {
                if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    $email = mysqli_real_escape_string($link, $_POST['email']);
                    $password = $_POST['password'];

                    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($link, $checkEmailQuery);

                    if ($user = mysqli_fetch_assoc($result)) {
                        if (password_verify($password, $user['password'])) {
                            echo "<p style='color: green;'>Добро пожаловать, " . htmlspecialchars($user['name']) . "!</p>";
                        } else {
                            echo "<p style='color: red;'>Ошибка: Неверный пароль!</p>";
                        }
                    } else {
                        echo "<p style='color: red;'>Ошибка: Пользователь не найден!</p>";
                    }
                }
            }
        ?>
    </div>
    <p>Новый пользователь? <a href="registration.php">Зарегистрироваться</a></p>
</body>
</html>