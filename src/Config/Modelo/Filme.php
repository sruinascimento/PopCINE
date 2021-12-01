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
    public function recuperaFilmesDoDia():array //tem que passar o dia
    {
        $filmeHorarios = $this->mysql->query(
            "SELECT * FROM filmes f
            INNER JOIN sessoes_filmes sf
            ON f.id_film = sf.id_film_fk
            INNER JOIN sessoes s
            ON s.id_sess = sf.id_sess_fk
            INNER JOIN salas_sessoes ss
            ON sf.id_sess_film = ss.id_sess_film_fk
            INNER JOIN salas sl
            ON sl.id_sala = ss.id_sala_fk
            WHERE data_sess_film = '2021-11-29'
            GROUP BY nome_film
            ORDER BY id_film"
        );

        return $filmeHorarios->fetch_all(MYSQLI_ASSOC);
    }
    public function recuperaFilmeHorarios(int $idFilme):array
    {
        $filmeHorarios = $this->mysql->prepare(
            "SELECT * FROM filmes f
            INNER JOIN sessoes_filmes sf
            ON f.id_film = sf.id_film_fk
            INNER JOIN sessoes s
            ON s.id_sess = sf.id_sess_fk 
            INNER JOIN salas_sessoes ss 
            ON sf.id_sess_film = ss.id_sess_film_fk
            INNER JOIN salas sl
            ON sl.id_sala = ss.id_sala_fk
            WHERE data_sess_film = '2021-11-29' AND f.id_film = ?
            ORDER BY id_film_fk"
        );
        $filmeHorarios->bind_param("i",$idFilme);
        $filmeHorarios->execute();
        return $filmeHorarios->get_result()->fetch_all(MYSQLI_ASSOC);

    }

}
