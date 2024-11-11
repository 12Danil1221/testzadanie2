<?php  
//переменные в которые присвоили значения с формы с удалением лишних пробелов с помощью trim и передачей в $_POST значений
$event_id = trim(filter_var($_POST['event_id']));
$event_date = trim(filter_var($_POST['event_date']));
$date_time = trim(filter_var($_POST['date_time']));
$ticket_adult_price = trim(filter_var($_POST['ticket_adult_price']));
$ticket_adult_quantity = trim(filter_var($_POST['ticket_adult_quantity']));
$ticket_kid_price = trim(filter_var($_POST['ticket_kid_price']));
$ticket_kid_quantity = trim(filter_var($_POST['ticket_kid_quantity']));
$barcodes = trim(filter_var($_POST['barcodes']));
$user_id = trim(filter_var($_POST['user_id']));
$equal_price = trim(filter_var($_POST['equal_price']));

//Подключение к БД через создание класса PDO и передаваемыми данными
$conn = "mysql:host=localhost;dbname=myapp;user=root;port=3306;";
$pdo = new PDO($conn);

//Проверка дубликата, что бронь на данное событие уже сделана event_id с бд 
$sql = 'SELECT 1 FROM buy_tikets WHERE event_id = :event_id';
    //передача запроса в prepare
    $stmt = $pdo->prepare($sql);
    //привязка значений к параметрам запроса
    $stmt->bindParam(':event_id', $event_id);
    $stmt->execute();
    if($stmt->fetch(PDO::FETCH_ASSOC)){
        echo "Бронь на данное мероприятие вы уже сделали";
    }else if($user_id === ':user_id'){
    $sql = 'SELECT user_id FROM buy_tikets WHERE user_id = :user_id';
    $stmt = $pdo->prepare($sql);
    //привязка значений к параметрам запроса
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $stmt->fetch(PDO::FETCH_ASSOC);
    
        echo "Вы уже сделали бронь на ближайшее мероприятие";
    }else{
//Считывание общей суммы стоимости всех билетов
$equal_price = $ticket_adult_price * $ticket_adult_quantity + $ticket_kid_price * $ticket_kid_quantity;

//Генерация barcode 
$count = $ticket_adult_quantity + $ticket_kid_quantity;

$barcodes = [];
for ($i = 0; $i < $count; $i++) {
$barcode = $count + rand(11111111, 55555555);
while (in_array($barcode, $barcodes)) {
    $barcode = rand(11111111, 55555555); // Генерируем новое число
}
$barcodes[] = $barcode; // Добавляем уникальный баркод в массив
}





//sql запрос на вставку нужных данных в таблицу buy_tikets c values, которое содержит какие-то значения в виде ?
$sql = 'INSERT INTO `buy_tikets` (`event_id`, `event_date`, `date_time`, `ticket_adult_price`, `ticket_adult_quantity`, `ticket_kid_price`, `ticket_kid_quantity`, `barcodes`,`user_id`, `equal_price`) VALUES (?,?,?,?,?,?,?,?,?,?)';
//через prepare передаем sql запрос
$query = $pdo->prepare($sql);
//в execute передаем значения которые подставляются в ?
$query->execute([$event_id, $event_date, $date_time, $ticket_adult_price, $ticket_adult_quantity, $ticket_kid_price, $ticket_kid_quantity, json_encode($barcodes), $user_id, $equal_price]);

//переадресация на главную
header('Location: ../view/events.view.php');
}

?>