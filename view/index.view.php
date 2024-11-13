<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    require '../blocks/header.php';
?>
<main>

    <body>
        <h1>Главная страница</h1>
            //Форма добавления мероприятия
                <form style="background-color:gainsboro" action="../controllers/add_event.php" method="post">
            <label for="">Название</label>
            <input type="text" name="title">
            <br><br>
            <label for="">Изображение</label>
            <input type="text" name="image">
            <br><br>
            <label for="">Описание</label>
            <input type="text" name="description">
            <br><br>
            <label for="">Дата мероприятия</label>
            <input type="date" name="date">
            <br><br>
            <label for="">Цена взрослого билета</label>
            <input type="int" name="ticket_adult_price">
            <br><br>
            <label for="">Цена детского билета</label>
            <input type="int" name="ticket_kid_price">

            <input type="hidden" name="event_id" value="4">
            <br><br>
            <button style="background-color:slategray; background-rounded: 1px solid" type="submit">Добавить
                событие</button>
        </form>
        
        <?php 
    $pdo = new PDO("mysql:host=localhost;dbname=myapp;port=3306;", 'root','');

    $sql = "SELECT * FROM events";
    $query = $pdo->prepare($sql);
    $query->execute();
    $events = $query->fetchAll(PDO::FETCH_ASSOC);

    
        ?>
        <div class="Group17 fixed flex-col items-start justify-end" style="width: 526px; height: 88px;">
            <?php foreach($events as $event) :?>
            <p class="text-2xl font-bold leading-9 text-white" style="width: 416px;"><?=$event['title']?></p>
            <?php
        endforeach;
    ?>
        </div>
    </body>
</main>

</html>
