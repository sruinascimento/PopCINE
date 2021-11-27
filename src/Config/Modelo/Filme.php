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
    public function recuperaFilme(int $idFilme):?array
    {
        $filme = $this->mysql->prepare(
            "SELECT * FROM filmes
            INNER JOIN filmes_pessoas
            ON id_film = id_film_fk
            INNER JOIN pessoas
            ON id_pess = id_pess_fk 
            INNER JOIN diretores d
            ON id_pess = d.id_pess_fk 
            WHERE id_film = ?"
        );
        $filme->bind_param('i', $idFilme);
        $filme->execute();
        return $filme->get_result()->fetch_array(MYSQLI_ASSOC);
    }
    public function recuperaCategoriaFilme(int $idFilme):?array
    {
        $categoriaFilme = $this->mysql->prepare(
            "SELECT nomegenero_gene FROM generos
            INNER JOIN filmes_generos
            ON id_gene = id_gene_fk
            INNER JOIN filmes
            ON id_film = id_film_fk
            WHERE id_film = ?"
        );
        $categoriaFilme->bind_param('i', $idFilme);
        $categoriaFilme->execute();
        return $categoriaFilme->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function recuperaElencoFilme(int $idFilme):array
    {
        $elencoFilme = $this->mysql->prepare(
            "SELECT * FROM filmes
            INNER JOIN filmes_pessoas
            ON id_film = id_film_fk
            INNER JOIN pessoas
            ON id_pess = id_pess_fk 
            INNER JOIN atores at
            ON id_pess = at.id_pess_fk 
            WHERE id_film = ?"
        );
        $elencoFilme->bind_param('i', $idFilme);
        $elencoFilme->execute();
        return $elencoFilme->get_result()->fetch_all(MYSQLI_ASSOC);
    }

}
