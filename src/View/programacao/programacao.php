<?php

use Brequedoc\PopCine\Config\Modelo\Filme;

require "src/Config/desenvolvedores.php";
require "src/Config/cronograma.php";

$infoFilme = new Filme();
$todosFilmes = $infoFilme->recuperaFilmesDoDia();

$titulo = 'Programação';
require "src/View/head-html.php";
require "src/View/header-html.php";


?>

<main>
    <div class="container-main">
        <div class="container-datas">
            <div class="box-data">
                <?php foreach ($semanaCinema as $key => $value) { ?>
                    <ul class="box-data-lista">
                        <li>
                            <span class="data-dia-semana"><?=$key?></span>
                            <span class="nome-dia-semana"><?=$value?></span>
                        </li>
                    </ul>
                <?php }?>
            </div>
        </div>
    
        <div class="box-todos-filmes">
            <?php foreach($todosFilmes as $filme){?>
                <div class="box-filme">
                        <img src="<?= $filme['capafilme_film']?>" alt="capa-filme">
                        <ul class="box-filme-info"> 
                            <li class="filme-titulo"><?= $filme['nome_film'] ?></li>
                            <li class="filme-duracao">Duração: <?= $filme['duracao_film'] ?> minutos</li>
                            <?php $categorias = $infoFilme->recuperaCategoriaFilme($filme['id_film']); ?>
                            <li class="filme-genero">Gênero: <?php foreach($categorias as $categoria) { echo $categoria['nomegenero_gene']; } ?></li>
                            
                            <ul class="box-filme-horario">
                                <?php 
                                    $horariosFilmes = $infoFilme->recuperaFilmeHorarios($filme['id_film']);
                                    foreach($horariosFilmes as $horario){ ?>
                                    <li>
                                        <a href="poltrona?sessao=<?= $horario['id_sala_sess'];?>">
                                            <span class="box-sala">Sala: <?=$horario['nome_sala'];?></span>
                                            <span class="box-horario"><?=date("H:i",strtotime($horario['hora_sess']));?></span>
                                        </a>
                                    </li>
                                <?php }?>
                            </ul>
                        </ul>

                        
                </div>
            <?php }?>
        </div>

    </div>
</main>









<?php
require "src/View/dev-footer-html.php";
require "src/View/footer-html.php"
?>