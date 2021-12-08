<?php

// $conn = new mysqli("localhost", "uniadm67_payOn", "Dev2019**", "uniadm67_pagamentoOnline");
$conn = new mysqli("localhost", "root", "senha1234", "secret_invest_club");
$fuso = new DateTimeZone('America/Sao_Paulo');
$data = new DateTime();
$data->setTimezone($fuso);
$dataatual =  $data->format('d-m-Y H:i:s');