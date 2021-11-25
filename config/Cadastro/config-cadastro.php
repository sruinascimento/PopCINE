<?php


if (
    !isset($_POST['nome'])  ||
    !isset($_POST['email']) ||
    !isset($_POST['data-nascimento']) ||
    !isset($_POST['senha']) ||
    !isset($_POST['confirmar-senha'])
) {
    $_SESSION['erro'] = true;
    header('Location: cadastro');
    exit;
}
if (
    empty($_POST['nome'])  ||
    empty($_POST['email']) ||
    empty($_POST['data-nascimento']) ||
    empty($_POST['senha']) ||
    empty($_POST['confirmar-senha'])
) {
    $_SESSION['erro'] = true;
    header('Location: cadastro');
    exit;
}
