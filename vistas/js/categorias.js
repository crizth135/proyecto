/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".btnEditarCategoria").click(function(){
	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({
		url: "ajax/categorias.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarCategoria").val(respuesta["categoria"]);
     		$("#idCategoria").val(respuesta["id"]);

     	}

	})


})
/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function(){
	 var idCategoria = $(this).attr("idCategoria");

	 Swal.fire({
	 	title: '¿Está seguro de borrar la categoría?',
	 	showDenyButton: true,
		confirmButtonText: 'Confirmar',
		denyButtonText: `Denegar`,
	}).then((result) => {
		if(result.value){

	 		window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;

		}
		else if (result.isDenied) {
		  Swal.fire('No se guardaron los cambios', '', 'info')
		}
	})

	 
})
$("#tCategorias").DataTable({
	"responsive": true, "lengthChange": false, "autoWidth": false,
	"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#tCategorias_wrapper .col-md-6:eq(0)');



