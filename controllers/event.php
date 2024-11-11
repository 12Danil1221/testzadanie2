<?php

require '../Database.php';

$db = new Database();

//проверка event с запросом с бд и идентичным id по которому переходим на страницу с бронью где делаем выборку всего из таблицы events
$event = $db->query('SELECT * FROM events where id = :id', ['id' => $_GET['id']])->fetch();



?>
<form action="../controllers/buy_tiket.php" method="post">
    <label>Номер мероприятия: </label>
    <input style="background-color:gainsboro; width:70px" type="fixed" name="event_id" value="<?= $event['event_id']?>"
        readonly></input><br>
    <label>Дата мероприятия:</label>
    <input type="text" name="event_date" value="<?= $event['date']?>" readonly></input>
    <br>
    <label>Выбирайте удобное для вас время: </label>
    <input type="time" name="date_time" value="13:00:00"></input>
    <br>
    <label>Цена взрослого билета: </label>
    <input style="background-color:gainsboro; width:70px" type="fixed" name="ticket_adult_price"
        value="<?= $event['ticket_adult_price']?> руб." readonly></input><br>
    <label>Ведите количество взрослых билетов: </label>
    <input style="width:20px" type="text" name="ticket_adult_quantity" value="1"></input>
    <br>
    <label>Цена детского билета: </label>
    <input style="background-color:gainsboro; width:70px" type="fixed" name="ticket_kid_price"
        value="<?= $event['ticket_kid_price']?> руб." readonly></input>
    <br>
    <label>Ведите количество детских билетов: </label>
    <input style="width:20px" type="text" name="ticket_kid_quantity" value="1"></input>
    <br>
    <?php if(isset($_COOKIE['login'])) :?>
    <input type="hidden" name="user_id" value="<?= $_COOKIE['login'] ?>"></input>
    <?php endif;?>
    <br>
    <input type="hidden" name="barcodes"></input>
    <br>

    <input type="hidden" name="equal_price">
    <button type="submit">Сделать бронь</button>
</form>