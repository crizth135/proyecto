<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Página de inicio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php


      include "inicio/cajas-superiores.php";
    

    ?>

      <div class="row">
      <div class="col-lg-12">

      <?php

      include "reportes/grafico-ventas.php";



      ?>

      </div>
      </div>
      <div class="row">
      <div class="col-lg-6">

        <?php

       

        include "reportes/productos-mas-vendidos.php";

        

        ?>

      </div>
      <div class="col-lg-6">

        <?php

       

        include "inicio/productos-recientes.php";

        

        ?>

      </div>

    
      </div>
      

    </section>
    <!-- /.content -->
  </div>