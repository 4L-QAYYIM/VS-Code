<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 7.1</title>
</head>
<body>
    <h1>Задание 7.1</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <div>
            <h2 id="input">Задача 1. Дан текстовый файл. Получите количество символов в нем.</h2>
            <input name="in1" type="file">
        </div>
        <div>
            <h2 id="input2">Задача 2. Дана форма с текстареа и кнопкой. Юзер вводит текст в форму. После отправки формы запишите введенный текст в какой-нибудь файл.</h2>
            <textarea name="in2" rows="5" cols="40"></textarea>
        </div>
        <br>
        <button type="submit" name="send">Отправить</button>
    </form>

    <div id="result">
        <?php
        if (isset($_POST['send'])){
            echo "<h3>Ответ:</h3>";
            if(isset($_FILES['in1'])) {
                $fileTmp = $_FILES['in1']['tmp_name'];
                $fileName = $_FILES['in1']['name'];

                if (is_uploaded_file($fileTmp)) {
                    $size = filesize($fileTmp);
                    echo "Количество символов в файле: " . $size;
                } else {
                    echo "<p>Файл не загружен.</p>";
                }
            }
            
            if(isset($_POST['in2'])) {
                $text = $_POST['in2'];
                $outputFile = 'output.txt';
                
                file_put_contents($outputFile, $text . PHP_EOL, FILE_APPEND);
                
                echo "<p>Задача 2: Текст успешно записан в файл <a href='$outputFile' target='_blank'><b>$outputFile</b></a>.</p>";
            }
        }
        ?>
    </div>
</body>
</html>