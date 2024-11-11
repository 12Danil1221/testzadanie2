<header>
    <!-- Сделал шапку с проверкой через if, что не содержит isset куку login, которая присваивается при авторизации -->
    <?php if(!isset($_COOKIE['login'])) : ?>
    <a href="./register.view.php">Регистрация</a>
    <a href="./auth.view.php">Авторизация</a>

    <?php endif;?>
    <!-- Сделал шапку с проверкой через if, что содержит isset куку login, которая присваивается при авторизации -->
    <?php if(isset($_COOKIE['login'])) : ?>
    <a href="../view/index.view.php">Главная</a>
    <a href="./events.view.php">Мероприятия</a>
    <a href="../controllers/logout.php">Выход</a>
    <?php endif;?>
</header>