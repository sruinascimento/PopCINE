<?php
require("src/database/conexaoBd.php");
require("vendor/autoload.php");

$rota = require __DIR__ . "/src/Config/rotas.php";
$enderecoPagina = $_SERVER['PATH_INFO'];


$url = explode('/', $enderecoPagina);

if (empty($url[1])) {
    require 'src/View/home/home.php';
    exit();
}

if (!array_key_exists($url[1], $rota)) {
    http_response_code(404);
    exit();
}


require $rota[$url[1]] . "/" . $url[1] . ".php";
exit();
