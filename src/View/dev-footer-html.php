<?php
  $paginasSemClassFooter = array("/","/filme","","/programacao");
  print_r($_SERVER['PATH_INFO']);
?>

<footer class="<?= (in_array($_SERVER['PATH_INFO'],$paginasSemClassFooter))? "": 'footer-ex'; ?>">
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
