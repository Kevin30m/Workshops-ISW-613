
# Quiz 3 - Sistema de Matrícula

## Información general

- Universidad Técnica Nacional
- Sede: San Carlos
- Curso: Programación en Ambiente Web I
- Código: ISW-613
- Evaluación: Quiz 3

## Descripción

Sistema web desarrollado con Laravel utilizando la arquitectura MVC
(Modelo, Vista y Controlador), que permite administrar cursos y
realizar la matrícula de estudiantes.

## Tecnologías utilizadas

- Laravel 12
- PHP 8.2
- MySQL
- Blade
- Bootstrap 5
- Eloquent ORM
- Composer
- Git y GitHub
- PHPUnit

## Funcionalidades

### CRUD de cursos

- Crear cursos.
- Listar cursos registrados.
- Editar cursos.
- Eliminar cursos sin matrículas asociadas.
- Validar códigos de cursos duplicados.
- Validar la cantidad de créditos.
- Seleccionar carreras precargadas mediante seeders.

### Matrícula de estudiantes

- Formulario de matrícula como página principal.
- Registro del nombre e identificación del estudiante.
- Selección de cursos disponibles.
- Almacenamiento de matrículas en MySQL.
- Visualización de los datos registrados.
- Impresión del comprobante de matrícula.

## Requisitos

- PHP 8.2 o superior compatible con Laravel 12.
- Composer.
- MySQL o MariaDB.
- XAMPP o entorno equivalente.
- Git.
- Extensión PDO MySQL.
- Extensión PDO SQLite para las pruebas.
- Internet para cargar Bootstrap mediante CDN.

## Instalación y ejecución

### 1. Clonar el repositorio

```bash
git clone https://github.com/Kevin30m/Workshops-ISW-613.git
```

### 2. Entrar al proyecto

```bash
cd Workshops-ISW-613
cd "Quiz 3"
```

### 3. Instalar las dependencias

```bash
composer install
```

### 4. Crear el archivo de configuración

```bash
cp .env.example .env
```

### 5. Generar la clave de la aplicación

```bash
php artisan key:generate
```

### 6. Crear la base de datos

Iniciar MySQL y Apache desde XAMPP.

Ingresar a phpMyAdmin y ejecutar:

```sql
CREATE DATABASE IF NOT EXISTS quiz3_matricula
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

### 7. Configurar la conexión

Verificar los siguientes valores en el archivo .env:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quiz3_matricula
DB_USERNAME=root
DB_PASSWORD=
```

Ajustar las credenciales según el entorno local.

### 8. Ejecutar migraciones y seeders

```bash
php artisan config:clear
php artisan migrate --seed
```

Este comando crea las tablas e inserta cinco carreras
y seis cursos de ejemplo.

### 9. Iniciar el servidor

```bash
php artisan serve --port=8001
```

Abrir en el navegador:

http://127.0.0.1:8001

## Base de datos

El sistema utiliza tres tablas principales:

- carreras
- cursos
- matriculas

Una carrera puede tener varios cursos y un curso
puede tener varias matrículas.

## Arquitectura MVC

### Modelos

- Carrera.php
- Curso.php
- Matricula.php

### Controladores

- CursoController.php
- MatriculaController.php

### Vistas

- Plantilla principal.
- Listado de cursos.
- Creación de cursos.
- Edición de cursos.
- Formulario de matrícula.
- Confirmación de matrícula.

## Pruebas automatizadas

Para ejecutar las pruebas:

```bash
php artisan config:clear
php artisan test
```

Las pruebas utilizan SQLite en memoria para no afectar
los registros de la base de datos principal de MySQL.

### Resultados obtenidos

- 14 pruebas exitosas.
- 0 pruebas fallidas.
- 38 aserciones verificadas.
- Tiempo de ejecución: 10.82 segundos.

## Seguridad

- Protección CSRF.
- Validaciones del lado del servidor.
- Restricciones de integridad referencial.
- Exclusión del archivo .env del repositorio.
- Exclusión de las dependencias de vendor.

El sistema fue desarrollado con fines académicos
para ejecución local. No incluye autenticación ni
autorización de usuarios.

## Control de versiones

El proyecto fue desarrollado mediante commits independientes,
registrando progresivamente las diferentes etapas
de implementación.

## Repositorio

https://github.com/Kevin30m/Workshops-ISW-613
