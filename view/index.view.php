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