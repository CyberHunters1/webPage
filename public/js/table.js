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
        url: '../controllers/get_table.php',
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


const get_employees = () =>{
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
}


$(document).ready(function() {
    
    get_employees();

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

      $('#datatable_users').on('click', '.eliminar', function (e) {
        var fila = $(this).closest('tr');
        var token = fila.data('id');
    
    
        e.preventDefault();
        Swal.fire({
          title: '¿Deseas eliminar este elemento?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmar'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '../controllers/delete_employees.php',
              method: 'POST',
              data: {
                token: token
              },
              success: function () {
                get_employees();
              },
              error: function () {
                console.log("No se eliminó adecuadamente");
              }
            });
          }
        })
      });

      $('#datatable_users').on('click', '.editar', function(e) {
        Swal.fire({
          title: 'Ingresa los Datos Correspondientes',
          html: `
            <h4><em>Agregue los nuevos datos del usuario.</em></h4>
            <form id="Formulario_Agregar">
            <div class="Datos"><input type="text" placeholder="Nombre" id="nombre" required></div>
            <div class="Datos"><input type="text" placeholder="Apellido Paterno" id="apellido_P" required></div>
            <div class="Datos"><input type="text" placeholder="Apellido Materno" id="apellido_M" required></div>
            <div class="Datos"><input type="text" placeholder="Contraseña" id="password" required></div>
            <div class="Datos"><input type="text" placeholder="RFC" id="rfc" required></div>
            <div class="Datos"><input type="number" placeholder="Rol" id="rol" required></div>
            <div class="Datos"><input type="number" placeholder="Salario" id="salario" required></div>
            </form>
          `,
          width: '60%',
          background:'#FFFFFF',
          showCancelButton: true,
          confirmButtonText: 'Modificar',
          customClass: {
            confirmButton: 'Modificar',
            title: 'titulo-personalizado'
          },
          showLoaderOnConfirm: true,
          preConfirm: () => {
            // Validación de campos
            const nombre = document.getElementById('nombre').value;
            const apellido_P = document.getElementById('apellido_P').value;
            const apellido_M = document.getElementById('apellido_M').value;
            const password = document.getElementById('password').value;
            const rfc = document.getElementById('rfc').value;
            const rol = document.getElementById('rol').value;
            const salario = document.getElementById('salario').value;
      
            if (
              !nombre ||
              !apellido_P ||
              !apellido_M ||
              !password ||
              !rfc ||
              !rol ||
              !salario
            ) {
              Swal.showValidationMessage('Todos los campos son obligatorios');
            } else {
              // Lógica para procesar los datos del formulario
              return new Promise((resolve) => {
                setTimeout(() => {
                  var fila = $(this).closest('tr');
                  var token = fila.data('id');
                  const mensaje = `Nombre: ${nombre}, Apellido Paterno: ${apellido_P}, Apellido Materno: ${apellido_M} ,Contraseña: ${password}, RFC: ${rfc}, Rol: ${rol}, Salario: ${salario}`;
                  $.ajax({
                    url: '../controllers/alter_employees.php',
                    method: 'POST',
                    data: {
                        nombre: nombre,
                        ap_p: apellido_P,
                        ap_m: apellido_M,
                        password: password,
                        rfc:rfc,
                        rol:rol,
                        salario:salario,
                        token:token
                    },
                    success: function() {
                      get_employees();
                      resolve(mensaje);
                    },
                    error: function() {
                        $('#respuesta').html('Error al obtener empleados.');
                    }
                });
                }, 1000);
              });
            }
          },
          allowOutsideClick: () => !Swal.isLoading(),
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Datos enviados',
              result.value, 
              'success'
            );
          }
        });
      }) ;

    });

