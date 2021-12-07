<?php
namespace Brequedoc\PopCine\Config\Modelo;

use Brequedoc\PopCine\Database\ConexaoBd;

class Usuario
{
    private int $idUsuario;
    private string $nome;
    private string $email;
    private string $dataNascimento;
    private string $cpf;
    private \mysqli $mysql;

    public function __construct()
    {
        $this->mysql = ConexaoBd::criarConexao();
    }

    public function ingressosUsuario(int $idUsuario)
    {
        $ingressos = $this->mysql->prepare(
            "SELECT *FROM clientes c
            INNER JOIN clientes_ingressos ci
            ON c.id_clie = ci.id_clie_fk
            INNER JOIN ingressos i
            ON i.id_ingr = ci.id_ingr_fk
            INNER JOIN poltronas_vendidas pv
            ON i.id_ingr = pv.id_ingr_fk
            INNER JOIN poltronas_sessoes ps
            ON pv.id_polt_sess_fk = ps.id_polt_sess
            INNER JOIN salas_sessoes ss
            ON ps.id_sala_sess_fk= ss.id_sala_sess
			INNER JOIN sessoes_filmes sf
            ON ss.id_sess_film_fk = sf.id_sess_film
			INNER JOIN filmes f
            ON sf.id_film_fk = f.id_film
            WHERE id_clie = ?"
        );
        $ingressos->bind_param("i", $idUsuario);
        $ingressos->execute();
        return $ingressos->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function ingressoSessao(int $idSessao)
    {
        $ingressos = $this->mysql->prepare(
            "SELECT *FROM clientes c
            INNER JOIN clientes_ingressos ci
            ON c.id_clie = ci.id_clie_fk
            INNER JOIN ingressos i
            ON i.id_ingr = ci.id_ingr_fk
            INNER JOIN poltronas_vendidas pv
            ON i.id_ingr = pv.id_ingr_fk
            INNER JOIN poltronas_sessoes ps
            ON pv.id_polt_sess_fk = ps.id_polt_sess
            INNER JOIN salas_poltronas sp
            ON ps.id_sala_polt_fk = sp.id_sala_polt
            INNER JOIN salas_sessoes ss
            ON ps.id_sala_sess_fk = ss.id_sala_sess
            INNER JOIN salas s
            ON s.id_sala = ss.id_sala_fk
            INNER JOIN sessoes_filmes sf
            ON ss.id_sess_film_fk = sf.id_sess_film
            INNER JOIN sessoes ses 
            ON sf.id_sess_fk = ses.id_sess
            INNER JOIN filmes f
            ON sf.id_film_fk = f.id_film
            WHERE id_ingr = ?"
        );
        $ingressos->bind_param("i", $idSessao);
        $ingressos->execute();
        return $ingressos->get_result()->fetch_all(MYSQLI_ASSOC);
    }


}
