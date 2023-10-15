let dat;



let dataTable;
let dataTableIsInitialized = false;
const dataTableOptions={
    pageLength: 5,
    destroy: true,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningún usuario encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningún usuario encontrado",
        infoFiltered: "(filtrados desde _MAX_ registros totales)",
        search: "Buscar:",
        loadingRecords: "Cargando...",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
        }
    }


};


const initDataTable = (dat) => {
    if (dataTableIsInitialized) {
        dataTable.destroy();
    }

    $.ajax({
        url: '../controllers/table.php',
        method: 'GET',
        data: {
            accion: 'imp_tabla',
            users: JSON.parse(dat),
        },
        success: function(response) {
            tableBody_Users.innerHTML = response;
            dataTable = $("#datatable_users").DataTable(dataTableOptions);
            dataTableIsInitialized = true;


        },
        error: function() {
            $('#respuesta').html('Error al obtener empleados.');
        }
    });
};



$(document).ready(function() {
    $.ajax({
        url: '../controllers/get_employees.php',
        method: 'GET',
        data: {
            accion: 'obtener_empleados'
        },
        success: function(data) {
            initDataTable(data);
        },
        error: function() {
            $('#respuesta').html('Error al obtener empleados.');
        }
    });

    $('.logout').submit( function (e) {
        
        e.preventDefault();
        Swal.fire({
          title: '¿Estás seguro de que deseas salir?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmar'
        }).then((result) => {
          if (result.isConfirmed) {
            this.submit();
          }
        })
      }) ;

      $('#datatable_users').on('click', '.eliminar', function() {
        var fila = $(this).closest('tr');
        var id = fila.data('id');

        fila.remove();

        $.ajax({
          url: '../controllers/eliminar.php',
          method: 'POST',
          data: {
              id: id
          },
          success: function() {
            console.log("si se pudo");
          },
          error: function() {
              console.log("no se pudo");
          }
      });
      }) ;

      

    });

