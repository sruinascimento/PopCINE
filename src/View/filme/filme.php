<?php

use Brequedoc\PopCine\Config\Modelo\Filme;


if (isset($_GET['id'])) {

    if (!filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT)) {
        header("Location: /");
        exit();
    }

    $infoFilme = new Filme();
    $filme = $infoFilme->recuperaFilme($_GET['id']);

    if (is_null($filme)) {
        header("Location: /");
        exit();
    }

    $generosFilme = $infoFilme->recuperaCategoriaFilme($_GET['id']);
    $elencoFilme = $infoFilme->recuperaElencoFilme($_GET['id']);
}

$nomeFilme = $filme['nome_film'];
$titulo = $filme['nome_film'];
require "src/Config/desenvolvedores.php";
require "src/View/head-html.php";
require "src/View/header-html.php";
?>

<main>
    <div class="container-main">
        <div class="titulo-filme">
            <h1><?= $nomeFilme ?></h1>
        </div>
        <div class="container-div">
            <div class="capa-filme">
                <img class="capa-imagem" src="<?= $filme['capafilme_film'] ?>" alt="capa-filme">
            </div>
            <div class="detalhes-filme">
                <h3>Trailler</h3>
                <iframe width="400" height="250" src="https://www.youtube.com/embed/<?= $filme['trailer_film'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container-descricao">
                    <h3>Descrição</h3>
                    <ul>
                        <li><?= $filme['sinopse_filme'] ?></li>
                        <li><span>Gênero: </span> 
                            <?php
                                foreach ($generosFilme as $genero) {
                                    $ultimo = end($generosFilme);
                                    echo trim($genero['nomegenero_gene']);
                                    echo $ultimo['nomegenero_gene'] == $genero['nomegenero_gene']?".":", ";
                            } ?>
                        </li>
                        <li><span>Duração: </span><?= $filme['duracao_film'] ?> minutos</li>
                        <li><span>Diretor: </span><?= $filme['nome_pess'] ?></li>
                        <li><span>Elenco: </span>
                            <?php
                            foreach ($elencoFilme as $pessoa) {
                                $ultimo = end($elencoFilme);
                                echo trim($pessoa['nome_pess']);
                                echo $ultimo['nome_pess'] == $pessoa['nome_pess']?".":", ";
                            } ?>
                        </li>
                        <li><span>Sinopse </span><?= $filme['sinopse_film'] ?></li>
                    </ul>
                    <p></p>
                    <p></p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
require "src/View/dev-footer-html.php";
require "src/View/footer-html.php"; ?>