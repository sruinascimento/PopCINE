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
                <div class="centraliza-ingresso">
                    <div class="box-interno detalhe-ingresso ingresso">
                    <table class="detalhes-sessao">
                        <tr>
                            <th><i class="fas fa-film"></i> Filme: </th>
                            <td><?= $ingresso['nome_film'] ?></td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-hourglass-half"></i> Duração: </th>
                            <td><?= $ingresso['duracao_film']?> minutos</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-calendar"></i> Data da sessão</th>
                            <td><?= date("d-m-Y", strtotime($ingresso['data_sess_film'])) ?></td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-clock"></i> Hora da sessão: </th>
                            <td><?= date("H:i",strtotime($ingresso['hora_sess'])); ?></td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-door-closed"></i> Sala: </th>
                            <td><?= $ingresso['nome_sala'] ?></td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-chair"></i> Poltrona: </th>
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