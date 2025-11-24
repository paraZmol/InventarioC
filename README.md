# Sistema de Gestión de Inventario para Constructora (MVP)

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)
![Filament](https://img.shields.io/badge/Filament-v3/v4-F2C94C?style=for-the-badge&logo=filament)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![DOM](https://img.shields.io/badge/DOM-Model-E34F26?style=for-the-badge&logo=html5&logoColor=white)

> **Repositorio:** [https://github.com/paraZmol/InventarioC.git](https://github.com/paraZmol/InventarioC.git)

Este proyecto es un **Producto Mínimo Viable (MVP)** desarrollado como una solución generalizada para la gestión logística de empresas constructoras. El sistema centraliza el control de almacén, permitiendo el seguimiento de materiales (consumibles) y herramientas (activos devolutivos) a través de múltiples obras o centros de costo.

## 🛠️ Stack Tecnológico

El sistema ha sido construido utilizando las últimas tecnologías del ecosistema PHP para garantizar rapidez, seguridad y escalabilidad:

* **Lenguaje:** PHP 8.2
* **Framework Backend:** Laravel 12
* **Panel Administrativo:** FilamentPHP v4
* **Base de Datos:** MySQL
* **Reportes:** DomPDF (Generación de PDF)

---

## 📋 Descripción del Sistema

El software resuelve la problemática del "control de stock en tiempo real" mediante una arquitectura basada en eventos (Observers). A diferencia de las hojas de cálculo, este sistema:

1.  **Calcula el stock automáticamente:** No permite editar la cantidad a mano. El stock es el resultado matemático de *Entradas - Salidas + Devoluciones*.
2.  **Gestiona múltiples ubicaciones:** Controla qué obra tiene qué herramienta en cada momento.
3.  **Alertas visuales:** Un Dashboard inteligente que avisa cuándo un producto ha llegado a su stock mínimo crítico.

### Módulos Principales

* **Escritorio (Dashboard):** Panel de control con KPIs en tiempo real (Obras activas, Alertas de stock crítico en rojo y Gráficos de actividad diaria).
* **Gestión de Obras:** Catálogo de proyectos activos y sus responsables (Ingenieros/Residentes).
* **Catálogo de Productos:** Base de datos de ítems diferenciada por tipo:
    * *Materiales:* Se consumen al salir (Ej: Cemento, Ladrillos).
    * *Herramientas:* Se asignan y deben retornar (Ej: Taladros, Andamios).
* **Kardex / Movimientos:** El corazón del sistema. Registra Entradas (Compras), Salidas (Despachos a obra) y Devoluciones.
* **Reportes:** Generación de PDF oficial con el estado actual del inventario para auditorías físicas.

---

## 🗄️ Estructura de Base de Datos

El sistema utiliza una base de datos relacional MySQL con las siguientes tablas clave:

1.  `users`: Administradores del sistema.
2.  `obras`: Proyectos de construcción (Centros de costo).
3.  `productos`: Inventario maestro. Contiene la lógica de stock mínimo y actual.
4.  `movimiento_inventarios`: Historial transaccional. Cada fila representa un cambio físico en el almacén.

---

## 🚀 Guía de Instalación y Despliegue

Sigue estos pasos para levantar el proyecto en tu entorno local.

### Prerrequisitos
* PHP 8.2 o superior.
* Composer.
* Servidor MySQL (XAMPP, Laragon, Docker, etc.).
* Node.js (Opcional, solo para compilar assets si se requiere).

### Paso 1: Clonar el Repositorio
```bash
git clone https://github.com/paraZmol/InventarioC.git
cd inventario
```

### Paso 2: Instalar Dependencias (Backend)
Este comando descargará Laravel, Filament y todas las librerías necesarias (DomPDF, etc.).
```bash
composer install
```

### Paso 3: Configurar Entorno
Duplica el archivo de ejemplo y configura tu base de datos.
```bash
cp .env.example .env
```
Abre el archivo `.env` y configura tus credenciales de base de datos:
```bash
DB_CONNECTION=mysql (puede ser sql)
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventacioC (o el nombre que quieras)
DB_USERNAME=root (puede cambiar tu user name, dependiendo de ti o lo dejas predeterminado)
DB_PASSWORD= (recuerda colocar tu password o dejarlo en blanco si no lo tienes)
```
El resto puede observarlo en el `.env` de ejemplo o `.env.example
`
### Paso 4: Generar Key de Aplicación
```bash
php artisan key:generate
```

### Paso 5: Migración y Datos de Prueba (Seeders)
**IMPORTANTE:** Este comando creará las tablas e insertará datos de prueba (Obras, Productos y Movimientos) para demostrar la lógica automática del sistema.
```bash
php artisan migrate:fresh --seed
```

### Paso 6: Ejecutar Servidor
```bash
php artisan serve
```
El sistema login del sistema estará disponible en: `http://127.0.0.1:8000/admin`

---
### Credenciales de Acceso (Demo)
El sistema viene pre-configurado con un usuario administrador estándar para pruebas:
* **Usuario:** `admin@admin.com`
* **Contraseña:** `pass`

---
### Notas Adicionales
* **Lógica de Negocio:** El cálculo de stock se realiza mediante un Observer en el modelo de Movimientos. Si se registra una entrada, el stock sube; si es una salida, baja.
* **Impresión:** Puede generar el reporte de stock yendo a la sección Productos y haciendo clic en el botón "Imprimir Reporte".
