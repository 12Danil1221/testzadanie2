<?php  
//Подключение к БД через создание класса PDO и передаваемыми данными
$pdo = new PDO("mysql:host=localhost;dbname=myapp;port=3306", 'root', '');

//переменные в которые присвоили значения с формы с удалением лишних пробелов с помощью trim и передачей в $_POST значений
$login = trim(filter_var($_POST['login']));
$password = trim(filter_var($_POST['password']));

//Создание sql запроса с проверкой полей на равенство с бд
$sql = 'SELECT id FROM `users` WHERE login = ? AND password = ?';
//Передаем запрос sql в prepare
$query = $pdo->prepare($sql);
//Поля которые в запросе содержали какое-то значение в виде ? передаем в обработку execute
$query->execute([$login, $password]);
//через метод fetchAll и класса PDO который обращается преобразуем результат в ассоциативный массив
$result = $query->fetchAll(PDO::FETCH_ASSOC);

//проверка что результат не нашел данных с бд, то вывод ошибки 
if($query->rowCount() === 0){
    echo "Такого пользователя не существует";
}else{
    //Иначе создаем куку по login
    setcookie('login', $login, time() + 3600 * 24 * 30, "/");
    //Переадресация на главную
    header('Location: ../view/index.view.php');
}
