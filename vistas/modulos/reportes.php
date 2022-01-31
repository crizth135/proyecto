<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reporte de Ventas</h1>
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
      <div class="container-fluid">
        <div class="row">
        <button type="button" class="btn btn-default" id="daterange-btn2">
           
           <span>
             <i class="fa fa-calendar"></i> 

             <?php

               if(isset($_GET["fechaInicial"])){

                 echo $_GET["fechaInicial"]." - ".$_GET["fechaFinal"];
               
               }else{
                
                 echo 'Rango de fecha';

               }

             ?>
           </span>

           <i class="fa fa-caret-down"></i>

         </button>
          <div class="col-12">
          <?php

          include "reportes/grafico-ventas.php";

          ?>
          </div>
          <div class="col-md-6 col-xs-12">
             
            <?php

            include "reportes/productos-mas-vendidos.php";

            ?>

           </div>

            <div class="col-md-6 col-xs-12">
             
            <?php

              include "reportes/vendedores.php";

            ?>

           </div>

           <div class="col-md-6 col-xs-12">
             
            <?php

              include "reportes/compradores.php";

            ?>

           </div>

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>