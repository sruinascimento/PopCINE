<?php

use Brequedoc\PopCine\Config\Modelo\Cronograma;
use Brequedoc\PopCine\Config\Modelo\Filme;

require "src/Config/desenvolvedores.php";

$cronograma = new Cronograma();
$cronograma = $cronograma->diaDaSemanaCronograma();
$diaAtual = array_shift(array_values($cronograma));
$dataSessao = $diaAtual['data_sess_film'];

$infoFilme = new Filme();
if (isset($_GET['data'])) {
    $todosFilmes = $infoFilme->recuperaFilmesDoDia($_GET['data']);
    $dataSessao = $_GET['data'];
} else {
    $todosFilmes = $infoFilme->recuperaFilmesDoDia($dataSessao);
}

$titulo = 'Programação';
require "src/View/head-html.php";
require "src/View/header-html.php";


?>

<main>
    <div class="container-main">
        <div class="container-datas">
            <div class="box-data">
                <?php foreach ($cronograma as $dia) { ?>
                    <ul class="box-data-lista">
                        <a href="?data=<?= $dia['data_sess_film'] ?>">
                            <li>
                                <span class="data-dia-semana"><?= date("d/m", strtotime($dia['data_sess_film'])) ?></span>
                                <span class="nome-dia-semana"><?= $dia['nome_dia_semana'] ?></span>
                            </li>
                        </a>
                    </ul>
                <?php } ?>
            </div>
        </div>

        <div class="box-todos-filmes">
            <?php foreach ($todosFilmes as $filme) { ?>
                <div class="box-filme">
                    <img src="<?= $filme['capafilme_film'] ?>" alt="capa-filme">
                    <ul class="box-filme-info">
                        <li class="filme-titulo"><?= $filme['nome_film'] ?></li>
                        <li class="filme-duracao">Duração: <?= $filme['duracao_film'] ?> minutos</li>
                        <?php $categorias = $infoFilme->recuperaCategoriaFilme($filme['id_film']); ?>
                        <li class="filme-genero">Gênero: <?php foreach ($categorias as $categoria) {
                                                                echo $categoria['nomegenero_gene'];
                                                            } ?></li>

                        <ul class="box-filme-horario">
                            <?php
                            $horariosFilmes = $infoFilme->recuperaFilmeHorarios($filme['id_film'], $dataSessao);
                            foreach ($horariosFilmes as $horario) { ?>
                                <li>
                                    <a href="poltrona?sessao=<?= $horario['id_sala_sess']; ?>">
                                        <span class="box-sala">Sala: <?= $horario['nome_sala']; ?></span>
                                        <span class="box-horario"><?= date("H:i", strtotime($horario['hora_sess'])); ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </ul>


                </div>
            <?php } ?>
        </div>

    </div>
</main>









<?php
require "src/View/dev-footer-html.php";
require "src/View/footer-html.php"
?>