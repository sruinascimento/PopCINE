<?php

namespace Brequedoc\PopCine\Config\Cadastro\Modelo;

use Brequedoc\PopCine\Database\ConexaoBd;
use Brequedoc\PopCine\Config\Modelo\Nome;
use Brequedoc\PopCine\Config\Modelo\Email;
use Brequedoc\PopCine\Config\Modelo\Senha;


class Cadastro
{

    private Nome $nome;
    private \mysqli $mysql;
    private Email $email;
    private string $cpf;
    private Senha $senha;

    public function __construct(Nome $nome, Email $email, string $cpf, Senha $senha)
    {
        $this->mysql = ConexaoBd::criarConexao();
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->senha = $senha;
    }

    public function cadastrarUsuario(): void
    {
        $cadastrarLogin = $this->mysql->prepare(
            "INSERT INTO login_cliente (email_logi_clie, senha_logi_clie) VALUES (?, ?)"
        );
        $cadastrarLogin->bind_param("ss", $this->email->getEmail(), $this->senha->getSenha());
        $cadastrarLogin->execute();
        echo $this->mysql->insert_id . PHP_EOL;
    }
}
