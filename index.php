<?php
require "config/filmes.php";
require "config/desenvolvedores.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/reset.css" />
  <link rel="stylesheet" href="css/nav.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <script src="https://kit.fontawesome.com/dc9d684c57.js" crossorigin="anonymous"></script>
  <title>PopCINE</title>
</head>

<body>
  <header>
    <nav>
      <ul class="container-nav">
        <li><a href="#"><i class="fas fa-home"></i>Início</a></li>
        <li><a href="#"><i class="far fa-calendar-alt"></i>Programação</a></li>
        <li><a href="#"><i class="fas fa-film"></i>PopCINE</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="container-banner">
      <img src="img/banner-site.png" alt="banner site">
    </div>
    <div class="container-main container-text">
      <h1><span class="destaque-text">Viva</span><span> a melhor</span><span class="destaque-text">experiência</span> <br> em assistir um filme.</h1>
    </div>
    <div class="container-main">
      <h2>Agora no Cinema</h2>
    </div>
    <div class="container-main container-filmes">
      <?php foreach ($filmes as $filme) { ?>
        <ul>
          <li><img src="<?= $filme['capa_filme'] ?>" alt="capa filme"></li>
          <li><?= $filme['nome_filme'] ?></li>
          <li><?= $filme['duracao'] ?></li>
          <li><?= $filme['idade_indicada'] ?></li>
        </ul>
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
  <footer>
    <div class="container-main container-footer">
      <h5 class="titulo-dev">Desenvolvido por:</h5>
      <ul class="container-devs">
        <?php foreach ($devs as $dev) { ?>
          <li>
            <a href="<?= $dev['link']; ?>" target="_blank">
              <i class="fab fa-github"></i>
              <?= $dev['username'] ?>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>

  </footer>
</body>

</html>