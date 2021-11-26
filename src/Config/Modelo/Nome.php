<?php

namespace Brequedoc\PopCine\Config\Modelo;

class Nome
{
    private string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $this->trataNome($nome);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    private function trataNome(string $nome): string
    {

        $nomeTratado = filter_var($nome, FILTER_SANITIZE_STRING);
        return $nomeTratado;
    }
}
