<?php  


$pdo = new PDO("mysql:host=localhost;dbname=myapp;port=3306", 'root', '');


$login = trim(filter_var($_POST['login']));
$email = trim(filter_var($_POST['email']));
$password = trim(filter_var($_POST['password']));


$conn = "mysql:host=localhost;dbname=myapp;user=root;port=3306;";
$pdo = new PDO($conn);


$sql = 'INSERT INTO `users` (`login`, `email`, `password`) VALUES (?,?,?)';
$query = $pdo->prepare($sql);
$query->execute([$login, $email, $password]);

header('Location: ../view/auth.view.php');