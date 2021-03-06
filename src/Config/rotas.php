<?php

define('PASTA_VIEW', 'src/View');
define('PASTA_CONFIG', "src/Config");


$rotas = [
    'filme' => PASTA_VIEW . "/filme",
    'login' => PASTA_VIEW . "/login",
    "programacao" => PASTA_VIEW . '/programacao',
    'cadastro' => PASTA_VIEW . "/cadastro",
    'config-cadastro' => PASTA_CONFIG . "/Cadastro",
    'config-login' => PASTA_CONFIG . "/Login",
    "poltrona" => PASTA_VIEW . "/poltrona",
    "pagamento" => PASTA_VIEW ."/pagamento",
    "meu-perfil" => PASTA_VIEW ."/meu-perfil",
    "logout" => PASTA_CONFIG. "/Login",
    "ingresso" => PASTA_VIEW ."/ingresso",
    "success" => PASTA_VIEW . ""
];

return $rotas;
