<?php
require_once 'layout/Layout.php';


session_start();
if (isset($_GET["usuario"])) {
  $_SESSION['usuario'] = $_GET["usuario"];
  $_SESSION['id'] = $_GET["id"];
}
ob_start();
$layout = new Layout(false);
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>SADVO</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">
  <?php $layout->printLink() ?>
  <!-- Custom fonts for this template-->
  <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="template/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body>
  <main id="page-top">
    <div id="wrapper">

      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
          SADVO</a>

        <?php if ($_SESSION['usuario'] == "Administrador") : ?>

          <hr class="sidebar-divider my-0">

          <li class="nav-item">
            <a class="nav-link" href="index.php?clase=eleccion&funcion=inicio">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Elecciones</span></a>
          </li>

          <hr class="sidebar-divider">

          <li class="nav-item">
            <a class="nav-link" href="index.php?clase=ciudadano&funcion=inicio">
              <i class="fas fa-fw fa-table"></i>
              <span>Ciudadanos</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="index.php?clase=candidato&funcion=inicio">
              <i class="fas fa-fw fa-cog"></i>
              <span>Candidatos</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="index.php?clase=partido&funcion=inicio">
              <i class="fas fa-fw fa-wrench"></i>
              <span>Partidos</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="index.php?clase=puesto&funcion=inicio">
              <i class="fas fa-fw fa-folder"></i>
              <span>Puesto electivo</span>
            </a>
          </li>
          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
        <?php endif ?>

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto d-flex justify-content-between align-items-center">

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php
                    if (isset($_SESSION['usuario'])) {
                      echo $_SESSION['usuario'];
                    }
                    ?>
                  </span>
                  <img class="img-profile rounded-circle" src="template\img\profile.png">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Salir
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Contenido de las vistas  -->
            <?php require_once("core/router.php") ?>

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Proyecto final 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Estas seguro?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="index.php?clase=usuario&funcion=cerrar_sesion">Cerrar sesion</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="template/js/demo/chart-area-demo.js"></script>
    <script src="template/js/demo/chart-pie-demo.js"></script>

  </main>
  <?php $layout->printScript() ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>

</html>
<?php
ob_end_flush();
?>
