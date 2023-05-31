<?php
session_start();
require_once "shortener.php";

$s = new Shortener();

if(isset($_POST['url'])){
    $url = $_POST['url'];

    if($code = $s->makeCode($url)) {
        $_SESSION['feedback'] = "Ваша ссылка готова: <a
        href='http://localhost/test/$code'>http://localhost/test/$code</a>";
    } else {
        $_SESSION['feedback'] = "Ошибка! Некорректный URL";
    }
}
header('Location: ./index.php');
?>
