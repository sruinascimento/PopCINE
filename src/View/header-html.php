<header>  
      <nav <?php echo $url[1] <> "" ? "class='nav-default'" : '' ; ?>>
      <a href="/"><img class ="logo" src="public/img/LOGO-popcine3.png" alt="logo"></a>
        <ul class="container-nav">
          <li><a href="/"><i class="fas fa-home"></i>Início</a></li>
          <li><a href="programacao"><i class="far fa-calendar-alt"></i>Programação</a></li>
          <?php if (isset($_SESSION['nome'])){ ?>
              <li><a href="meu-perfil"><i class="fas fa-user"></i>Perfil</a></li>
              <li><a href="logout"><i class="fas fa-sign-out-alt"></i>Sair</a></li>
          <?php }else{ ?>
              <li><a href="login"><i class="fas fa-sign-in-alt"></i>Entrar</a></li>
          <?php } ?>
        </ul>
      </nav>
</header>