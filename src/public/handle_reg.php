<?php

//Данные из POST-запроса
//Добавить ВАЛИДАЦИЮ на каждую переменную
$name= $_POST['name'];
//тут для name пустота, кол-во симоволов, наличие цифр
$email= $_POST['email'];
//тут пустота, кол-во символов, наличие собачки, уникальность
$password= $_POST['psw'];
//тут пустота, кол-во символов, проверка на совпадение
//здесь, если валидацию не пройдёт пользователь - не выполнять нижний код
$pdo = new PDO("pgsql:host=database;port=5432;dbname=dbname", "dbuser", "dbpwd");
//защититься от sql инъекций метод prepare and exec
$pdo->exec("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");

//сделать sql запрос, вывести пользователя, которого зарегистрировался
//prepare
$stmt = $pdo->query("SELECT * FROM users");
$result = $stmt->fetch();
//вывести почту
print_r($result);

print_r($result['email']);