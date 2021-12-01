<?php

use Brequedoc\PopCine\Database\ConexaoBd;

class Ingresso 
{
    private \mysqli $mysql;

    public function __construct() 
    {
        $this->mysql = ConexaoBd::criarConexao();
    }

    // public function tiposDeIngresso(): arr
    // {
    //     $resultado = $this->mysql->prepare(

    //     );
    //     $resultado
    // }
}