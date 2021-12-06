<?php

namespace Brequedoc\PopCine\Config\Cadastro;

use Brequedoc\PopCine\Config\Cadastro\Modelo\Cadastro;
use Brequedoc\PopCine\Config\Modelo\Email;
use Brequedoc\PopCine\Config\Modelo\Nome;
use Brequedoc\PopCine\Config\Modelo\Senha;
use Brequedoc\PopCine\Config\Helper\FlashMessageTrait;

$cadastro = new Cadastro(new Nome($_POST['nome']), new Email($_POST['email']), $_POST['data-nascimento'], $_POST['cpf'], new Senha($_POST['senha']));
$cadastro->cadastrarUsuario();

FlashMessageTrait::defineMensagem("success","Cadastro realizado com sucesso. Faça o login <a href='login'>aqui</a>");
header("Location: cadastro");
