<?php

use Brequedoc\PopCine\Database\ConexaoBd;

class Cadastro
{
    private \mysqli $mysql;
    private Nome $nome;
    private Email $email;

    public function __construct(Nome $nome, Email $email)
    {
        $this->mysql = ConexaoBd::criarConexao();
        $this->nome = $nome;
        $this->email = $email;
    }
}
