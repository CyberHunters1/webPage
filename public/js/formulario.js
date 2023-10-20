document.getElementById('btn_agregar').addEventListener('click', function() {
    Swal.fire({
      title: 'Ingresa los Datos Correspondientes',
      html: `
        <h4><em>Favor llenar los datos requeridos para agregar un nuevo usuario.</em></h4>
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
      confirmButtonText: 'Agregar',
      customClass: {
        confirmButton: 'Agregar',
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
              // Mostrar los datos en un mensaje de éxito
              const mensaje = `Nombre: ${nombre}, Apellido Paterno: ${apellido_P}, Apellido Materno: ${apellido_M} ,Contraseña: ${password}, RFC: ${rfc}, Rol: ${rol}, Salario: ${salario}`;
              $.ajax({
                url: '../controllers/add_employees.php',
                method: 'POST',
                data: {
                    nombre: nombre,
                    ap_p: apellido_P,
                    ap_m: apellido_M,
                    password: password,
                    rfc:rfc,
                    rol:rol,
                    salario:salario
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
          result.value, // Muestra los datos del formulario en el mensaje
          'success'
        );
      }
    });
  });