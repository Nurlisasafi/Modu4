<?php

header("Content-Type: application/json; charset=UTF-8");

include 'app/Routes/RoutesBuku.php';

use app\Routes\BukuRoutes;

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$bukuRoutes = new BukuRoutes();
$bukuRoutes->handle($method, $path);
