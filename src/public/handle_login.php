<?php

//Первичная валидация
//получение логина из запроса и сравнение с БД
//получение пароля из БД
//авторизация
session_start();
$errors=[];
if (empty($_POST["name"])) {
    $errors['name'] = "Поле Имя должно быть заполнено";
} else {
    $name = $_POST["name"];
}
if (empty($_POST["psw"])) {
    $errors['password'] = "Поле Имя должно быть заполнено";
} else {
    $password = $_POST["psw"];
}
if ((empty($password)) or (empty($name))) {
   require_once "./get_login.php";
}

if (empty($errors)) {

    $pdo = new PDO("pgsql:host=database;port=5432;dbname=dbname", "dbuser", "dbpwd");
    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE name = :name");
    $stmt->execute([":name" => $name]);
    $result=$stmt->fetch();

    if (!empty($result)) {
        $passwordHash = $result["password"];
    } else {
        die ("internal server error");
    }

        if (password_verify($password, $passwordHash)) {
            //setcookie("userId",$result["id"]);
            $_SESSION['userId'] = $result["id"];
            require_once "./main.php";
        } else {
            echo "Неверный пароль или имя пользователя";
        }
    }

//после логина сделали, проверку на сессию и показали страницу с каталогом
//добавили страницу Мой профиль

