<?php

//сессия???
//шаблон каталог codepen
if (isset($_COOKIE["userId"])) {
    require_once "./catalog.php";
} else {
    //http ответ 403 Форбиден - возвратить
    echo "нет доступа";
}

