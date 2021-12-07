<?php
$titulo = "Sucesso";
require "src/View/head-html.php";

if (!isset($_SESSION['Pedido-Sucesso'])) {
    header("Location: /");
}
?>

<main class="container-main-login-cadastro">
    <div class="container-login-cadastro container-success">
        <i class="fas fa-check-circle"></i>
        <h3 class="ingresso-pedido-success">Ingresso Adquirido!</h3>
        <p class="ingresso-pedido-sucesss-p">Para verificar todos os seus ingressos <a href="meu-perfil">clique aqui</a></p>
    </div>
</main>


<?php require "src/View/footer-html.php"; ?>