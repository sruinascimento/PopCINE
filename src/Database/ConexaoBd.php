<?php
// $conexao = mysqli_connect($_ENV['HOST'],  $_ENV['USUARIO'], $_ENV['SENHA'], $_ENV['BD']) or die("Não foi possível conectar ao Banco de Dados");
// $conexao->set_charset('utf8');
namespace Brequedoc\PopCine\Database;

class ConexaoBd
{
    public static function criarConexao(): \mysqli
    {
        $conexao = mysqli_connect("127.0.0.1", "root", "", "popcine") or die("Não foi possível conectar ao Banco de Dados");
        $conexao->set_charset('utf8');
        return $conexao;
    }
}
