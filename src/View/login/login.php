<?php
$titulo = "Login";
require "src/View/head-html.php";
?>

<main class="container-main-login-cadastro">
    <div class="container-texto-login-cadastro">

    </div>
    <div class="container-login-cadastro">
        <h1>Login</h1>
        <form action="config-login" method="post">
            <div class="container-input">
                <i class="fas fa-user"></i>
                <input type="email" name="email" id="email" placeholder="E-mail" autocomplete="none" required>
            </div>
            <div class="container-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
        <a href="cadastro">
            <button class="back">Cadastre-se</button>
        </a>
    </div>
</main>

<?php require "src/View/footer-html.php"; ?>