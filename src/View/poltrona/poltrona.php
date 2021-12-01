<?php

use Brequedoc\PopCine\Config\Modelo\Poltrona;
require "src/Config/desenvolvedores.php";

if (!isset($_GET['sessao'])) {
    header("Location: programacao");
    exit();
}


$poltronas = new Poltrona();
$todasPoltronas = $poltronas->buscarPoltronasDisponiveis($_GET['sessao']);
$poltronasReservadas = $poltronas->buscarPoltronasVendidas($_GET['sessao']);


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
        <div class="container-info-poltronas">
            <h1>Selecione sua poltrona</h1>
            <ul class="container-poltronas">
                <?php foreach ($todasPoltronas as $poltrona) {?>
                    <a class="poltrona <?=  
                        procuraPoltronaReservada($poltronasReservadas,$poltrona['id_sala_polt'])? "poltrona-reservada" : "";
                        echo $poltrona['acessivel_polt'] == 1? "acessivel":"";
                        ?>" 
                        href="pagamento?sessao=<?= $poltrona['id_sala_sess'] ?>&numero=<?= $poltrona['id_sala_polt']; ?>">
                        <li></li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>
</main>








<?php
require "src/View/dev-footer-html.php";
require "src/View/footer-html.php"
?>