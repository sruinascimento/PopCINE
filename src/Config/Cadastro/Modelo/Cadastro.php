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
    private string $dataNascimento;
    private string $cpf;
    private Senha $senha;


    public function __construct(Nome $nome, Email $email, string $dataNascimento, string $cpf, Senha $senha)
    {
        $this->mysql = ConexaoBd::criarConexao();
        $this->nome = $nome;
        $this->email = $email;
        $this->dataNascimento = $dataNascimento;
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
        $idUsuarioFK = $this->mysql->insert_id;
        $cadastraUsuario = $this->mysql->prepare(
            "INSERT INTO clientes (nome_clie, datanascimento_clie, id_logi_clie_fk)
            VALUES (?, ?, ?)"
        );
        $cadastraUsuario->bind_param("ssi", $this->nome->getNome(), $this->dataNascimento, $idUsuarioFK);
        $cadastraUsuario->execute();
    }
}
