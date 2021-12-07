<?php 
namespace Brequedoc\PopCine\Config\Modelo;

use Brequedoc\PopCine\Database\ConexaoBd;

class Pagamento 
{
    private \mysqli $mysql;
    public function __construct() {
        $this->mysql = ConexaoBd::criarConexao();
    }

    public function formasDePagamento(): array
    {
        $resultado = $this->mysql->query(
            'SELECT * FROM formas_pagamento'
        );

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    
}