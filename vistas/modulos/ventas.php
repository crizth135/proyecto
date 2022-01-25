<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar Ventas</h1>
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
        <div class="col-12">
          <div class="box-header with-border">
            <a href="crear-venta">
              <button class="btn btn-primary">
                
                Agregar venta

              </button>
            </a>
            <br/>
            <br/>
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title ">Tabla de ventas</h3>
              <button type="button" class="btn btn-info float-right" id="daterange-btn">
           
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
        
            </div>
            <div class="card-body">
             

              <table  id="tUsuarios" class="table table-bordered table-striped tablas">
                <thead>
                <tr>
           
                  <th style="width:10px">#</th>
                  <th>Código factura</th>
                  <th>Cliente</th>
                  <th>Vendedor</th>
                  <th>Neto</th>
                  <th>Total</th> 
                  <th>Fecha</th>
                  <th>Acciones</th>

                </tr>  
            
                </thead>
            
                <tbody>
                <?php

                    if(isset($_GET["fechaInicial"])){

                      $fechaInicial = $_GET["fechaInicial"];
                      $fechaFinal = $_GET["fechaFinal"];

                    }else{

                      $fechaInicial = null;
                      $fechaFinal = null;

                    }

                    $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

                    foreach ($respuesta as $key => $value) {

                  echo '<tr>

                          <td>'.($key+1).'</td>

                          <td>'.$value["codigo"].'</td>';

                          $itemCliente = "id";
                          $valorCliente = $value["id_cliente"];

                          $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                          echo '<td>'.$respuestaCliente["nombre"].'</td>';

                          $itemUsuario = "id";
                          $valorUsuario = $value["id_vendedor"];

                          $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                          echo '<td>'.$respuestaUsuario["nombre"].'</td>


                          <td>$ '.number_format($value["neto"],2).'</td>

                          <td>$ '.number_format($value["total"],2).'</td>

                          <td>'.$value["fecha"].'</td>

                          <td>

                            <div class="btn-group">
                                
                              <button class="btn btn-info"><i class="fa fa-print"></i></button>

                              <button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                              <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>

                            </div>  

                          </td>

                        </tr>';
                    }

                  ?>
                
                
              
                </tbody>
              </table>
              <?php

                $eliminarVenta = new ControladorVentas();
                $eliminarVenta -> ctrEliminarVenta();

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>   

    </section>
    <!-- /.content -->
  </div>