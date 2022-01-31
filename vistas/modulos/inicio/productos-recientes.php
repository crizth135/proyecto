<?php

$item = null;
$valor = null;
$orden = "id";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

 ?>

<div class="card card-warning">
    <div class="card-header border-0">
    <h3 class="card-title">Productos Recientes</h3>
    </div>
    <div class="card-body table-responsive p-0">
    <table class="table ">
        <thead>
        <tr>
        <th></th>
        <th></th>
        <th></th>
        
        </tr>
        </thead>
        <tbody>
        
        
        <?php

            for($i = 0; $i < 10; $i++){

            echo '<tr>

                <td>

                <img src="'.$productos[$i]["imagen"].'" alt="Product Image" width="40px">

                </td>

                <td>

             

                    '.$productos[$i]["descripcion"].'

            

                </td>
                <td>

               

            

                    S/.'.$productos[$i]["precio_venta"].'

          

                </td>
                </tr>

           ';

            }

            ?>
       
    
        
        
        </tbody>
    </table>
    </div>
</div>