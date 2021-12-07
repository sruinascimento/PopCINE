<?php
namespace Brequedoc\PopCine\Config\Helper;

trait FlashMessageTrait
{
    public static function defineMensagem(string $tipo, string $mensagem):void
    {
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['tipo_mensagem'] = $tipo;
    }
}