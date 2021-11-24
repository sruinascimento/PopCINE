<?php

namespace Brequedoc\PopCine\Model;

use mysqli;
use Brequedoc\PopCine\Database\ConexaoBd;

class Filme
{
    private \mysqli $mysql;
    // private string $nome;
    // private int $duracao;
    // private string $sinopse;
    // private string $dataEstreia;
    // private string $classificacao;
    // private float $orcamento;
    // private string $trailer;
    // private float $bilheteria;

    public function __construct()
    {
        $this->mysql = ConexaoBd::criarConexao();
    }

    public function recuperaFilme(int $idFilme)
    {
        $filmes = $this->mysql->prepare(
            "SELECT * FROM filmes WHERE id_film = ?"
        );
        $filmes->bind_param('i', $idFilme);
        $filmes->execute();
        $resultado = $filmes->get_result()->fetch_array(MYSQLI_ASSOC);
        print_r($resultado);
    }
}
