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

    await listUsers(dat);

    dataTable = $("#datatable_users").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
};

const listUsers = async(dat)=>{
    try {
        /*const response =await fetch('data.json');*/
        let users = JSON.parse(dat);

        let content=``;
        users.forEach((user, index)=>{
            content +=`
            <tr>
                <td>${index + 1}</td>
                <td>${user.rfc}</td>
                <td>${user.nombre}</td>
                <td>${user.ap_p}</td>
                <td>${user.salario}</td>
              
               
            </tr>`
        });

        tableBody_Users.innerHTML=content;
        console.log(content);
    } catch (ex) {
        console.log(ex);
        alert(ex);

        
    }
};



$(document).ready(function() {
    $.ajax({
        url: 'func.php',
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



/*
window.addEventListener("DOMContentLoaded", async () => {
    await initDataTable();
});*/