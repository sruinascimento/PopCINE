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
