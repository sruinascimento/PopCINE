<?php
$titulo = "Cadastro";
require "src/View/head-html.php";
?>

<main class="container-main-login-cadastro">
    <div class="container-texto-login-cadastro">
    </div>
    <div class="container-login-cadastro">
        <h1>Cadastrar</h1>
        <form class="form-login-cadastro" action="config-cadastro" method="post">
            <div class="container-input">
                <i class="fas fa-user"></i>
                <input type="text" name="nome" id="nome" placeholder="Nome" autocomplete="false"  required>
            </div>
            <div class="container-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="email" name="email" id="email" placeholder="E-mail" autocomplete="none" required>
            </div>
            <div class="container-input">
                <i class="fas fa-calendar"></i>
                <input type="text" name="data-nascimento" id="data-nascimento" placeholder="Data de nascimento" autocomplete="none" required>
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
                <input type="password" name="cofirmar-senha" id="confirmar-senha" placeholder="Repita sua senha" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <a href="login">
            <button class="back">Login</button>
        </a>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#data-nascimento").mask("00/00/0000")
        $("#cpf").mask("000.000.000-00")
    });
</script>
<script type="text/javascript" src="public/js/cadastro.js"></script>

<?php require "src/View/footer-html.php"; ?>