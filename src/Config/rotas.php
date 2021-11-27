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
];


return $rotas;
