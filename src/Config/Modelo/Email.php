<?php

namespace Brequedoc\PopCine\Config\Modelo;

class Email
{
    private string $email;

    public function __construct(string $email)
    {
        $this->email = $this->trataEmail($email);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    private function trataEmail(string $email): string
    {
        $emailTratado = trim(strtolower($email));
        $emailTratado = filter_var($emailTratado, FILTER_VALIDATE_EMAIL);
        if (!$emailTratado) {
            $_SESSION['erro'] = true;
            //verificar depois
            //header("Location: {$_SERVER['HTTP_REFERER']}");
            //header("Location: cadastro");
            //die("Erro no email");
        }
        return $emailTratado;
    }
}
