<?php

namespace Brequedoc\PopCine\Config\Login;

use Brequedoc\PopCine\Config\Modelo\Email;
use Brequedoc\PopCine\Config\Modelo\Senha;
use Brequedoc\PopCine\Database\ConexaoBd;
use Brequedoc\PopCine\Config\Helper\FlashMessageTrait;

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: login');
    exit();
}

$email = new Email($_POST['email']);
$senha = trim($_POST['senha']);
$conexaoBD = ConexaoBd::criarConexao();

$stmt = $conexaoBD->prepare(
    "SELECT * FROM clientes
    INNER JOIN login_cliente
    ON id_logi_clie_fk = id_logi_clie
    WHERE email_logi_clie = ?"
);

$stmt->bind_param("s", $email->getEmail());
$stmt->execute();
$resultado = $stmt->get_result()->fetch_assoc();

if (!password_verify($senha, $resultado['senha_logi_clie'])) {
    header("Location: login");
    FlashMessageTrait::defineMensagem("danger","Login ou senha inválidos");
    exit();
}
$_SESSION['id_usuario']      = $resultado['id_clie'];
$_SESSION['id_logi_clie']    = $resultado['id_logi_clie'];
$_SESSION['nome']            = $resultado['nome_clie'];
$_SESSION['email']           = $resultado['email_logi_clie'];
$_SESSION['data_nascimento'] = $resultado['datanascimento_clie'];


header("Location: /");
