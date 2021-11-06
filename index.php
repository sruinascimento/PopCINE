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
  <title>PopCINE</title>
</head>

<body>
  <header>
    <nav>
      <ul class="container-nav">
        <li><a href="#">Início</a></li>
        <li><a href="#">Programação</a></li>
        <li><a href="#">PopCINE</a></li>
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
      <div class="container-main">
        <p>Os melhores conteúdos para sua carreira freelancer, direto na sua caixa de entrada</p>
      </div>
    </div>
  </main>
  <footer>
    <div class="container-main container-footer">
      <h5 class="titulo-dev">Desenvolvido por:</h5>  
        <ul class="container-devs">
          <?php foreach($devs as $dev){?>
            <li>
              <a href="<?= $dev['link']; ?>" target="_blank">
                <img src="img/logo-github.svg">
                <?= $dev['username'] ?>
              </a>
            </li>
          <?php } ?>
        </ul>
    </div>
    
  </footer>
</body>

</html>