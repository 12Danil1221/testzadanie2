<?php  

    //При выходе удаляем время из куки
    setcookie('login', $login, time() - 3600 * 24 * 30, "/");
    header('Location: ../view/index.view.php');