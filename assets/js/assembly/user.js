$(document).ready(function() {
	var dataSel ="";

   var table= $('#usersTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "/user/list_users",
        "columns": [
            { "data": "name" },
            { "data": "email" },
            { "data": "deparment" }
        ],
        "stripeClasses": [ 'odd-row', 'even-row' ],
        "language": {
			    "sProcessing":     "Procesando...",
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			    "sZeroRecords":    "No se encontraron resultados",
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			    "sInfoPostFix":    "",
			    "sSearch":         "Buscar:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    },
			    "oAria": {
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			    }
			}
    } );

    $('#usersTable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            dataSel= table.row( this ).data();
            console.log(dataSel);
            $("#editBtn").removeClass("disabled");
            $("#delBtn").removeClass("disabled");
            $("#editBtn").addClass("md-btn-warning md-btn-wave-light");
            $("#delBtn").addClass("md-btn-danger md-btn-wave-light");
        }
    } );

    $("#editBtn").click(function (){

    	window.location.href = "/user/edit?code="+dataSel.user_id;
    });
} );