<?php

use Brequedoc\PopCine\Config\Modelo\Ingresso;
use Brequedoc\PopCine\Config\Modelo\Pagamento;
use Brequedoc\PopCine\Config\Modelo\Pedido;
use Brequedoc\PopCine\Config\Modelo\Poltrona;

require "src/Config/desenvolvedores.php";

if (!isset($_GET['numero'])) {
    header("Location: programacao");
    exit();
}

$salaSessao = $_GET['sessao'];
$poltrona = $_GET['numero'];

$dadosDaPoltronaSessao = new Poltrona();
$dadosSessao = $dadosDaPoltronaSessao->poltronaDaSessao($salaSessao,$poltrona);

$ingresso = new Ingresso();
$tiposIngresso = $ingresso->tiposDeIngresso();

$pagamentos = new Pagamento();
$formasPagamento = $pagamentos->formasDePagamento();

if (isset($_POST['tipo_ingresso'],$_POST['forma_pagamento'])) {
    $pedido = new Pedido();
    $pedido->finalizarPedido($_POST['tipo_ingresso'], $_POST['forma_pagamento'], $salaSessao, $poltrona);
}


$titulo = 'Pagamento';
require "src/View/head-html.php";
require "src/View/header-html.php";



?>


<main>
    <div class="container-main container-pagamento">
        <div>
            <h3 class="titulo-pagamento">Detalhes do ingresso</h1>
            <table class="detalhes-sessao">
                <tr>
                    <th>Filme: </th>
                    <td><?= $dadosSessao['nome_film'] ?></td>
                </tr>
                <tr>
                    <th>Duração: </th>
                    <td><?= $dadosSessao['duracao_film']?></td>
                </tr>
                <tr>
                    <th>Data da sessão</th>
                    <td><?= date("d-m-Y", strtotime($dadosSessao['data_sess_film'])) ?></td>
                </tr>
                <tr>
                    <th>Hora da sessão: </th>
                    <td><?= date("H:i",strtotime($dadosSessao['hora_sess'])); ?></td>
                </tr>
                <tr>
                    <th>Sala: </th>
                    <td><?= $dadosSessao['nome_sala'] ?></td>
                </tr>
                <tr>
                    <th>Poltrona: </th>
                    <td><?= $dadosSessao['id_polt_fk'] ?></td>
                </tr>
            </table>
        </div> 
        <img src="<?=$dadosSessao['capafilme_film']?>" alt=""> 
    </div>
   
    <div class="container-main">
        
        <form class="form-pagamento" action="pagamento?sessao=<?= $salaSessao ?>&numero=<?=$poltrona?>" method="POST">
            <span>
                <h3 class="titulo-pagamento">Selecione o tipo de Ingresso</h1>
                <?php foreach ($tiposIngresso as $ingresso) : ?> 
                    <input type="radio" id="<?=$ingresso['tipo_ingr']?>" name="tipo_ingresso" value="<?= $ingresso['id_tipo_ingr']?>"> 
                    <label for="<?=$ingresso['tipo_ingr']?>"> <?= $ingresso['tipo_ingr'] . " R$ " . 
                    number_format($ingresso['preco_ingr'],2,',','.') ?> </label>
                <?php endforeach ?>
            </span>
            <h3 class="titulo-pagamento">Selecione sua forma de pagamento</h1>
            <?php foreach ($formasPagamento as $pag) : ?> 
                <span>        
                    <input type="radio" id="<?=$pag['id_form_paga']?>" name="forma_pagamento" value="<?= $pag['id_form_paga']?>"> 
                    <label for="<?=$pag['id_form_paga']?>"> <?=$pag['pagamento_form_paga']?> </label>
                </span>   
            <?php endforeach ?>
            <button class="botao-pagamento">Confirmar</button>
        </form>
    </div>
    
    
</main>











<?php
require "src/View/dev-footer-html.php";
require "src/View/footer-html.php"
?>