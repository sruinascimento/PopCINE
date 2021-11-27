<?php

use Brequedoc\PopCine\Config\Modelo\Filme;

require "src/Config/filmes.php";
require "src/Config/desenvolvedores.php";

$todosFilmes = new Filme();
$filmes = $todosFilmes->buscarTodosFilmes();

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
      <a href="filme?id=<?= $filme['id_film'];?>">
        <ul>
          <li><img src="<?= $filme['capafilme_film'] ?>" alt="capa filme"></li>
          <li><?= $filme['nome_film'] ?></li>
          <li><?= $filme['duracao_film'] ?></li>
          <li><?= $filme['classificacao_film'] ?></li>
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
require "src/View/footer-html.php"
?>