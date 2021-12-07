<?php

use Brequedoc\PopCine\Config\Modelo\Poltrona;

require("src/database/conexaoBd.php");
require("vendor/autoload.php");

$rota = require __DIR__ . "/src/Config/rotas.php";
$enderecoPagina = $_SERVER['PATH_INFO'];
session_start();

$pagesAllowed = array("", "programacao", "filme", "login", "cadastro");

$url = explode('/', $enderecoPagina);

if(!$_SESSION['id_usuario'] AND !in_array($url[1],$pagesAllowed)){
    header("Location: /");
};


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
