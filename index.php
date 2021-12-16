<?php

  session_start();

  unset($_SESSION['conta']);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Secret Invest Club</title>
      <link rel="icon" type="imagem/png" href="./src/img/favicon.ico" />

      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="./src/css/reset.css">

      <!-- Font Awesome -->
      <link rel="stylesheet" href="./src/plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- icheck bootstrap -->
      <link rel="stylesheet" href="./src/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <!-- Theme style -->
      <link rel="stylesheet" href="./src/css/style.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;1,400;1,700&display=swap" rel="stylesheet">
    </head>

    <body class="hold-transition login-page">
      
      <header>
        <video autoplay="true" id="background" loop muted poster="./src/img/imgBackgroundBlue.jpg" preload="auto">
            <source src="./src/img/videobackgroundBlueLeve.mp4"> 
            <!-- <a href="https://pt.vecteezy.com/video/1626175-o-aumento-e-diminuicao-dos-valores-de-mercado-de-acoes">o aumento e diminuição dos valores do mercado de ações Vídeos de arquivo por Vecteezy</a> -->
        </video>
      </header>

      <div id="conteudo">
        <div class="card p-3" id="cardLogin">
          <div class="row" style="background-color: rgba(255, 255, 255, 0);">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
              <img src="./src/img/LogoFinal.png" class="pt-2" id="img-card" alt="Secret Invest Club">
            </div>
            <div class="col-md-12">
              <div class="card-body pb-2" style="color: white; background-color: rgba(255, 255, 255, 0);">
                <form id="formLogin">
                  <div class="row ui_text_field">
                    <input type="text" value="" onchange="this.setAttribute('value', this.value)" class="form-control inputLogin" name="conta" required>
                    <label for="exampleInputEmail1" class="lblLogin">Nº da Conta</label>
                  </div>
                  <div class="row ui_text_field">
                    <input type="password" value="" onchange="this.setAttribute('value', this.value)" class="form-control inputLogin" id="exampleInputPassword1" name="senha" required>
                    <label for="exampleInputPassword1" class="lblLogin">Senha</label>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn mt-2 mb-0" id="btnEntrar">Entrar</button>
                  </div>
                </form>
              </div>
              <div class="mt-2 text-center text-danger" id="mensagemErro" style="display: none;"> <!-- Mensagem de erro de login -->
                <p id="txtMensagemErro"></p>
              </div>
              <?php 
                  if(isset($_SESSION['erroLoginExpiracao'])){
                    echo '<div class="mt-2 text-center text-danger">';
                    echo '<p class="mb-0">Sessão expirada, faça login novamente!</p>';
                    echo '</div>';
                    unset($_SESSION['erroLoginExpiracao']);
                  }
              ?>
            </div>
          </div>
        </div>
      </div>



      <!-- jQuery -->
      <script src="./src/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="./src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="./src/dist/js/adminlte.min.js"></script>
      <!-- AJAX -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- SweetAlert -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
      <!-- Personal Script -->
      <script src="./src/js/login.js"></script>
    

    </body>
</html>