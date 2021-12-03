<?php

use Brequedoc\PopCine\Config\Modelo\Filme;
use Brequedoc\PopCine\Config\Modelo\Poltrona;
require "src/Config/desenvolvedores.php";

if (!isset($_GET['sessao'])) {
    header("Location: programacao");
    exit();
}

$filme = new Filme();

$poltronas = new Poltrona();
$todasPoltronas = $poltronas->buscarPoltronasDisponiveis($_GET['sessao']);
$poltronasReservadas = $poltronas->buscarPoltronasVendidas($_GET['sessao']);
$informacoesFilme = $poltronas->buscarInformacaoDaSessao($_GET['sessao']);


function procuraPoltronaReservada($poltronasReservadas,$id_poltrona)
{
    foreach ($poltronasReservadas as $poltrona) {
        if($poltrona['id_sala_polt_fk'] == $id_poltrona){
            return true;
        }
    }
}

$titulo = 'Poltrona';
require "src/View/head-html.php";
require "src/View/header-html.php";


?>

<main>
    <div class="container-main">
        <div class="titulo-filme">
            <h1 class="titulo-poltrona">Selecione sua poltrona</h1>
        </div>
        <div class="container-info-poltronas">
            <h3 class="nome-filme-sessao"><?= $informacoesFilme['nome_film'] ." - Sala " . $informacoesFilme['nome_sala']?></h3>
            <div class="container-poltronas">
                <?php foreach ($todasPoltronas as $poltrona) {?>
                    <a class="poltrona <?=  
                        procuraPoltronaReservada($poltronasReservadas,$poltrona['id_sala_polt'])? "poltrona-reservada" : "";
                        echo $poltrona['acessivel_polt'] == 1? "acessivel":"";
                        ?>" 
                        href="pagamento?sessao=<?= $poltrona['id_sala_sess'] ?>&numero=<?= $poltrona['id_sala_polt']; ?>">
                    <?=$poltrona['id_polt_fk']?>
                    </a>
                <?php } ?>
            </div>
            <ul class="lista-info-poltrona">
                <li><span class="info-poltrona disponivel"></span>Disponível</li>
                <li><span class="info-poltrona reservada"></span>Reservada</li>
                <li><span class="info-poltrona acessivel"></span>Acessível</li>
            </ul>
        </div>
    </div>
</main>








<?php
require "src/View/dev-footer-html.php";
require "src/View/footer-html.php"
?>