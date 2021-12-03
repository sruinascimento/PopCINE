<?php

use Brequedoc\PopCine\Config\Modelo\Usuario;

require "src/Config/desenvolvedores.php";

if(!isset($_GET['sessao'])){
    header("Location: /");
}
$usuario = new Usuario();
$ingressoDetalhes = $usuario->ingressoSessao($_GET['sessao']);

$titulo = 'Ingresso';
require "src/View/head-html.php";
require "src/View/header-html.php";
?>


<main>
    <div class="container-main container-ingressos-perfil">
        <div class="titulo-filme">
            <h1 class="titulo-poltrona">Detalhe Ingresso</h1>
        </div>
       <?php foreach($ingressoDetalhes as $ingresso):?> 
                <div class="">
                    <div class="box-interno detalhe-ingresso">
                    <table class="detalhes-sessao">
                        <tr>
                            <th>Filme: </th>
                            <td><?= $ingresso['nome_film'] ?></td>
                        </tr>
                        <tr>
                            <th>Duração: </th>
                            <td><?= $ingresso['duracao_film']?></td>
                        </tr>
                        <tr>
                            <th>Data da sessão</th>
                            <td><?= date("d-m-Y", strtotime($ingresso['data_sess_film'])) ?></td>
                        </tr>
                        <tr>
                            <th>Hora da sessão: </th>
                            <td><?= date("H:i",strtotime($ingresso['hora_sess'])); ?></td>
                        </tr>
                        <tr>
                            <th>Sala: </th>
                            <td><?= $ingresso['nome_sala'] ?></td>
                        </tr>
                        <tr>
                            <th>Poltrona: </th>
                            <td><?= $ingresso['id_polt_fk'] ?></td>
                        </tr>
                    </table>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
    </div>
</main>

<?php
require "src/View/dev-footer-html.php";
require "src/View/footer-html.php"
?>