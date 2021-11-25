<?php
class Nome
{
    private string $nome;

    public function __construct(string $nome, string $sobrenome)
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
