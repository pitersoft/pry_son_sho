<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="Bootstrap-4-4.1.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="DataTables-1.10.24/css/dataTables.bootstrap4.min.css"/>
	 
	<script type="text/javascript" src="jQuery-3.3.1/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="Bootstrap-4-4.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="DataTables-1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
</head>
<body class="" style="width: 100%;">
	<div class="bg-ligth" style="width: 100%;">
		<?php
		    include 'conexion.php';
		?>
		<div class="row justify-content-center" style="width: 100%;">
			<div class=" bg-light rounded my-2 mx-2 ml-1" style="width: 98%;padding: 20px 0px 20px 30px;">
				<h4 class="text-center text-dark pt-2">Personas</h4>
			    <div style="width: 100%;">
				<!-- Button trigger modal -->
				<div style="width: 100%;display: flex;flex-direction: row;justify-content: space-around;"> 	
					<form method="POST" style="width: 70%;display: flex;flex-direction: row;justify-content: space-around;" action="visitas/reporte.php">
					<label style="width: 110px;padding-top: 10px;" class="form-label" for="">Fecha Inicio</label>
					<input style="width: 170px;" type="date" name="filtroing" class="form-control me-3">
					<label style="width: 110px;padding-top: 10px;" class="form-label" for="">Fecha Final</label>
					<input style="width: 170px;" type="date" name="filtrosal" class="form-control me-5">
					<input style="width: 150px;" type="submit" class="btn btn-dark" data-bs-toggle="modal" name="exportf" data-bs-target="#exampleModal" value="Exportar PDF">
				    </form>
					<button style="width: 120px;" type="button" class="btn btn-success col-1 me-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
				       Nuevo
				    </button>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-xl">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Reporte</h5>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      <div class="modal-body">
				      	<?php
							
							if(isset($_POST['exportf'])){
								$fhing = $_POST['filtroing']." 00:00:00";
								$fhsal = $_POST['filtrosal']." 23:59:59";
								echo "Inicio: ".$fhing." - Fin : ".$fhsal."<br><br><br>";
							}  
						?>
				       <iframe style="width: 100%;height: 1000px;border-style: none;" src="visitas/reporte.php"></iframe>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				        <button type="button" class="btn btn-primary">Descargar</button>
				      </div>
				    </div>
				  </div>
				</div>
			</div>

			      <!-- Nuevo Usuaario -->
			      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			        <div class="modal-dialog">
			          <div class="modal-content">
			            <div class="modal-header">
			              <h5 class="modal-title" id="exampleModalLabel">Nueva Visita</h5>
			              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			            </div>
			            <form action="agregarusuario.php" method="POST">
			              <div class="modal-body">
			                <div class="mb-3 form-check">
			                  <label for="exampleInputNombres" class="form-label">Nombres y Apellidos</label>
			                  <input class="form-control" name="personanombre" id="exampleInputNombres" list="nombrespersonas">
			                  <datalist id="nombrespersonas">
			                  	<?php
									require 'conexion.php';
									$sqlnom="SELECT * FROM visitas INNER JOIN personas ON visitas.idpersona = personas.idpersona";
									$resnom=$con->query($sqlnom);
									while($rownom=$resnom->fetch_assoc()){ 
								?>
								<option value="<?php echo $rownom['idpersona']; ?>"><?php echo $rownom['nombres']." ".$rownom['apellido_pat']." ".$rownom['apellido_mat']; ?></option>
								<?php
									}  
								?>
			                  </datalist>
			                </div>
			                <div class="mb-3 form-check">
			                  <label for="exampleInputFechaing" class="form-label">Fecha Ingreso</label>
			                  <input type="datetime-local" class="form-control" name="nfechaing" id="exampleInputFechaing">
			                </div>
			                <div class="mb-3 form-check">
			                  <label for="exampleInputFechasal" class="form-label">Fecha Salida</label>
			                  <input type="datetime-local" class="form-control" name="nfechasal" id="exampleInputFechasal">
			                </div>
			              </div>
			              <div class="modal-footer">
			                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
			                <input type="submit" name="nuevo" class="btn btn-success" value="Agregar">
			              </div>
			            </form>
			          </div>
			        </div>
			      </div>
				<hr>
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">CÓDIGO DE VISITA</th>
				            <th scope="col">NOMBRES Y APELLIDOS</th>
				            <th scope="col">FECHA DE INGRESO</th>
				            <th scope="col">FECHA DE SALIDA</th>				            
				            <th scope="col">MANTENIMIENTOS</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require 'conexion.php';
							$sqlbq="SELECT * FROM visitas INNER JOIN personas ON visitas.idpersona = personas.idpersona";
							$res=$con->query($sqlbq);
							while($row=$res->fetch_assoc()){ 
						?>
						<tr>
							<th scope="row"><?php echo $row['codigo_visita']; ?></th>
				            <td><?php echo $row['nombres']." ".$row['apellido_pat']." ".$row['apellido_mat']; ?></td>
				            <td><?php echo $row['fh_ingreso']; ?></td>
				            <td><?php echo $row['fh_salida']; ?></td>
				            <td>
				              <a href="modificarusuario.php?id=<?php echo $row['codigo_visita']; ?>" class="btn btn-warning">
				                Editar
				              </a>
				              <a href="eliminarusuario.php?id=<?php echo $row['codigo_visita']; ?>" class="btn btn-danger">
				                Eliminar
				              </a>
				            </td>  
						</tr>
						<?php
							}  
						?>
					</tbody>	
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('table').DataTable({
				"language": idioma_espanol
			});
		})
		var idioma_espanol ={
		    "processing": "Procesando...",
		    "lengthMenu": "Mostrar _MENU_ registros",
		    "zeroRecords": "No se encontraron resultados",
		    "emptyTable": "Ningún dato disponible en esta tabla",
		    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
		    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
		    "search": "Buscar:",
		    "infoThousands": ",",
		    "loadingRecords": "Cargando...",
		    "paginate": {
		        "first": "Primero",
		        "last": "Último",
		        "next": "Siguiente",
		        "previous": "Anterior"
		    },
		    "aria": {
		        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
		        "sortDescending": ": Activar para ordenar la columna de manera descendente"
		    },
		    "buttons": {
		        "copy": "Copiar",
		        "colvis": "Visibilidad",
		        "collection": "Colección",
		        "colvisRestore": "Restaurar visibilidad",
		        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
		        "copySuccess": {
		            "1": "Copiada 1 fila al portapapeles",
		            "_": "Copiadas %d fila al portapapeles"
		        },
		        "copyTitle": "Copiar al portapapeles",
		        "csv": "CSV",
		        "excel": "Excel",
		        "pageLength": {
		            "-1": "Mostrar todas las filas",
		            "1": "Mostrar 1 fila",
		            "_": "Mostrar %d filas"
		        },
		        "pdf": "PDF",
		        "print": "Imprimir"
		    },
		    "autoFill": {
		        "cancel": "Cancelar",
		        "fill": "Rellene todas las celdas con <i>%d<\/i>",
		        "fillHorizontal": "Rellenar celdas horizontalmente",
		        "fillVertical": "Rellenar celdas verticalmentemente"
		    },
		    "decimal": ",",
		    "searchBuilder": {
		        "add": "Añadir condición",
		        "button": {
		            "0": "Constructor de búsqueda",
		            "_": "Constructor de búsqueda (%d)"
		        },
		        "clearAll": "Borrar todo",
		        "condition": "Condición",
		        "conditions": {
		            "date": {
		                "after": "Despues",
		                "before": "Antes",
		                "between": "Entre",
		                "empty": "Vacío",
		                "equals": "Igual a",
		                "notBetween": "No entre",
		                "notEmpty": "No Vacio",
		                "not": "Diferente de"
		            },
		            "number": {
		                "between": "Entre",
		                "empty": "Vacio",
		                "equals": "Igual a",
		                "gt": "Mayor a",
		                "gte": "Mayor o igual a",
		                "lt": "Menor que",
		                "lte": "Menor o igual que",
		                "notBetween": "No entre",
		                "notEmpty": "No vacío",
		                "not": "Diferente de"
		            },
		            "string": {
		                "contains": "Contiene",
		                "empty": "Vacío",
		                "endsWith": "Termina en",
		                "equals": "Igual a",
		                "notEmpty": "No Vacio",
		                "startsWith": "Empieza con",
		                "not": "Diferente de"
		            },
		            "array": {
		                "not": "Diferente de",
		                "equals": "Igual",
		                "empty": "Vacío",
		                "contains": "Contiene",
		                "notEmpty": "No Vacío",
		                "without": "Sin"
		            }
		        },
		        "data": "Data",
		        "deleteTitle": "Eliminar regla de filtrado",
		        "leftTitle": "Criterios anulados",
		        "logicAnd": "Y",
		        "logicOr": "O",
		        "rightTitle": "Criterios de sangría",
		        "title": {
		            "0": "Constructor de búsqueda",
		            "_": "Constructor de búsqueda (%d)"
		        },
		        "value": "Valor"
		    },
		    "searchPanes": {
		        "clearMessage": "Borrar todo",
		        "collapse": {
		            "0": "Paneles de búsqueda",
		            "_": "Paneles de búsqueda (%d)"
		        },
		        "count": "{total}",
		        "countFiltered": "{shown} ({total})",
		        "emptyPanes": "Sin paneles de búsqueda",
		        "loadMessage": "Cargando paneles de búsqueda",
		        "title": "Filtros Activos - %d"
		    },
		    "select": {
		        "1": "%d fila seleccionada",
		        "_": "%d filas seleccionadas",
		        "cells": {
		            "1": "1 celda seleccionada",
		            "_": "$d celdas seleccionadas"
		        },
		        "columns": {
		            "1": "1 columna seleccionada",
		            "_": "%d columnas seleccionadas"
		        }
		    },
		    "thousands": ".",
		    "datetime": {
		        "previous": "Anterior",
		        "next": "Proximo",
		        "hours": "Horas",
		        "minutes": "Minutos",
		        "seconds": "Segundos",
		        "unknown": "-",
		        "amPm": [
		            "am",
		            "pm"
		        ]
		    },
		    "editor": {
		        "close": "Cerrar",
		        "create": {
		            "button": "Nuevo",
		            "title": "Crear Nuevo Registro",
		            "submit": "Crear"
		        },
		        "edit": {
		            "button": "Editar",
		            "title": "Editar Registro",
		            "submit": "Actualizar"
		        },
		        "remove": {
		            "button": "Eliminar",
		            "title": "Eliminar Registro",
		            "submit": "Eliminar",
		            "confirm": {
		                "_": "¿Está seguro que desea eliminar %d filas?",
		                "1": "¿Está seguro que desea eliminar 1 fila?"
		            }
		        },
		        "error": {
		            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
		        },
		        "multi": {
		            "title": "Múltiples Valores",
		            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
		            "restore": "Deshacer Cambios",
		            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
		        }
		    },
		    "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
		}  
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>