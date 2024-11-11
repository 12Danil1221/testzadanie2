<?php  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title><?= $heading ?></title>
</head>
<style>
main {
    background-color: gainsboro;
}
</style>
<?php  
//подключение модуля шапки
require '../blocks/header.php';
?>
<main>
    <div class="">
        <?php
        //подключение к бд
        $pdo = new PDO("mysql:host=localhost;dbname=myapp;port=3306", 'root', '');

        //sql запрос с выборкой всего из таблицы events
        $sql = "SELECT * FROM events";
        //передача запроса в prepare
        $query = $pdo->prepare($sql);
        //обработка в execute
        $query->execute();    
        
        //преобразуем в ассоциативный массив
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $event) :
?>


        <div class="price-list inline-flex flex-col space-y-10 items-center justify-end"
            style="width: 526px; height:250px;">
            <div class="Group17 flex flex-col items-start justify-end" style="width: 526px; height: 88px;">
                <p class="text-2xl font-bold leading-9 text-black" style="width: 416px;">
                    <?= $event['title'] ?>
                </p>
                <img class="w-1/2" src="../images/<?= $event['image']?>" alt="">
                <p class="text-2xl font-bold leading-9 text-white" style="width: 416px;">
                    <!-- Даем возможность перехода на мероприятие по id только авторизованному пользователю -->
                    <?php if(isset($_COOKIE['login'])) : ?>
                    <a href="../controllers/event.php?id=<?= $event['id']?>" style="color:blue; hover:underline;">
                        <?= "Сделать бронь на мероприятие" ?>
                    </a>
                    <?php endif; ?>
                </p>
                <div class="Line10 opacity-50 border-white" style="width: 526px; height: 1px;"></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>
