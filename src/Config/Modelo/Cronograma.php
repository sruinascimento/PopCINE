<?php

namespace Brequedoc\PopCine\Config\Modelo;

use Brequedoc\PopCine\Database\ConexaoBd;

class Cronograma
{
    private \mysqli $mysql;

    public function __construct()
    {
        $this->mysql = ConexaoBd::criarConexao();
    }

    public function diaDaSemanaCronograma(): array
    {
        $this->mysql->query("SET lc_time_names = 'pt_PT'");
        $resultado = $this->mysql->query(
            "SELECT id_sess_film, data_sess_film, DAYNAME(data_sess_film) as nome_dia_semana  FROM sessoes_filmes
            WHERE data_sess_film 
            BETWEEN curdate() AND curdate() + INTERVAL 6 DAY 
            GROUP BY nome_dia_semana
            ORDER BY data_sess_film"
        );
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
