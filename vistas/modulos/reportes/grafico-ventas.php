<?php

error_reporting(0);

if(isset($_GET["fechaInicial"])){

    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];

}else{

$fechaInicial = null;
$fechaFinal = null;

}

$respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

$arrayFechas = array();
$arrayVentas = array();
$sumaPagosMes = array();

foreach ($respuesta as $key => $value) {

	#Capturamos sólo el año y el mes
	$fecha = substr($value["fecha"],0,7);

	#Introducir las fechas en arrayFechas
	array_push($arrayFechas, $fecha);
	#Capturamos las ventas
	$arrayVentas = array($fecha => $value["total"]);
	#Sumamos los pagos que ocurrieron el mismo mes
	foreach ($arrayVentas as $key => $value) {
		
		$sumaPagosMes[$key] += $value;
  
	}
  

}

$noRepetirFechas = array_unique($arrayFechas); 
//var_dump($noRepetirFechas);

?>
<div class="card">
  <div class="card-header">
    
    <h3 class="card-title float-right">Tabla de ventas</h3>
  </div>
  
  <div class="card-body">
  <div class="card bg-gradient-info">
    <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
      <h3 class="card-title">
        <i class="fas fa-th mr-1"></i>
        Gráfico de ventas
      </h3>

      <div class="card-tools">
        <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <canvas class="chart chartjs-render-monitor" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;" width="375" height="250"></canvas>
    </div>
  </div>
  </div>

</div>

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

          </div>
          <div class="col-md-12">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;" width="366" height="250" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    var areaChartData = {
      labels  : [<?php
 
 if($noRepetirFechas != null){

  foreach($noRepetirFechas as $key){

    $oo=$key; 
    echo "'".$oo."'," ;


  }


}else{

   echo "{ y: '0', ventas: '0' }";

}


?>],
      datasets: [
        {
          label              : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [ <?php

if($noRepetirFechas != null){

  foreach($noRepetirFechas as $key){

    echo $sumaPagosMes[$key].","; 


  }

  echo $sumaPagosMes[$key];

}else{

   echo "{ y: '0', ventas: '0' }";

}

?>]
        },
       
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })



    
    // Sales graph chart
var salesGraphChartCanvas = $("#line-chart").get(0).getContext("2d");
// $('#revenue-chart').get(0).getContext('2d');

var salesGraphChartData = {
  datasets: [
        {
            label: "Digital Goods",
            fill: false,
            borderWidth: 2,
            lineTension: 0,
            spanGaps: true,
            borderColor: "#efefef",
            pointRadius: 3,
            pointHoverRadius: 7,
            pointColor: "#efefef",
            pointBackgroundColor: "#efefef",
            data: [
              
              <?php

if($noRepetirFechas != null){

  foreach($noRepetirFechas as $key){

    echo $sumaPagosMes[$key].","; 


  }

}else{

   echo "{ y: '0', ventas: '0' }";

}

?>
            ],
        },
    ],
    labels: [
      <?php
 
 if($noRepetirFechas != null){

  foreach($noRepetirFechas as $key){

    $oo=$key; 
    echo "'".$oo."'," ;


  }


}else{

   echo "{ y: '0', ventas: '0' }";

}

?>
    ],
    
};

var salesGraphChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
        display: false,
    },
    scales: {
        xAxes: [
            {
                ticks: {
                    fontColor: "#efefef",
                },
                gridLines: {
                    display: false,
                    color: "#efefef",
                    drawBorder: false,
                },
            },
        ],
        yAxes: [
            {
                ticks: {
                    stepSize: 5000,
                    fontColor: "#efefef",
                },
                gridLines: {
                    display: true,
                    color: "#efefef",
                    drawBorder: false,
                },
            },
        ],
    },
};

// This will get the first returned node in the jQuery collection.
// eslint-disable-next-line no-unused-vars
var salesGraphChart = new Chart(salesGraphChartCanvas, {
    // lgtm[js/unused-local-variable]
    type: "line",
    data: salesGraphChartData,
    options: salesGraphChartOptions,
});



  })
</script>

