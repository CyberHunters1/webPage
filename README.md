# Sistema de nómina 

Este sistema de nómina es para la clase de Seguridad Informática, enel cual se permite ver la nómina de los empleados, modificarla y eliminarla. Todo esto se basa en los permisos que tenga el usuario en sesión.


## Requerimientos:

- PHP ^8.0
- Composer *
- gRPC

## ¿En qué está montado? 

El proyecto está pensado para ser montado en un servidor Apache y en una distribución de Linux como lo es Ubuntu, además de que la base de datos usada es Firebase de Google. 

La aplicación también puede ser montada en servidores Windows, pero se deberá hacer la correcta instalación de los requerimientos, ya que en Windows puede ser un poco más complejo y existen incompatibilidades que pueden afectar al proyecto. Para evitar estas incompatibilidades, en la carpeta *public* se encuentra el archivo composer, el cual hará las instalaciones necesarias en las versiones compatibles tanto para distribuciones Linux como Windows.  