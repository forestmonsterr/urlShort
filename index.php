<!DOCKTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>URL Сокращатель</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <h1 class="title"> URL Сокращатель</h1>
        <form action="php/shorten.php" method="post">
            <input type="url" name="url" placeholder="Введите URL" autocomplete="off">
            <input type="submit" value="Сократить">
        </form>

    </div>
</body>
</html>