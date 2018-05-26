<?php include'autoload.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<title>Lista de Usuarios</title>

<!-- JS -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-md-12">
	


	
<h1>Lista de Usuarios</h1>

<div class="table-responsive">
<table  id="consulta" class="table"  >

<thead>
<tr>
<th>Id</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Dni</th>
<th>User</th>
<th>Pass</th>
<th>Estado</th>
<th>Fecha de Creación</th>
</tr>
</thead>

<tfoot>
<tr>
<th>Id</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Dni</th>
<th>User</th>
<th>Pass</th>
<th>Estado</th>
<th>Fecha de Creación</th>
</tr>
</tfoot>



<tbody>

<?php 
$usuario =  new Usuario();
foreach ($usuario->lista() as $key => $value): ?>
	
<tr>
<td><?php echo $value['id']; ?></td>
<td><?php echo $value['nombres']; ?></td>
<td><?php echo $value['apellidos']; ?></td>
<td><?php echo $value['dni']; ?></td>
<td><?php echo $value['user']; ?></td>
<td><?php echo $value['pass']; ?></td>
<td><?php echo $value['estado']; ?></td>
<td><?php echo $value['fecha_creacion']; ?></td>
</tr>

<?php endforeach ?>


</tbody>


</table>


<script>
$(document).ready(function() {
    $('#consulta').DataTable( {
        "language":{
         
        "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"

        },
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select class="form-control" ><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>

</div>
</div>
</div>
</body>
</html>