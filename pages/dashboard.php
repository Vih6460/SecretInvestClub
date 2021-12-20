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
      <li class="nav-item">
        <a class="nav-link" role="button" data-toggle="modal" data-target="#modal-filtro"><i class="fas fa-filter"></i></a>
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
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-2 col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info" style="background-color: #343a40!important; cursor: pointer;" data-toggle="modal" data-target="#modal-secondary">
              <div class="inner">
                <h3>Carlos</h3>
                <p class="mb-0">K9_WDO_3_1</p>
                <p class="mb-1">Acumulado = <span class="textoTeste textoLiberado">R$ 20.000,00</span></p>
                <p class="mb-1">Status = <span class="textoTeste textoLiberado">Posicionado</span></p>
                <p class="mb-1">Ativo = <span class="textoTeste textoLiberado">WDOF22</span></p>
                <p class="mb-1">Contratos = <span class="textoTeste textoLiberado">10</span></p>
                <p class="mb-1">PM = <span class="textoTeste textoLiberado">5756.5</span></p>
                <p class="mb-1">Gain = <span class="textoTeste textoLiberado">5760.5</span></p>
                <p class="mb-1">Loss = <span class="textoTeste textoLiberado">5751.5</span></p>
                <p class="mb-1">Nível = <span class="textoTeste textoLiberado">1</span></p>
                <p class="mb-1">Níveis Obtidos = <span class="textoTeste textoLiberado">N N R</span></p>
                <p class="mb-1">Pontos na Entrada = <span class="textoTeste textoLiberado">70</span></p>
                <p class="mb-1">Zona = <span class="textoTeste textoLiberado">C MAX X</span></p>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info" style="background-color: #343a40!important; cursor: pointer;" data-toggle="modal" data-target="#modal-secondary">
              <div class="inner">
                <h3>Vinicius</h3>
                <p class="mb-0">K9_WDO_3_1</p>
                <p class="mb-1">Acumulado = <span class="textoTeste textoLiberado">R$ 10.000,00</span></p>
                <p class="mb-1">Status = <span class="textoTeste textoLiberado">Não Posicionado</span></p>
                <p class="mb-1">Ativo = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Contratos = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">PM = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Gain = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Loss = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Nível = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Níveis Obtidos = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Pontos na Entrada = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Zona = <span class="textoTeste textoLiberado">---</span></p>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info" style="background-color: #ff0018bf!important; cursor: pointer;" data-toggle="modal" data-target="#modal-secondary">
              <div class="inner">
                <h3>Carlos</h3>
                <p class="mb-0">K9_WIN_3_1</p>
                <p class="mb-1">Acumulado = <span class="textoTeste textoLiberado">R$ 3.000,00</span></p>
                <p class="mb-1">Status = <span class="textoTeste textoLiberado">Posicionado</span></p>
                <p class="mb-1">Ativo = <span class="textoTeste textoLiberado">WING22</span></p>
                <p class="mb-1">Contratos = <span class="textoTeste textoLiberado">50</span></p>
                <p class="mb-1">PM = <span class="textoTeste textoLiberado">106200</span></p>
                <p class="mb-1">Gain = <span class="textoTeste textoLiberado">106000</span></p>
                <p class="mb-1">Loss = <span class="textoTeste textoLiberado">106400</span></p>
                <p class="mb-1">Nível = <span class="textoTeste textoLiberado">1</span></p>
                <p class="mb-1">Níveis Obtidos = <span class="textoTeste textoLiberado">N N R</span></p>
                <p class="mb-1">Pontos na Entrada = <span class="textoTeste textoLiberado">70</span></p>
                <p class="mb-1">Zona = <span class="textoTeste textoLiberado">C MIN Y</span></p>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info" style="background-color: green!important; cursor: pointer;" data-toggle="modal" data-target="#modal-secondary">
              <div class="inner">
                <h3>Feu</h3>
                <p class="mb-0">K9_WIN_3_1</p>
                <p class="mb-1">Acumulado = <span class="textoTeste textoLiberado">R$ 1.000,00</span></p>
                <p class="mb-1">Status = <span class="textoTeste textoLiberado">Não Posicionado</span></p>
                <p class="mb-1">Ativo = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Contratos = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">PM = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Gain = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Loss = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Nível = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Níveis Obtidos = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Pontos na Entrada = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Zona = <span class="textoTeste textoLiberado">---</span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-2 col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info" style="background-color: #ff0018bf!important; cursor: pointer;" data-toggle="modal" data-target="#modal-secondary">
              <div class="inner">
                <h3>Julio</h3>
                <p class="mb-0">K9_WIN_3_1</p>
                <p class="mb-1">Acumulado = <span class="textoTeste textoLiberado">R$ 3.000,00</span></p>
                <p class="mb-1">Status = <span class="textoTeste textoLiberado">Posicionado</span></p>
                <p class="mb-1">Ativo = <span class="textoTeste textoLiberado">WING22</span></p>
                <p class="mb-1">Contratos = <span class="textoTeste textoLiberado">50</span></p>
                <p class="mb-1">PM = <span class="textoTeste textoLiberado">106200</span></p>
                <p class="mb-1">Gain = <span class="textoTeste textoLiberado">106000</span></p>
                <p class="mb-1">Loss = <span class="textoTeste textoLiberado">106400</span></p>
                <p class="mb-1">Nível = <span class="textoTeste textoLiberado">1</span></p>
                <p class="mb-1">Níveis Obtidos = <span class="textoTeste textoLiberado">N N R</span></p>
                <p class="mb-1">Pontos na Entrada = <span class="textoTeste textoLiberado">70</span></p>
                <p class="mb-1">Zona = <span class="textoTeste textoLiberado">C MIN Y</span></p>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info" style="background-color: #343a40!important; cursor: pointer;" data-toggle="modal" data-target="#modal-secondary">
              <div class="inner">
                <h3>Bruno</h3>
                <p class="mb-0">K9_WDO_3_1</p>
                <p class="mb-1">Acumulado = <span class="textoTeste textoLiberado">R$ 20.000,00</span></p>
                <p class="mb-1">Status = <span class="textoTeste textoLiberado">Posicionado</span></p>
                <p class="mb-1">Ativo = <span class="textoTeste textoLiberado">WDOF22</span></p>
                <p class="mb-1">Contratos = <span class="textoTeste textoLiberado">10</span></p>
                <p class="mb-1">PM = <span class="textoTeste textoLiberado">5756.5</span></p>
                <p class="mb-1">Gain = <span class="textoTeste textoLiberado">5760.5</span></p>
                <p class="mb-1">Loss = <span class="textoTeste textoLiberado">5751.5</span></p>
                <p class="mb-1">Nível = <span class="textoTeste textoLiberado">1</span></p>
                <p class="mb-1">Níveis Obtidos = <span class="textoTeste textoLiberado">N N R</span></p>
                <p class="mb-1">Pontos na Entrada = <span class="textoTeste textoLiberado">70</span></p>
                <p class="mb-1">Zona = <span class="textoTeste textoLiberado">C MAX X</span></p>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info" style="background-color: green!important; cursor: pointer;" data-toggle="modal" data-target="#modal-secondary">
              <div class="inner">
                <h3>Marcelo</h3>
                <p class="mb-0">K9_WIN_3_1</p>
                <p class="mb-1">Acumulado = <span class="textoTeste textoLiberado">R$ 1.000,00</span></p>
                <p class="mb-1">Status = <span class="textoTeste textoLiberado">Não Posicionado</span></p>
                <p class="mb-1">Ativo = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Contratos = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">PM = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Gain = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Loss = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Nível = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Níveis Obtidos = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Pontos na Entrada = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Zona = <span class="textoTeste textoLiberado">---</span></p>
              </div>
            </div>
          </div>
          <div class="col-xl-2 col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info" style="background-color: #343a40!important; cursor: pointer;" data-toggle="modal" data-target="#modal-secondary">
              <div class="inner">
                <h3>Willian</h3>
                <p class="mb-0">K9_WDO_3_1</p>
                <p class="mb-1">Acumulado = <span class="textoTeste textoLiberado">R$ 10.000,00</span></p>
                <p class="mb-1">Status = <span class="textoTeste textoLiberado">Não Posicionado</span></p>
                <p class="mb-1">Ativo = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Contratos = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">PM = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Gain = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Loss = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Nível = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Níveis Obtidos = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Pontos na Entrada = <span class="textoTeste textoLiberado">---</span></p>
                <p class="mb-1">Zona = <span class="textoTeste textoLiberado">---</span></p>
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

  <div class="modal fade" id="modal-filtro">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-secondary">
        <div class="modal-header" style="border-color: black;">
          <h4 class="modal-title">Filtro de Dados</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- select -->
          <div class="form-group">
            <label>Valor Acumulado</label>
            <select class="form-control">
              <option>Diário</option>
              <option>Semanal</option>
              <option>Mensal</option>
              <option>Desde o Início</option>
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between" style="border-color: black;">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal" style="border-color: black;">Fechar</button>
          <button type="button" class="btn btn-outline-light" style="border-color: black;">Aplicar</button>
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
