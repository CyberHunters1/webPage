let dat;
let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
  responsive: true,
  pageLength: 10,
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
    success: function (response) {
      tableBody_Users.innerHTML = response;
      setTimeout(() => {
        dataTable = $("#datatable_users").DataTable(dataTableOptions);
      }, 10);
      dataTableIsInitialized = true;



    },
    error: function () {
      $('#respuesta').html('Error al obtener empleados.');
    }
  });
};


const get_employees = () => {
  $.ajax({
    url: '../controllers/get_employees.php',
    method: 'GET',
    data: {
      accion: 'obtener_empleados'
    },
    success: function (data) {
      initDataTable(data);
    },
    error: function () {
      $('#respuesta').html('Error al obtener empleados.');
    }
  });
}


$(document).ready(function () {
  renderTable();
});


function renderTable() {
  console.log("render table");

  get_employees();

  $('.logout').submit(function (e) {

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
  });

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



  $('#datatable_users').on('click', '.editar', function (e) {

    var simbolo = 'error';
    var fila = $(this).closest('tr');
    var valoresTd = fila.find('td').map(function() {
        return $(this).text();
    }).get(); 


    Swal.fire({
      title: 'Ingresa los Datos Correspondientes',
      html: `
              <h4 class="text-uppercase"><em>Agregue los nuevos datos del usuario.</em></h4>
              <form id="Formulario_Agregar">
            <div class="row">
              <div class="col-md-6 col-12 padd-top-btm-10 ">
                <div class="Datos"><input class="form-control" type="text" value="${valoresTd[2]}" placeholder="Nombre" id="nombre" required></div>
              </div>
              <div class="col-md-6 col-12 padd-top-btm-10 ">
                <div class="Datos"><input class="form-control" type="text" value="${valoresTd[3]}" placeholder="Apellido Paterno" id="apellido_P" required></div>
              </div>
              <div class="col-md-6 col-12 padd-top-btm-10 ">
                <div class="Datos"><input class="form-control" type="text" value="${valoresTd[4]}" placeholder="Apellido Materno" id="apellido_M" required></div>
              </div>
              <div class="w-100 d-none d-md-block"></div>

              <div class="col-md-6 col-12 padd-top-btm-10 ">
                <div class="Datos"><input class="form-control" type="password" placeholder="Contraseña" id="password" required></div>
              </div>
              <div class="col-md-6 col-12 padd-top-btm-10 ">
                <div class="Datos"><input class="form-control" type="text" value="${valoresTd[1]}" placeholder="RFC" id="rfc" required></div>
              </div>
              <div class="col-md-6 col-12 padd-top-btm-10 ">
                <div class="Datos"><input class="form-control" type="number" placeholder="Rol" id="rol" required></div>
              </div>
              <div class="col-md-6 col-12 padd-top-btm-10 ">
                <div class="Datos"><input class="form-control" type="number" placeholder="Salario" id="salario" required></div>
              </div>

            </div>
            
            </form>
            `,
      width: '60%',
      background: '#FFFFFF',
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
              const mensaje = `Usuario agregado correctamente.`;
              $.ajax({
                url: '../controllers/alter_employees.php',
                method: 'POST',
                data: {
                  nombre: nombre,
                  ap_p: apellido_P,
                  ap_m: apellido_M,
                  password: password,
                  rfc: rfc,
                  rol: rol,
                  salario: salario,
                  token: token
                },
                success: function (data) {
                  console.log(data);
                  if(data==0){
                    resolve("RFC NO VALIDO");
                  }else{
                    simbolo='success'
                  get_employees();
                  resolve(mensaje);}
                },
                error: function () {
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
        console.log(simbolo);
        Swal.fire({
          title:'Mensaje Importante',
          text:result.value,
          icon: simbolo
      });
      }
    });
  });


}