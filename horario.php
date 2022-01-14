<?php 

  $fuso = new DateTimeZone('America/Sao_Paulo');
  $data = new DateTime('now');
  $data->setTimezone($fuso);
  $dataAtual =  $data->format('d-m-Y H:i:s');

  // var_dump($data);
  // printf("Agora => %s", $dataAtual);

  // echo '<hr>';

  $horaAtual    = $data->format('H');
  settype($horaAtual, "integer");
  $minutoAtual  = $data->format('i');
  settype($minutoAtual, "integer");

  $tempoAtualEmMinutos = ($horaAtual * 60) + $minutoAtual;

  printf("Atual <br> Hora/Minuto: %d/%d --- %d minutos", $horaAtual, $minutoAtual, $tempoAtualEmMinutos);

  require("./src/backend/conecta.php");
  $ultimoHorarioModificado = NULL;
  $sql = "SELECT * FROM `tbl_robos_mt5` WHERE `Id` = 1";
  $result = $conn->query($sql);
  if ($result->num_rows >= 0) {
    while ($row = $result->fetch_array()) {
      // $ultimoHorarioModificado = $row['Modificado'];
      $ultimoHorarioModificado = new DateTime($row['Modificado']);
    }
  }

  // echo '<hr>';
  // echo 'Último horário modificado = ';
  // print_r($ultimoHorarioModificado);
  
  echo '<hr>';
  
  $horaUltimoHorarioModificado = $ultimoHorarioModificado->format('H');
  $minutoUltimoHorarioModificado = $ultimoHorarioModificado->format('i');
  
  $tempoUltimoHorarioModificadoEmMinutos = ($horaUltimoHorarioModificado * 60) + $minutoUltimoHorarioModificado;
  printf("UltimoHorarioModificado <br> Hora/Minuto: %d/%d --- %d minutos", $horaUltimoHorarioModificado, $minutoUltimoHorarioModificado, $tempoUltimoHorarioModificadoEmMinutos);
  
  // 09:00 = 540
  // 09:30 = 540 + 30 = 570
  // 10:00 = 600 
  
  echo '<hr>';

  if($tempoAtualEmMinutos > ($tempoUltimoHorarioModificadoEmMinutos + 35)){
    echo 'Robô inativo';
  } else {
    echo 'Robô ativo';
  }
?>


<!doctype html>
<html lang="pt-br">
  <head>
    <title>Teste | Horário</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
      html{
        background-color: black;
        color: white;
      }
    </style>
  </head>
</html>