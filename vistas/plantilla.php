<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Proyecto</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
</head>
<?php
    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok")
    {
  
    include_once"modulos/navbar.php";
  ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    include_once "modulos/menu.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <?php
    if(isset($_GET["ruta"])){
      if($_GET["ruta"]== "inicio"||
        $_GET["ruta"]== "usuarios"||
        $_GET["ruta"]== "categorias"||
        $_GET["ruta"]== "productos"||
        $_GET["ruta"]== "clientes"||
        $_GET["ruta"]== "ventas"||
        $_GET["ruta"]== "crear-venta"||
        $_GET["ruta"]== "reportes"){
        include_once "modulos/".$_GET["ruta"].".php";
      }else{
        include_once "modulos/404.php";
      }

    }else{
      include_once "modulos/inicio.php";
    }
  ?>
  
  <?php
    include_once "modulos/inicio.php";

  
  ?>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
  <?php
    }else
    {
      include "modulos/login.php";
    }
  ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="vistas/dist/js/demou.js"></script>
</body>
</html>
