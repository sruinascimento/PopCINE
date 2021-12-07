<?php
namespace Brequedoc\PopCine\Config\Modelo;

use Brequedoc\PopCine\Database\ConexaoBd;

class Poltrona
{
    private \mysqli $mysql;

    public function __construct()
    {
        $this->mysql = ConexaoBd::criarConexao();
    }
    public function buscarInformacaoDaSessao(int $id_sessao_filme): array
    {
        $informacaoSessao = $this->mysql->prepare("
        SELECT * FROM filmes f
            INNER JOIN sessoes_filmes sf
            ON f.id_film = sf.id_film_fk
            INNER JOIN sessoes s
            ON s.id_sess = sf.id_sess_fk 
            INNER JOIN salas_sessoes ss 
            ON sf.id_sess_film = ss.id_sess_film_fk
            INNER JOIN salas sl
            ON sl.id_sala = ss.id_sala_fk
            INNER JOIN salas_poltronas sp
            ON sl.id_sala = sp.id_sala_fk
            WHERE id_sala_sess = ?
            GROUP BY nome_film
            ORDER BY id_film_fk
            ;
        ");
        $informacaoSessao->bind_param("i", $id_sessao_filme);
        $informacaoSessao->execute();
        return $informacaoSessao->get_result()->fetch_array(MYSQLI_ASSOC);
    }
    public function buscarPoltronasDisponiveis(int $id_sessao_filme): array
    {
        $resultadoPoltronas = $this->mysql->prepare(
            "SELECT * FROM filmes f
            INNER JOIN sessoes_filmes sf
            ON f.id_film = sf.id_film_fk
            INNER JOIN sessoes s
            ON s.id_sess = sf.id_sess_fk 
            INNER JOIN salas_sessoes ss 
            ON sf.id_sess_film = ss.id_sess_film_fk
            INNER JOIN salas sl
            ON sl.id_sala = ss.id_sala_fk
            INNER JOIN salas_poltronas sp
            ON sl.id_sala = sp.id_sala_fk
            INNER JOIN poltronas pn
            ON pn.id_polt = sp.id_polt_fk
            WHERE id_sala_sess = ?
            ORDER BY id_film_fk"
        );
        $resultadoPoltronas->bind_param("i",$id_sessao_filme);
        $resultadoPoltronas->execute();
        return $resultadoPoltronas->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function buscarPoltronasVendidas(int $id_sessao_filme):array
    {
        $resultadoPoltronasVendidas = $this->mysql->prepare(
            "SELECT * FROM filmes f
            INNER JOIN sessoes_filmes sf
            ON f.id_film = sf.id_film_fk
            
            INNER JOIN sessoes s
            ON s.id_sess = sf.id_sess_fk
            
            INNER JOIN salas_sessoes ss
            ON sf.id_sess_film = ss.id_sess_film_fk
            
            INNER JOIN poltronas_sessoes ps
            ON ps.id_sala_sess_fk = ss.id_sala_sess
            
            INNER JOIN salas_poltronas sp
            ON ps.id_sala_polt_fk = sp.id_sala_polt
             
			INNER JOIN salas sl
            ON sl.id_sala = ss.id_sala_fk
            
            INNER JOIN poltronas_vendidas pv
            ON ps.id_polt_sess = pv.id_polt_sess_fk
            WHERE ss.id_sala_sess = ?"
        );
        $resultadoPoltronasVendidas->bind_param("i",$id_sessao_filme);
        $resultadoPoltronasVendidas->execute();
        return $resultadoPoltronasVendidas->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function poltronaDaSessao(int $salaSessao, int $poltrona): array
    {
        $resultado = $this->mysql->prepare("
            SELECT * FROM filmes f
            INNER JOIN sessoes_filmes sf
            ON f.id_film = sf.id_film_fk
            INNER JOIN sessoes s
            ON s.id_sess = sf.id_sess_fk 
            INNER JOIN salas_sessoes ss 
            ON sf.id_sess_film = ss.id_sess_film_fk
            INNER JOIN salas sl
            ON sl.id_sala = ss.id_sala_fk
            INNER JOIN salas_poltronas sp
            ON sl.id_sala = sp.id_sala_fk
            WHERE id_sala_sess = ? AND id_sala_polt = ?
            ORDER BY id_film_fk"
        );
        $resultado->bind_param("ii",$salaSessao, $poltrona);
        $resultado->execute();


        return  $resultado->get_result()->fetch_array(MYSQLI_ASSOC);
    }
}