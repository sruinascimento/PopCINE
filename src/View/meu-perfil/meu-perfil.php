<?php

use Brequedoc\PopCine\Config\Modelo\Usuario;

require "src/Config/desenvolvedores.php";

$usuario = new Usuario();
$todosIngressos = $usuario->ingressosUsuario($_SESSION['id_usuario']);

$titulo = 'Perfil';
require "src/View/head-html.php";
require "src/View/header-html.php";
?>


<main>
    <div class="container-main container-ingressos-perfil">
        <div class="titulo-filme">
            <h1 class="titulo-poltrona">Seus Ingressos</h1>
        </div>
       <?php foreach($todosIngressos as $ingresso):?> 
            <a class ="ingressos-link" href="ingresso?sessao=<?= $ingresso['id_ingr'] ?>">
                <div class="box-ingresso">
                    <div class="box-interno">
                        <h3><i class="fas fa-film"></i><?=$ingresso['nome_film']?></h3>
                        <p><i class="fas fa-calendar"></i><?=date("d/m/Y",strtotime($ingresso['data_sess_film']))?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    </div>
</main>

<?php
require "src/View/dev-footer-html.php";
require "src/View/footer-html.php"
?>