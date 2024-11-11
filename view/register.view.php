<?php  
require '../blocks/header.php';
?>
<form action="../controllers/register.php" method="post">

    <h1>Регистрация</h1>
    <br><br>
    <label>Логин:</label>
    <input type="text" name="login">
    <br><br>
    <label>Email:</label>
    <input type="email" name="email">
    <br><br>
    <label>Пароль:</label>
    <input type="password" name="password">
    <br><br>

    <button type="submit">Регистрация</button>
</form>