<?php

if (isset($_SESSION["userId"])) {
    require_once "./catalog.php";
} else {
    //http ответ 403 Форбиден - возвратить
    echo "У вас нет доступа";
}

