<?php
class Senha
{
    private string $senha;

    public function __construct(string $senha)
    {
        $this->senha = $this->trataSenha($senha);
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    private function trataSenha(string $senha): string
    {
        $senhaTratada = trim($senha);
        return password_hash($senhaTratada, PASSWORD_ARGON2ID);
    }
}
