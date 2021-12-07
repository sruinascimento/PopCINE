<?php

$diaSemana = array(
    'Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'
);
$semanaCinema = array();
date_default_timezone_set("America/Sao_Paulo");
$hoje = new DateTime("now");

//echo ">>>> Dia atual: " .  $hoje->format("d") . PHP_EOL;
$diaDaSemanaAtual = date('w');
echo $diaDaSemanaAtual . PHP_EOL;
$diaDaSemanaAtual -= 1;
$umDia = new DateInterval('P1D'); // Intervalo de 1 dia
//$seteDias = new DateInterval('P7D'); // Incremento de 7 dias


$contador = 0;
while ($contador < 7) {
    $diaDaSemana = date('w', strtotime("+$diaDaSemanaAtual day"));

    echo ">>>> into loop ${diaDaSemana}" . PHP_EOL;
    if ($diaDaSemana == 4 and !empty($semanaCinema)) {
        break;
    }


    $semanaCinema[$hoje->format("d/m")] = $diaSemana[$diaDaSemana];
    $hoje->add($umDia);

    $diaDaSemanaAtual++;
    $contador++;
}

print_r($semanaCinema);
