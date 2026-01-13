<?php

$link = mysqli_connect("MySQL-8.4", "root", "", "my_db");

if (!$link) {
    die("Error: " . mysqli_connect_error());
}

$message = "";

if (isset($_POST['register'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        
        $name = mysqli_real_escape_string($link, $_POST['name']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($link, $checkEmailQuery);

        if (mysqli_num_rows($result) > 0) {
            $message = "<p style='color: red;'>Ошибка: Пользователь с таким email уже зарегистрирован!</p>";
        } else {
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            if (mysqli_query($link, $sql)) {
                $message = "<p style='color: green;'>Успех: Регистрация завершена!</p>";
            }
            else {
                $message = "<p style='color: red;'>Ошибка БД: " . mysqli_error($link) . "</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
    <div class="container">
        <h1>Регистрация</h1>
        <?php echo $message; ?>
        <form method="POST" action="registration.php">
            <div class="form-group">
                <label>Имя:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
            </div>
            <br>
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
            <button type="submit" name="register">Зарегистрироваться</button>
        </form>
    </div>
    <p>Уже зарегистрированы? <a href="authorization.php">Войти</a></p>
</body>
</html>