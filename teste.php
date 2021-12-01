<?php

 $diaSemana = array(
     'Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'
);
 $semanaCinema = array();
 
 $hoje = new DateTime();
 echo $hoje->format("d") . PHP_EOL;
 $diaDaSemanaAtual = date('w');
 //$diaDaSemanaAtual = 4;
 echo ">>>> $diaDaSemanaAtual";
 $diaDaSemanaAtual -= 1;
 $umDia = new DateInterval('P1D'); // Intervalo de 1 dia
 $seteDias = new DateInterval('P7D'); // Incremento de 7 dias
 

 $contador = 0;
 while($contador < 7){
     $diaDaSemana = date('w',strtotime("+$diaDaSemanaAtual day"));

     if ($diaDaSemana == 4 AND !empty($semanaCinema)) {
         break;
     }
 

     $semanaCinema[$hoje->format("d/m")] = $diaSemana[$diaDaSemana];
     $hoje->add($umDia);

     $diaDaSemanaAtual++;
     $contador ++;
 }
 