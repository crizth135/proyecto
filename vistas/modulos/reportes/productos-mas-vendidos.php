<?php

$item = null;
$valor = null;
$orden = "ventas";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

$colores = array("red","green","yellow","aqua","purple","blue","cyan","magenta","orange","gold");

$totalVentas = ControladorProductos::ctrMostrarSumaVentas();


?>
<!--=====================================
PRODUCTOS MÁS VENDIDOS
======================================-->

<div class="box box-default">
	
	<div class="box-header with-border">
  
      <h3 class="box-title">Productos más vendidos</h3>

    </div>

	<div class="box-body">
    
      	<div class="row">

	        <div class="col-md-7">
          <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 360px;" width="360" height="250" class="chartjs-render-monitor"></canvas>
              </div>
              <!-- /.card-body -->
            </div>

	 			<div class="chart-responsive">
	            
	            	<canvas id="donutCharty" height="150"></canvas>
	          
	          	</div>

	        </div>

		    <div class="col-md-5">
		      	
		  	 	<ul class="chart-legend clearfix">

		  	 	<?php

					for($i = 0; $i < 10; $i++){

					echo ' <li><i class="fa fa-circle-o text-'.$colores[$i].'"></i> '.$productos[$i]["descripcion"].'</li>';

					}


		  	 	?>


		  	 	</ul>

		    </div>

		</div>

    </div>

    <div class="box-footer no-padding">
    	
		<ul class="nav nav-pills nav-stacked">
			
			 <?php

          	for($i = 0; $i <5; $i++){
			
          		echo '<li>
						 
						 <a>

						 <img src="'.$productos[$i]["imagen"].'" class="img-thumbnail" width="60px" style="margin-right:10px"> 
						 '.$productos[$i]["descripcion"].'

						 <span class="pull-right text-'.$colores[$i].'">   
						 '.ceil($productos[$i]["ventas"]*100/$totalVentas["total"]).'%
						 </span>
							
						 </a>

      				</li>';

			}

			?>


		</ul>

    </div>

</div>

<?php

for($i = 0; $i < 10; $i++){

  echo"'".$productos[$i]["descripcion"]."',";

}
  
 ?>

<script>
  $(function () {
   //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
        <?php

for($i = 0; $i < 5; $i++){

  echo"'".$productos[$i]["descripcion"]."',";

}
  
 ?>
      ],
      datasets: [
        {
          data: [<?php

for($i = 0; $i < 5; $i++){

  echo"'".$productos[$i]["ventas"]."',";

}
  
 ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })


  })
</script>