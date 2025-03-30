<?php

//Первичная валидация
//получение логина из запроса и сравнение с БД
//получение пароля из БД
//авторизация

$errors=[];
$name=$_POST["name"];
$password=$_POST["psw"];

if ((empty($password)) or (empty($name))) {
    if (empty($name)) {
        $errors['name'] = "Поле Имя должно быть заполнено";
    } else {
        $errors['password'] = "Поле Пароль должно быть заполнено";
    }
    require_once "./get_login.php";
}

if (empty($errors)) {

    $pdo = new PDO("pgsql:host=database;port=5432;dbname=dbname", "dbuser", "dbpwd");
    $stmt = $pdo->prepare("SELECT password FROM users WHERE name = :name");
    $stmt->execute([":name" => $name]);
    $hash_password=$stmt->fetchColumn();

        if (password_verify($password, $hash_password)) {
            echo "Пароль верный!";
        } else {
            echo "Неверный пароль или такого пользователя не существует";
        }
    }


