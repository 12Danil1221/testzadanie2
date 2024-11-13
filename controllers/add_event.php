<?php 
$title = trim(filter_var($_POST['title']));
$image = trim(filter_var($_POST['image']));
$description = trim(filter_var($_POST['description']));
$date = trim(filter_var($_POST['date']));
$ticket_adult_price = trim(filter_var($_POST['ticket_adult_price']));
$ticket_kid_price = trim(filter_var($_POST['ticket_kid_price']));
$event_id = trim(filter_var($_POST['event_id']));

$conn = "mysql:host=localhost;dbname=myapp;user=root;port=3306;";
$pdo = new PDO($conn);

$sql = 'INSERT INTO `events` (`title`, `image`, `description`, `date`, `ticket_adult_price`, `ticket_kid_price`, `event_id`) VALUES (?,?,?,?,?,?,?)';
$query = $pdo->prepare($sql);
$query->execute([$title, $image, $description, $date, $ticket_adult_price, $ticket_kid_price, $event_id]);

header('Location: ../view/index.view.php');
?>
