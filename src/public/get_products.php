<?php

// Подключение к базе данных
$pdo = new PDO("pgsql:host=database;port=5432;dbname=dbname", "dbuser", "dbpwd");

// Получение 4 случайных товаров для главной страницы
$query = $pdo->query("SELECT * FROM products ORDER BY RANDOM() LIMIT 4");
$products = $query->fetchAll(PDO::FETCH_ASSOC);
