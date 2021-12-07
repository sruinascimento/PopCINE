<?php

namespace Brequedoc\PopCine\Config\Modelo;

use Brequedoc\PopCine\Database\ConexaoBd;


class Ingresso 
{
    private \mysqli $mysql;

    public function __construct() 
    {
        $this->mysql = ConexaoBd::criarConexao();
    }

    public function tiposDeIngresso(): array
    {
        $resultado = $this->mysql->query(
            "SELECT * FROM tipos_ingresso"
        );
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}