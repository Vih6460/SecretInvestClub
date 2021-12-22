<?php

session_start();

  if (!isset($_SESSION['conta'])) {
      $_SESSION['erroLoginExpiracao'] = "Sessão expirada, faça login novamente!";
      //Aqui vai voltar pra tela de login
      header("Location: http://localhost/SecretInvestClub/index.php");

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
      background: rgba(255, 255, 255, 0.5);
      color: transparent;
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
        <a class="nav-link d-none" role="button" id="btn-eye-open" onclick="esconderMostrar()"><i class="far fa-eye"></i></a>
        <a class="nav-link" role="button" id="btn-eye-closed" onclick="esconderMostrar()"><i class="far fa-eye-slash"></i></a>
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


        <div class="row">
        <!-- <div class="row" style="text-shadow: 0px 0px 5px rgb(0 0 0);"> -->
          <div class="col-12">
            <!-- small card -->
            <!-- <div class="small-box bg-info shadow" style="background-color: #1aef00!important; cursor: pointer;" data-toggle="modal" data-target="#modal-secondary"> -->
            <div class="small-box bg-info shadow" style="background-color: #343a40!important; border: 3px solid white;">
              <div class="inner">
                <h4 class="mb-1 pl-3 pr-3 d-flex justify-content-between align-items-center">Acumulado Geral:<span class="textoTeste textoLiberado" style="font-size: 2rem;">R$ 100.000,00</span></h4>
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
          <div class="col-xxl-2 col-lg-3 col-6">
            <div class="card card-gray">
              <div class="card-header" style="background-color: green;">
                <div>
                  <h3 class="card-title" style="font-size: 2rem; text-shadow: 2px 2px 2px black;">Carlos</h3>
                </div>
                <div class="d-flex justify-content-end">
                  <img src="../src/img/real2.png" alt="Símbolo real" height="38" width="auto">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">DIÁRIO</h5>
                    <h3 class="mb-4 textoTeste textoLiberado">5.000,00</h3>
                  </div>
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">SEMANAL</h5>
                    <h3 class="textoTeste textoLiberado">15.000,00</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">MENSAL</h5>
                    <h3 class="textoTeste textoLiberado">100.000,00</h3>
                  </div>
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">TOTAL</h5>
                    <h3 class="textoTeste textoLiberado">125.000,00</h3>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>

          <div class="col-xxl-2 col-lg-3 col-6">
            <div class="card card-gray">
            <div class="card-header">
                <div>
                  <h3 class="card-title" style="font-size: 2rem; text-shadow: 2px 2px 2px black;">César</h3>
                </div>
                <div class="d-flex justify-content-end">
                  <img src="../src/img/real2.png" alt="Símbolo real" height="38" width="auto">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">DIÁRIO</h5>
                    <h3 class="mb-4 textoTeste textoLiberado">1.000,00</h3>
                  </div>
                  <div class="col-6">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">SEMANAL</h5>
                    <h3 class="textoTeste textoLiberado">4.000,00</h3>
                  </div>
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">MENSAL</h5>
                    <h3 class="textoTeste textoLiberado">10.000,00</h3>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>

          <div class="col-xxl-2 col-lg-3 col-6">
            <div class="card card-gray" >
              <div class="card-header" style="background-color: #bb0000;;">
                <div>
                  <h3 class="card-title" style="font-size: 2rem; text-shadow: 2px 2px 2px black;">Willian</h3>
                </div>
                <div class="d-flex justify-content-end">
                  <img src="../src/img/real2.png" alt="Símbolo real" height="38" width="auto">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">DIÁRIO</h5>
                    <h3 class="mb-4 textoTeste textoLiberado">1.000,00</h3>
                  </div>
                  <div class="col-6">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">SEMANAL</h5>
                    <h3 class="textoTeste textoLiberado">4.000,00</h3>
                  </div>
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">MENSAL</h5>
                    <h3 class="textoTeste textoLiberado">10.000,00</h3>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>

          <div class="col-xxl-2 col-lg-3 col-6">
            <div class="card card-gray">
              <div class="card-header" style="background-color: #b7b700;;">
                <div>
                  <h3 class="card-title" style="font-size: 2rem; text-shadow: 2px 2px 2px black;">Vitor</h3>
                </div>
                <div class="d-flex justify-content-end">
                  <img src="../src/img/real2.png" alt="Símbolo real" height="38" width="auto">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">DIÁRIO</h5>
                    <h3 class="mb-4 textoTeste textoLiberado">1.000,00</h3>
                  </div>
                  <div class="col-6">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">SEMANAL</h5>
                    <h3 class="textoTeste textoLiberado">4.000,00</h3>
                  </div>
                  <div class="col-6">
                    <h5 class="mb-0" style="color: #6d757d">MENSAL</h5>
                    <h3 class="textoTeste textoLiberado">10.000,00</h3>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-secondary">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-secondary">
        <div class="modal-header">
          <h4 class="modal-title">Secondary Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-light">Save changes</button>
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

      document.querySelectorAll(".textoTeste").forEach(function(item){
        item.classList.remove("textoLiberado");
        item.classList.add("textoProibido");
      })

    } else {
      // Vai mostrar
      document.querySelector("#btn-eye-open").classList.add("d-none");
      document.querySelector("#btn-eye-closed").classList.remove("d-none");

      document.querySelectorAll(".textoTeste").forEach(function(item){
        item.classList.remove("textoProibido");
        item.classList.add("textoLiberado");
      })
    }

  }
</script>

</body>
</html>
