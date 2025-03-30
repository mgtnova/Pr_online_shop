<?php


function validate(array $data)
{
    $errors=[];
    $name= $data['name'];
    if (empty($name)) {
        $errors['name']= "Поле Имя должно быть заполнено";
    } elseif (strlen($name) <2) {
        $errors['name']="Имя должно быть больше одного символа";
    } elseif (preg_match('/\d/', $name)) {
        $errors['name']="Имя не должно содержать цифры.";
    }

    $email= $data['email'];
    if (empty($email)) {
        $errors['email']="Поле Email должно быть заполнено";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email']="Некорректный email.";
    }

    $password= $data['psw'];
    $check_password=$_POST['psw-repeat'];
    if (empty($password)) {
        $errors['password']="Поле Password должно быть заполнено";
    } elseif (strlen($name) <=2) {
        $errors['password']="Пароль должен содержать больше двух символов";
    }
    if ($password != $check_password) {
        $errors['password']="Пароль не подтверждён";
    }

    return $errors;
}

$errors=validate($_POST);
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["psw"];

$pdo = new PDO("pgsql:host=database;port=5432;dbname=dbname", "dbuser", "dbpwd");


$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
$stmt->execute([":email" => $email]);
$count = $stmt->fetchColumn();

    if ($count > 0) {
         $errors['email']="Пользователь с email '$email' уже существует.";

    }
    if (empty($errors)) {

        // Вставка нового пользователя
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->execute([
            ":name" => $name,
            ":email" => $email,
            ":password" => $passwordHash
        ]);
        echo "Вы успешно зарегистрировались";
    }
require_once './get_reg.php';

