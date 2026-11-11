
# Workshop 5 - CRUD de Productos

## Descripción

Aplicación web desarrollada con CodeIgniter 4 que permite
administrar productos mediante las operaciones CRUD.

## Tecnologías utilizadas

- PHP 8.2
- CodeIgniter 4
- MySQL
- XAMPP
- Bootstrap 5
- Git y GitHub

## Funcionalidades

- Crear productos.
- Mostrar productos registrados.
- Editar nombre y precio.
- Eliminar productos.

## Arquitectura MVC

Modelo: app/Models/ProductoModel.php

Controlador: app/Controllers/Productos.php

Vistas:
- app/Views/productos.php
- app/Views/editar_producto.php

## Instalación

1. Tener PHP, Composer y MySQL instalados.
2. Descargar o clonar el repositorio.
3. Entrar a la carpeta CRUD-Productos.
4. Ejecutar: composer install
5. Importar database.sql en phpMyAdmin.
6. Copiar el archivo env a .env.
7. Configurar la conexión MySQL en .env.
8. Ejecutar: php spark serve

## Acceso

http://localhost:8080/productos
