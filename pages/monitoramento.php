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
    #navItemAtual{
        color: white;
        font-weight: 500;
        text-shadow: 1px 1px 2px black;
    }
    #navItemAtual:hover{
        cursor: default;
    }
  </style>

</head>
<!-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> -->
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed">
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

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
              <a href="#" class="nav-link" id="navItemAtual">
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
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <!-- Robô ATIVO e DENTO do horário de negociação -->
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                <div class="callout callout-info" style="border-left-color: lime;">
                <h5><i class="fas fa-info pr-2"></i> Status do Robô</h5>
                Robô ativo.
                </div>
            </div>
            <div class="col-sm-6">
                <div class="callout callout-info" style="border-left-color: lime;">
                <h5><i class="fas fa-info pr-2"></i> Status das Negociações</h5>
                Dentro do horário de negociações.
                </div>
            </div>
        </div>

        <!-- Robô ATIVO e FORA do horário de negociação -->
        <!-- <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                <div class="callout callout-info" style="border-left-color: lime;">
                <h5><i class="fas fa-info pr-2"></i> Status do Robô</h5>
                Robô ativo.
                </div>
            </div>
            <div class="col-sm-6">
                <div class="callout callout-info" style="border-left-color: red;">
                <h5><i class="fas fa-info pr-2"></i> Status das Negociações</h5>
                Fora do horário de negociações.
                </div>
            </div>
        </div> -->

        <!-- Robô INATIVO e DENTRO do horário de negociação -->
        <!-- <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                <div class="callout callout-info" style="border-left-color: red;">
                <h5><i class="fas fa-info pr-2"></i> Status do Robô</h5>
                Robô Inativo.
                </div>
            </div>
            <div class="col-sm-6">
                <div class="callout callout-info" style="border-left-color: #ff9c00;">
                <h5><i class="fas fa-info pr-2"></i> Status das Negociações</h5>
                Dentro do horário de negociações.
                </div>
            </div>
        </div> -->

        <!-- Robô INATIVO e FORA do horário de negociação -->
        <!-- <div class="row d-flex justify-content-center">
            <div class="col-sm-6">
                <div class="callout callout-info" style="border-left-color: red;">
                <h5><i class="fas fa-info pr-2"></i> Status do Robô</h5>
                Robô Inativo.
                </div>
            </div>
            <div class="col-sm-6">
                <div class="callout callout-info" style="border-left-color: red;">
                <h5><i class="fas fa-info pr-2"></i> Status das Negociações</h5>
                Fora do horário de negociações.
                </div>
            </div>
        </div> -->

        <!-- ================================================================================================================ -->

        <!-- Card Informações dos Robôs -->
        <div class="card card-gray" style="border-left: 5px solid red;">
          <div class="card-header" >
            <h3 class="card-title" style="font-size: 1.5rem;">K9_WDO_3_1</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <h5 style="font-weight: 600;">Status: &ensp; <span style="font-weight: normal">Não Posicionado</span></h5>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Ativo: &ensp;<span style="font-weight: normal">---</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Contratos: &ensp;<span style="font-weight: normal">---</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Preço Médio: &ensp;<span style="font-weight: normal">---</span></h5>
                </div>
              </div>
            </div>
            <div class="row mt-1">
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Gain: &ensp;<span style="font-weight: normal">---</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Loss: &ensp;<span style="font-weight: normal">---</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Nível: &ensp;<span style="font-weight: normal">---</span></h5>
                </div>
              </div>
            </div>
            <div class="row mt-1">
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Níveis Obtidos: &ensp;<span style="font-weight: normal">---</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Pontos na Entrada: &ensp;<span style="font-weight: normal">---</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Zona: &ensp;<span style="font-weight: normal">---</span></h5>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /Card Informações dos Robôs-->


        <!-- Card Informações dos Robôs -->
        <div class="card card-gray" style="border-left: 5px solid lime;">
          <div class="card-header" >
            <h3 class="card-title" style="font-size: 1.5rem;">K9_WIN_3_1</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row ">
              <div class="col-12">
                <h5 style="font-weight: 600;">Status: &ensp; <span style="font-weight: normal">Posicionado</span></h5>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Ativo: &ensp;<span style="font-weight: normal">WING22</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Contratos: &ensp;<span style="font-weight: normal">10 cts.</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Preço Médio: &ensp;<span style="font-weight: normal">108335 pts.</span></h5>
                </div>
              </div>
            </div>
            <div class="row mt-1">
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Gain: &ensp;<span style="font-weight: normal">108535 pts.</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Loss: &ensp;<span style="font-weight: normal">108135 pts.</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Nível: &ensp;<span style="font-weight: normal">2</span></h5>
                </div>
              </div>
            </div>
            <div class="row mt-1">
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Níveis Obtidos: &ensp;<span style="font-weight: normal">N N N R</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Pontos na Entrada: &ensp;<span style="font-weight: normal">1050</span></h5>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <h5 style="font-weight: 600;">Zona: &ensp;<span style="font-weight: normal">C MAX X</span></h5>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /Card Informações dos Robôs-->


      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

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
</body>
</html>
