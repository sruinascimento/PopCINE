<?php

use Brequedoc\PopCine\Config\Modelo\Filme;

require "src/Config/filmes.php";
require "src/Config/desenvolvedores.php";

$filmeCine = new Filme();
$filmes = $filmeCine->buscarTodosFilmes();
$titulo = 'PopCine';
require "src/View/head-html.php";
require "src/View/header-html.php";
?>

<main>
  <div class="container-banner">
    <img src="public/img/banner-site.png" alt="banner site">
  </div>
  <div class="container-main container-text">
    <h1><span class="destaque-text">Viva</span><span> a melhor</span><span class="destaque-text">experiência</span> <br> em assistir um filme.</h1>
  </div>
  <div class="container-main">
    <h2>Agora no Cinema</h2>
  </div>
  <div class="container-main container-filmes">
    <?php foreach ($filmes as $filme) { ?>
      <a class="container-filme" href="filme?id=<?= $filme['id_film'];?>">
        <ul>
          <li><img src="<?= $filme['capafilme_film'] ?>" alt="capa filme"></li>
          <li>
            <div>
              <?= $filme['nome_film'] ?>
            </div>
            <div>
              <img class="classificacao-filme" src="public/img/classificacao-filme/<?= $filme['classificacao_film'] ?>.png" alt="classificacao-filme">  
            </div>
        </li>
          <li><span>Gênero:</span>
          <?php  $categorias = $filmeCine->recuperaCategoriaFilme($filme['id_film']);
                  foreach ($categorias as $categoria) {
                      echo trim($categoria['nomegenero_gene']);
                      $ultimo = end($categorias);           
                      echo $ultimo['nomegenero_gene'] == $categoria['nomegenero_gene']?".":", ";
                  }?>  
          </li>
          <li><span>Duração:</span> <?= $filme['duracao_film'] ?> minutos.</li>
          <li>
        </ul>
      </a>
    <?php } ?>
  </div>
  <div class="container-fim">
    <div class="container-main container-divs">

      <div class="container-frase-final">
        <p class="frase-final">Os <span>MELHORES</span> filmes para<br> <span>VOCÊ</span> e sua <span>FAMÍLIA</span><br>é aqui no <span>PopCINE.</span></p>
      </div>

      <div class="container-midias">
        <h3>Siga-nos!<h3>
            <ul>
              <div class="container-midias-matriz">
                <a href="#" target="_blank">
                  <li><i class="fab fa-facebook"></i>Facebook</li>
                </a>
                <a href="#" target="_blank">
                  <li><i class="fab fa-instagram"></i>Instagram</li>
                </a>
              </div>
              <div class="container-midias-matriz">
                <a href="#" target="_blank">
                  <li><i class="fab fa-twitter"></i>Twitter</li>
                </a>
                <a href="#" target="_blank">
                  <li><i class="fab fa-whatsapp"></i>WhatsApp</li>
                </a>
              </div>
            </ul>
      </div>

    </div>

  </div>
</main>

<?php
require "src/View/dev-footer-html.php";
require "src/View/footer-html.php"; ?>