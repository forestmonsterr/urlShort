<?php
session_start();
?>
<!DOCKTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Сокращатель</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <h1 class="title"> URL Сокращатель</h1>
        <?php
        if(isset($_SESSION['feedback'])) {
            echo "<p>".$_SESSION['feedback']."</p>";
            unset($_SESSION['feedback']);
        }
        ?>
        <form action="php/shorten.php" method="post">
            <input type="url" name="url" placeholder="Введите URL" autocomplete="off">
            <input type="submit" value="Сократить">
        </form>

    </div>
</body>
</html>