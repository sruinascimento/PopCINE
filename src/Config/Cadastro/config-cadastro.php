<?php

namespace Brequedoc\PopCine\Config\Cadastro;

use Brequedoc\PopCine\Config\Cadastro\Modelo\Cadastro;
use Brequedoc\PopCine\Config\Modelo\Email;
use Brequedoc\PopCine\Config\Modelo\Nome;
use Brequedoc\PopCine\Config\Modelo\Senha;

// if (
//     !isset($_POST['nome'])  ||
//     !isset($_POST['email']) ||
//     !isset($_POST['data-nascimento']) ||
//     !isset($_POST['senha']) ||
//     !isset($_POST['confirmar-senha'])
// ) {
//     $_SESSION['erro'] = true;
//     header('Location: cadastro');
//     exit;
// }
// if (
//     empty($_POST['nome'])  ||
//     empty($_POST['email']) ||
//     empty($_POST['data-nascimento']) ||
//     empty($_POST['senha']) ||
//     empty($_POST['confirmar-senha'])
// ) {
//     $_SESSION['erro'] = true;
//     header('Location: cadastro');
//     exit;
// }


$cadastro = new Cadastro(new Nome($_POST['nome']), new Email($_POST['email']), $_POST['cpf'], new Senha($_POST['senha']));

$cadastro->cadastrarUsuario();