<?php  
require '../blocks/header.php';
?>
<form action="../controllers/auth.php" method="post">

    <h1>Авторизация</h1>
    <br><br>
    <label>Логин:</label>
    <input type="text" name="login">
    <br><br>
    <label>Пароль:</label>
    <input type="password" name="password">
    <br><br>

    <button type="submit">Авторизация</button>
</form>
