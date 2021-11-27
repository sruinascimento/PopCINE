<?php

namespace Brequedoc\PopCine\Config\Modelo;

use Brequedoc\PopCine\Database\ConexaoBd;

class Filme
{
    private \mysqli $mysql;

    public function __construct()
    {
        $this->mysql = ConexaoBd::criarConexao();
    }

    public function buscarTodosFilmes(): array
    {
        $resultadoFilmes = $this->mysql->query(
            "SELECT * FROM filmes"
        );
        return $resultadoFilmes->fetch_all(MYSQLI_ASSOC);
    }
}
