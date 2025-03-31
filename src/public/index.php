<?php

$requestUri=$_SERVER["REQUEST_URI"];
$requestMethod=$_SERVER["REQUEST_METHOD"];

if ($requestUri === '/registration') {
    if ($requestMethod === 'GET') {
        require_once './get_reg.php';
    } elseif ($requestMethod === 'POST') {
        require_once './handle_reg.php';
    } else {
        echo "Данный http метод $requestMethod не поддерживается";
    }
} elseif ($requestUri === '/login') {
    if ($requestMethod === 'GET') {
        require_once './get_login.php';
    } elseif ($requestMethod === 'POST') {
        require_once './handle_login.php';
    } else {
        echo "Данный метод $requestMethod не поддерживается";
    }
} else {
    http_response_code(404);
    require_once './get_404.php';
}