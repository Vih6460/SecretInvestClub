<?php


$conn = new mysqli("localhost", "root", "senha1234", "secret_invest_club");


//$conn = new mysqli("localhost", "root", "", "pagamentoonline");;
$fuso = new DateTimeZone('America/Sao_Paulo');
$data = new DateTime();
$data->setTimezone($fuso);
$dataatual =  $data->format('d-m-Y H:i:s');