let dat;


let dataTable;
let dataTableIsInitialized = false;
const dataTableOptions={
    pageLength: 3,
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


const initDataTable = async (dat) => {
    if (dataTableIsInitialized) {
        dataTable.destroy();
    }

    $.ajax({
        url: '../sistema/table.php',
        method: 'GET',
        async: true,
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
        url: '../sistema/get_employees.php',
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
});

