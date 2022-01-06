<?php

session_start();

if (!isset($_SESSION['conta'])) {
    $_SESSION['erroLoginExpiracao'] = "Sessão expirada, faça login novamente!";
    //Aqui vai voltar pra tela de login
    header("Location: http://localhost/SecretInvestClub/index.php");

} else {

  require("../src/backend/conecta.php");

  $acumuladoGeralTotal = 0;
  $acumuladoGeralDiario = 0;
  $acumuladoGeralSemanal = 0;
  $acumuladoGeralMensal = 0;

  $sql = "SELECT * FROM `tbl_robos_mt5` WHERE `Status` = 'Ativo'";
  $result = $conn->query($sql);
  if ($result->num_rows >= 0) {
    while ($row = $result->fetch_array()) {
      $acumuladoGeralTotal += $row['AcumuladoTotal'];
      $acumuladoGeralDiario += $row['AcumuladoDiario'];
      $acumuladoGeralSemanal += $row['AcumuladoSemanal'];
      $acumuladoGeralMensal += $row['AcumuladoMensal'];

    }
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Secret Invest Club</title>
  <link rel="icon" type="imagem/png" href="../src/img/favicon.ico" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>
    #nome_usuario_sidebar:hover{
      color: #c2c7d0;
    }
    #nome_empresa_sidebar:hover{
      color: rgba(255,255,255,.8);
    }

    .textoLiberado{
      background-color: none;
      color: #fff;
      border-radius: none;
    }

    .textoProibido{
      background: rgba(107, 115, 123, 1);
      color: #343a40;
      border-radius: 5px;
      text-shadow: none;
    }

  </style>

</head>
<!-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> -->
<body class="hold-transition dark-mode sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../src/img/$comEscudo.png" alt="SecretInvestClub logo" width="150" height="auto">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" role="button" id="btn-eye-open" onclick="esconderMostrar()"><i class="far fa-eye"></i></a>
        <a class="nav-link d-none" role="button" id="btn-eye-closed" onclick="esconderMostrar()"><i class="far fa-eye-slash"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="../index.php" role="button">
          Sair
          <i class="fas fa-sign-out-alt" style="padding-left: 5px;"></i>
        </a>
      </li>
      
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 collapsed">

    <!-- Brand Logo -->
    <a class="brand-link" id="nome_empresa_sidebar">
      <img src="../src/img/$comEscudo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; border-radius: 0!important; box-shadow: none!important;">
      <span class="brand-text font-weight-light">Secret Invest Club</span>
    </a>

    <!-- Sidebar -->
    <!-- <div class="sidebar" style="margin-top: 0!important; padding-bottom: 0!important; height:100vh!important"> -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image">
          <img src="dist/img/robot.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="white-space: normal;">
          <a class="d-block" id="nome_usuario_sidebar"><?php echo $_SESSION['nome']; ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <div>  <!-- Informações do Robô -->   
            <li class="nav-header">Informações do Robô</li>
            <li class="nav-item">
              <a href="./monitoramento.php" class="nav-link">
                <i class="nav-icon fas fa-info-circle pr-2"></i>
                <p>Monitoramento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog pr-2"></i>
                <p>Ajustes</p>
              </a>
            </li>
          </div>

          <div> <!-- Informações das Operações -->
            <li class="nav-header">Informações das Operações</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-history pr-2"></i>
                <p>Histórico</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line pr-2"></i>
                <p>Estatísticas</p>
              </a>
            </li>
          </div>

          <div> <!-- Informações de Plataforma -->
            <li class="nav-header">Informações de Plataforma</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe pr-2"></i>
                <p>MetaTrader 5</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                <i class="nav-icon fas fa-landmark pr-2"></i>
                <p>Corretora</p>
              </a>
            </li> -->
          </div>

          <div> <!-- Informações Pessoais -->
            <li class="nav-header">Informações Pessoais</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-contract pr-2"></i>
                <p>Plano</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user pr-2"></i>
                <p>Perfil</p>
              </a>
            </li>
          </div>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: rgb(25 25 25);">

    <!-- Content Header (Page header) -->
    <div class="content-header pb-0">
      <div class="container-fluid">
        <div class="row" style="">

          <div class="col-12">
            <div class="small-box bg-info shadow" style="background-color: #343a40!important; border: 2px solid white;">
              <div class="inner d-flex justify-content-between" style="padding: 5px;">
                <div class="d-flex align-items-center">
                  <h4 class="mb-1 pl-3 pr-3 d-flex justify-content-start align-items-center">Acumulado Geral</h4>
                </div>
                <div class="d-flex">
                  <div class="d-flex justify-content-start" style="flex-direction: column;">
                    <h4 class="mb-0 pl-4 pr-3 d-flex align-items-center" style="font-size: 1.5rem; color: #687077;">DIÁRIO</h4> 
                    <h4 class="mb-0 pl-4 pr-3 d-none align-items-center textoProtegido textoLiberado" style="font-size: 1.9rem;">R$ <?php echo number_format($acumuladoGeralDiario, 2, ',', '.') ?></h4>
                    <h4 class="mb-0 ml-4 mr-3 d-flex textoProtegido textoProibido" style="font-size: 1.9rem;">&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;</h4>
                  </div>
                  <div class="d-flex justify-content-start" style="flex-direction: column;">
                    <h4 class="mb-0 pl-4 pr-3 d-flex align-items-center" style="font-size: 1.5rem; color: #687077;">SEMANAL</h4>
                    <h4 class="mb-0 pl-4 pr-3 d-none align-items-center textoProtegido textoLiberado" style="font-size: 1.9rem;">R$ <?php echo number_format($acumuladoGeralSemanal, 2, ',', '.') ?></h4>
                    <h4 class="mb-0 ml-4 mr-3 d-flex textoProtegido textoProibido" style="font-size: 1.9rem;">&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;</h4>                  
                  </div>
                  <div class="d-flex justify-content-start" style="flex-direction: column;">
                    <h4 class="mb-0 pl-4 pr-3 d-flex align-items-center" style="font-size: 1.5rem; color: #687077;">MENSAL</h4>
                    <h4 class="mb-0 pl-4 pr-3 d-none align-items-center textoProtegido textoLiberado" style="font-size: 1.9rem;">R$ <?php echo number_format($acumuladoGeralMensal, 2, ',', '.') ?></h4>
                    <h4 class="mb-0 ml-4 mr-3 d-flex textoProtegido textoProibido" style="font-size: 1.9rem;">&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;</h4>                  
                  </div>
                  <div class="d-flex justify-content-start" style="flex-direction: column;">
                    <h4 class="mb-0 pl-4 pr-3 d-flex align-items-center" style="font-size: 1.5rem; color: #687077;">TOTAL</h4>
                    <h4 class="mb-0 pl-4 pr-3 d-none align-items-center textoProtegido textoLiberado" style="font-size: 1.9rem;">R$ <?php echo number_format($acumuladoGeralTotal, 2, ',', '.') ?></h4>
                    <h4 class="mb-0 ml-4 mr-3 d-flex textoProtegido textoProibido" style="font-size: 1.9rem;">&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;</h4>                  
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

          <?php 
            $sql = "SELECT * FROM `tbl_robos_mt5` WHERE `Status` = 'Ativo'";
            $result = $conn->query($sql);
            if ($result->num_rows >= 0) {
              while ($rowRobo = $result->fetch_array()) {

                $nomeUsuario = "NC";

                $sql2 = "SELECT * FROM `tbl_usuarios_site` WHERE `Conta` = " . $rowRobo["Conta"];
                $result2 = $conn->query($sql2);
                if ($result->num_rows >= 0) {
                  while ($rowUser = $result2->fetch_array()) {
                    $nomeUsuario = $rowUser['Nome'];
                  }
                }

                    // Posicionado = green
                    // Ativo(Cinza) = #6c757d
                    // UltimoNivel(Vermelho) = #bb0000
                    // Problemas(Amarelo) = #b7b700

                    $color = "#6c757d"; //Ativo

                    if ($rowRobo['Problemas']){ $color = "#b7b700"; } 
                    else if ($rowRobo['EstaNoUltimoNivel']){ $color = "#bb0000"; } 
                    else if ($rowRobo['EstaPosicionado']){ $color = "green"; }


                    echo "
                      <div class='col-xxl-2 col-lg-3 col-6'>
                        <div class='card card-gray'>
                          <div class='card-header' style='background-color: ".$color.";'> <!-- Verde = Posicionado -->
                            <div>
                              <h3 class='card-title' style='font-size: 2rem; text-shadow: 1px 1px 2px black;'>".$nomeUsuario."</h3>
                            </div>
                            <div class='d-flex justify-content-end'>
                              <img src='../src/img/real2.png' alt='Símbolo real' height='38' width='auto'>
                            </div>
                          </div>
                          <!-- /.card-header -->
                          <div class='card-body pt-2 pb-2'>
                            <div class='row'>
                              <div class='col-12'>
                                <h5 class='mb-2 mt-0' style='color: #6d757d'>Robô: ".$rowRobo['Nome']."</h5>
                              </div>
                            </div>
                            <div class='row'>
                              <div class='col-6'>
                                <h5 class='mb-0' style='color: #6d757d'>DIÁRIO</h5>
                                <h3 class='mb-3 d-none textoProtegido textoLiberado'>".number_format($rowRobo['AcumuladoDiario'], 2, ',', '.')."</h3>
                                <h3 class='mb-3 textoProtegido textoProibido' style='max-width: fit-content;'>&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;</h3>
                              </div>
                              <div class='col-6'>
                                <h5 class='mb-0' style='color: #6d757d'>SEMANAL</h5>
                                <h3 class='mb-3 d-none textoProtegido textoLiberado'>".number_format($rowRobo['AcumuladoSemanal'], 2, ',', '.')."</h3>
                                <h3 class='mb-3 textoProtegido textoProibido' style='max-width: fit-content;'>&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;</h3>
                              </div>
                            </div>
                            <div class='row'>
                              <div class='col-6'>
                                <h5 class='mb-0' style='color: #6d757d'>MENSAL</h5>
                                <h3 class='d-none textoProtegido textoLiberado'>".number_format($rowRobo['AcumuladoMensal'], 2, ',', '.')."</h3>
                                <h3 class='textoProtegido textoProibido' style='max-width: fit-content;'>&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;</h3>
                              </div>
                              <div class='col-6'>
                                <h5 class='mb-0' style='color: #6d757d'>TOTAL</h5>
                                <h3 class='d-none textoProtegido textoLiberado'>".number_format($rowRobo['AcumuladoTotal'], 2, ',', '.')."</h3>
                                <h3 class='textoProtegido textoProibido' style='max-width: fit-content;'>&lowast;&lowast;&lowast;&lowast;&lowast;&lowast;</h3>
                              </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                      </div>
                    ";

                  

              }
            }
          ?>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-senha-mostrar-dados">
    <div class="modal-dialog d-flex justify-content-center">
      <div class="modal-content bg-secondary" style="border-radius: 30px; width: auto;">
        <div class="modal-header d-flex justify-content-center" style="border: none;">
          <h5 class="modal-title pr-5 pl-5">Insira sua Senha</h5>
        </div>
        <div class="modal-body p-0 d-flex justify-content-center" style="font-size: 1.3rem;">
          <input class="mb-0 pl-3" id="senha_mostrar_dados" type="password" style="border-radius: 15px; border: none; width: 80%;">
        </div>
        <div class="modal-footer justify-content-around" style="border: none;">
          <button type="button" class="btn btn-outline-light mt-2 mr-0 mb-0 ml-0" style="border-radius: 12px;" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-outline-light mt-2 mr-0 mb-0 ml-0" style="border-radius: 12px;" id="btn_mostrar_dados">Confirmar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="modal-senha-mostrar-dados-errada">
    <div class="modal-dialog d-flex justify-content-center">
      <div class="modal-content bg-secondary" style="border-radius: 30px; width: auto;">
        <div class="modal-body d-flex justify-content-center align-items-center" style="flex-direction: column;">
          <i class="fas fa-times" style="color: red; font-size: 3rem;"></i>
          <h4>Senha incorreta!</h4>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 Secret Invest Club.</strong>
    Todos os direitos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Versão</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>

<script>
  function esconderMostrar(){

    if(document.querySelector("#btn-eye-open").classList.contains("d-none")){
      // Vai esconder
      document.querySelector("#btn-eye-closed").classList.add("d-none");
      document.querySelector("#btn-eye-open").classList.remove("d-none");

      document.querySelectorAll(".textoLiberado").forEach(function(item){
        item.classList.remove("d-flex");
        item.classList.add("d-none");
      })

      document.querySelectorAll(".textoProibido").forEach(function(item){
        item.classList.remove("d-none");
        item.classList.add("d-flex");
        item.classList.add("align-items-center");
      })


    } else {
      // Vai mostrar
      $('#modal-senha-mostrar-dados').modal('show'); 
      // document.getElementById('senha_mostrar_dados').focus({preventScroll:false});
   }

  }
</script>

<script>
  function senhaCerta() {
    document.querySelector("#btn-eye-open").classList.add("d-none");
    document.querySelector("#btn-eye-closed").classList.remove("d-none");

    document.querySelectorAll(".textoProibido").forEach(function(item){
      item.classList.remove("d-flex");
      item.classList.add("d-none");
    })

    document.querySelectorAll(".textoLiberado").forEach(function(item){
      item.classList.remove("d-none");
      item.classList.add("d-flex");
    })
  } 
  
  function senhaErrada() {
    //Senha errada
    $('#modal-senha-mostrar-dados-errada').modal('show'); 
    setTimeout(function() { $('#modal-senha-mostrar-dados-errada').modal('hide'); }, 2500);
  }

  $("#btn_mostrar_dados").click(function(){
    let senha = document.querySelector("#senha_mostrar_dados").value;

    $.ajax({
      method: "POST",
      data: {password: senha, conta: <?php echo $_SESSION['conta'] ?>},
      url: "../src/backend/senhaOlho.php"
    }).then(
      function(e){
        ($sucesso = $.parseJSON(e).sucesso),

        $sucesso ? (senhaCerta()) : (senhaErrada());  
      }
    );

    document.querySelector("#senha_mostrar_dados").value = "";
    $('#modal-senha-mostrar-dados').modal('hide'); 
  });


</script>

</body>
</html>
