$(document).ready(function() {
	var dataSel ="";

   var table= $('#usersTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "/user/list_users",
        "columns": [
            { "data": "name" },
            { "data": "email" }
        ]

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