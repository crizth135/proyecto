<?php
session_start();
?>

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

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- JQVMap -->
  <link rel="stylesheet" href="vistas/plugins/jqvmap/jqvmap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck-bootstrap/icheck-bootstrap.min.css">

  <!-- sweetalert2 -->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2/sweetalert2.min.css">
  
  <!-- chart -->
  <link rel="stylesheet" href="vistas/plugins/chart.js/Chart.min.css">
   <!-- summernote -->
   <link rel="stylesheet" href="vistas/plugins/summernote/summernote-bs4.min.css">
   <!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
<script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
   



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
        $_GET["ruta"]== "editar-venta"||
        $_GET["ruta"]== "salir"||
        $_GET["ruta"]== "reportes"){
        include_once "modulos/".$_GET["ruta"].".php";
      }else{
        include_once "modulos/404.php";
      }

    }else{
      include_once "modulos/inicio.php";
    }
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


 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="vistas/plugins/jszip/jszip.min.js"></script>
<script src="vistas/plugins/pdfmake/pdfmake.min.js"></script>
<script src="vistas/plugins/pdfmake/vfs_fonts.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="vistas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



<!-- ChartJS -->
<script src="vistas/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="vistas/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="vistas/plugins/jqvmap/jquery.vmap.js"></script>
<!-- jQuery Knob Chart -->
<script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="vistas/plugins/moment/moment.js"></script>
<script src="vistas/plugins/moment/moment-with-locales.js"></script>
<script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="vistas/plugins/summernote/summernote-bs4.min.js"></script> 
<!-- overlayScrollbars -->
<script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<script src="vistas/dist/js/pages/dashboard.js"></script>


  

   
     


  
<!-- AdminLTE for demo purposes -->

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/ventas.js"></script>
<script src="vistas/js/reportes.js"></script>


<!-- SweetAlert 2 -->

</body>
</html>
