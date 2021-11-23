<?php 
    $titulo = "Cadastro";
  require "src/View/head-html.php";
?>

<main class="container-main-login-cadastro">
    <div class="container-texto-login-cadastro">
    </div>
    <div class="container-login-cadastro">
        <h1>Cadastrar</h1>
        <form action="login" method="post">
            <div class="container-input">
                <i class="fas fa-user"></i>
                <input type="text" name="nome" id="nome" placeholder="Nome" autocomplete="none" required>
            </div>
            <div class="container-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="email" name="email" id="email" placeholder="E-mail" autocomplete="none" required>
            </div>
            <div>
                <i class="fas fa-calendar"></i>
                <input type="date" name="data" id="data-nascimento" placeholder="Data de nascimento" autocomplete="none" required>
            </div>
            <div class="container-input">
                <i class="fas fa-id-card"></i>
                <input type="text" name="cpf" id="cpf" placeholder="CPF" autocomplete="none">
            </div>
            <div class="container-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
            </div>
            <div class="container-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="senha" id="senha" placeholder="Repita sua senha" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="login">
            <button class="back">Login</button>
        </a>
    </div>
</main>

<?php require "src/View/footer-html.php"; ?>