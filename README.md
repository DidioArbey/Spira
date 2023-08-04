# Proyecto de Aplicación con Laravel: Sistema de Gestión de Usuarios y Cursos

## Análisis del problema

Se necesita desarrollar una aplicación que permita a los usuarios autenticados acceder a diferentes funcionalidades según su perfil. La aplicación debe tener tres perfiles de usuario: administrador, alumno y usuario regular. Los administradores pueden crear usuarios, asignar cursos a un usuario y ver el listado de usuarios con sus respectivos cursos. Los alumnos solo pueden ver el listado de cursos asignados.

## Posible solución

Para resolver el problema, podemos seguir los siguientes pasos:

1. Implementar un sistema de autenticación con email y contraseña utilizando el paquete de autenticación de Laravel y jwt.

2. Crear diferentes roles de usuario en la base de datos para administrador y alumno.

3. Implementar una interfaz de administrador donde se muestre el listado de usuarios y cursos, y permita crear nuevos usuarios y asignar cursos a usuarios existentes.

4. Implementar una interfaz de alumno donde se muestre el listado de cursos asignados al usuario autenticado.

5. Realizar un login con email y contraseña que permita al usuario visualizar las funcionalidades permitidas según el perfil:

    - Utilizar el paquete de autenticación de Laravel para gestionar el inicio de sesión con email y contraseña como JWT.
    - Al autenticar con éxito, almacenar el token de acceso en el almacenamiento local.
    - Utilizar el token de acceso en las peticiones posteriores para acceder a las funcionalidades permitidas según el perfil del usuario.

6. Realizar un CRUD de Alumnos:

    - Crear una tabla alumnos en la base de datos para almacenar la información de los alumnos.
    - Implementar las rutas y controladores necesarios en Laravel para el CRUD de alumnos.
    - Crear formularios para ingresar y editar la información de los alumnos.
    - Realizar operaciones CRUD en la tabla de alumnos.

7. Realizar CRUD de Cursos:

    - Crear una tabla cursos en la base de datos para almacenar la información de los cursos.
    - Implementar las rutas y controladores necesarios en Laravel para el CRUD de cursos.
    - Crear formularios para ingresar y editar la información de los cursos.

## Requisitos del sistema

- PHP >= 8.1
- Composer
- Laravel >= 10
- Paquete de autenticación de Laravel y JWT

