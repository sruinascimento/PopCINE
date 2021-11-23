<?php
$nomeFilme = "Homem Aranha";
$titulo = $nomeFilme;
require "config/desenvolvedores.php";
require "src/View/head-html.php";
require "src/View/header-html.php";
?>

<main>
    <div class="container-main">
        <div class="titulo-filme">
            <h1><?=$nomeFilme?></h1>
        </div>
        <div class="container-div">
            <div class="capa-filme">
                <img class="capa-imagem" src="img/capa-filmes/homem-aranha-capa.jpg" alt="capa-filme">
            </div>
            <div class="detalhes-filme">
                <span>aaaa</span>
                
                <span>sodium_crypto_sign_seed_keypair</span>
                <h3>Trailler</h3>
                <iframe width="400" height="250" src="https://www.youtube.com/embed/FDNNHh7TRN0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="container-descricao">
                    <h3>Descrição</h3>
                    <ul>
                        <li>Em Homem-Aranha: Sem Volta para Casa, Peter Parker (Tom Holland) precisará lidar com as consequências da sua identidade como aracnídeo ter sido revelada pela reportagem do Clarim Diário. Incapaz de separar sua vida normal das aventuras de ser um super-herói, Parker pede ao Doutor Estranho (Benedict Cumberbatch) para que todos esqueçam sua verdeira identidade. Entretanto, o feitiço não sai como planejado e a situação torna-se ainda mais perigosa, forçando-o a descobrir o que realmente significa ser o Homem-Aranha</li>
                        <li><span>Gênero:</span> aventura, heroi, suspense</li>
                        <li><span>Duração:</span> 1h 33m</li>
                        <li><span>Diretor:</span> Danilo Carolaine</li>
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