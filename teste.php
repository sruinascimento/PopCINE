<?php

//  $diaSemana = array(
//      'Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'
// );
//  $semanaCinema = array();
 
//  $hoje = new DateTime();
//  echo $hoje->format("d") . PHP_EOL;
//  $diaDaSemanaAtual = date('w');
//  //$diaDaSemanaAtual = 4;
//  echo ">>>> $diaDaSemanaAtual";
//  $diaDaSemanaAtual -= 1;
//  $umDia = new DateInterval('P1D'); // Intervalo de 1 dia
//  $seteDias = new DateInterval('P7D'); // Incremento de 7 dias
 

//  $contador = 0;
//  while($contador < 7){
//      $diaDaSemana = date('w',strtotime("+$diaDaSemanaAtual day"));

//      if ($diaDaSemana == 4 AND !empty($semanaCinema)) {
//          break;
//      }
 

//      $semanaCinema[$hoje->format("d/m")] = $diaSemana[$diaDaSemana];
//      $hoje->add($umDia);

//      $diaDaSemanaAtual++;
//      $contador ++;
//  }

//echo date("Y-m/d",strtotime('20/12/1999'));

/*

$timeZone = new DateTimeZone('America/Sao_Paulo');
$dataNascimento = new Datetime('1999/12/05', $timeZone);

echo " >>>> ".  date('Y/m/d', strtotime('21/12/1995')) . PHP_EOL;*/

//echo date("d/m", strtotime("20/12/1999"));
$data = "20/12/1999";
$data2 = implode("-",array_reverse(explode("/",$data)));
echo $data2;

$dataFormatada = explode("/", "12/05/1996");



// $MNTTZ = new DateTimeZone('America/Denver');
// //$ESTTZ = new DateTimeZone('America/New_York');

// $dt = new DateTime('11/24/2009 2:00 pm', $MNTTZ);