<p align="center">
  <img src="https://uml.edu.ni/wp-content/uploads/2022/08/Original-PNG1.png" width="200" alt="Universidad del Lago Logo" />
</p>

<h1 align="center">Sistema de Gestión de Biblioteca – UML</h1>

<p align="center">
  Aplicación web para la gestión integral de una biblioteca universitaria, construida con <strong>Laravel 12</strong> y <strong>Filament 4</strong>.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-red?logo=laravel" alt="Laravel" />
  <img src="https://img.shields.io/badge/Filament-4.x-f59e0b?logo=laravel" alt="Filament" />
  <img src="https://img.shields.io/badge/PHP-8.2+-8892BF?logo=php" alt="PHP" />
  <img src="https://img.shields.io/badge/TailwindCSS-4.x-38bdf8?logo=tailwindcss" alt="TailwindCSS" />
</p>

---

## ✨ Funcionalidades

### 📊 Panel de Control (Dashboard)
- **Estadísticas en tiempo real**: total de libros, usuarios registrados, préstamos activos y consultas del día.
- **Gráfica de línea** – Atenciones (préstamos y consultas) de los últimos 6 meses.
- **Gráfica de dona** – Distribución de libros por área de conocimiento.
- **Gráfica de pie** – Estado de atenciones (activas vs finalizadas).

### 📚 Gestión de Libros
- Registro de libros con título, autor, editorial, año, ISBN, área de conocimiento y control de stock.
- Soft-delete y restauración de registros.
- Filtros y búsqueda avanzada.

### 👤 Gestión de Usuarios
- Registro de usuarios de tipo: **Estudiante**, **Docente** o **Externo**.
- Asignación de carrera, especialidad, tipo de documento y rol.
- Vista detallada con infolist.

### 🔄 Atenciones (Préstamos y Consultas)
- Registro de préstamos con fecha de atención y devolución.
- Registro de consultas en sala.
- Estados: **Activa** / **Finalizada**.
- Filtros por tipo y estado con badges de color.

### 📈 Reportes
- Tabla de atenciones con filtros avanzados:
  - Por tipo de atención (préstamo / consulta).
  - Por estado (activa / finalizada).
  - Por rango de fechas.
- Tarjetas resumen: total de atenciones, préstamos activos, consultas del mes.

### ⚙️ Configuración (Ajustes)
| Módulo | Descripción |
|---|---|
| Roles | Gestión de roles del sistema |
| Carreras | Carreras académicas asociadas |
| Especialidades | Especialidades docentes |
| Documentos | Tipos de documento de identidad |
| Áreas de Conocimiento | Categorías temáticas de libros |

---

## 🎨 Diseño y Tema

- **Tema personalizado** con barra lateral en azul marino oscuro y acentos en ámbar.
- **Logo institucional** UML en la cabecera del panel.
- **Fuente**: Inter (cargada vía Google Fonts).
- Sidebar colapsable en escritorio.
- Paleta de colores: Amber (primary), Slate (gray), Blue (info), Emerald (success), Orange (warning), Rose (danger).

---

## 🚀 Instalación

### Requisitos
- PHP 8.2+
- Composer
- Node.js 18+ y npm/pnpm

### Pasos

```bash
# 1. Clonar el repositorio
git clone <url-del-repositorio>
cd bib

# 2. Instalar dependencias PHP
composer install

# 3. Instalar dependencias JavaScript
npm install

# 4. Copiar variables de entorno
cp .env.example .env

# 5. Generar clave de aplicación
php artisan key:generate

# 6. Configurar la base de datos en .env
# DB_CONNECTION=sqlite  (por defecto, o configura MySQL/PostgreSQL)

# 7. Ejecutar migraciones
php artisan migrate

# 8. (Opcional) Ejecutar seeders
php artisan db:seed

# 9. Compilar assets
npm run build

# 10. Iniciar el servidor de desarrollo
composer run dev
```

### Acceso al Panel
Por defecto el panel está en la raíz `/`. Necesitas crear un usuario administrador:

```bash
php artisan make:filament-user
```

---

## 🗂️ Estructura del Proyecto

```
app/
├── Filament/
│   ├── Pages/
│   │   ├── Dashboard.php      # Panel de control personalizado
│   │   └── Reportes.php       # Sección de reportes
│   ├── Resources/
│   │   ├── Libros/            # Gestión de libros
│   │   ├── Usuarios/          # Gestión de usuarios
│   │   ├── Atencions/         # Préstamos y consultas
│   │   ├── Carreras/          # Carreras académicas
│   │   ├── Especialidads/     # Especialidades
│   │   ├── Documentos/        # Tipos de documento
│   │   ├── Rols/              # Roles
│   │   └── AreaConocimientos/ # Áreas de conocimiento
│   └── Widgets/
│       ├── StatsOverview.php          # Tarjetas de estadísticas
│       ├── AtencionesPorMesChart.php  # Gráfica mensual
│       ├── LibrosPorAreaChart.php     # Gráfica por área
│       └── EstadoAtencionesPieChart.php # Gráfica de estados
├── Models/
│   ├── Libro.php, Usuario.php, Atencion.php
│   ├── Carrera.php, Especialidad.php, Rol.php
│   ├── Documento.php, AreaConocimiento.php
└── Providers/
    └── Filament/AdminPanelProvider.php
resources/
├── css/
│   ├── app.css
│   └── filament/admin/theme.css   # Tema personalizado
└── views/filament/pages/
    └── reportes.blade.php
```

---

## 🛠️ Stack Tecnológico

| Tecnología | Versión | Uso |
|---|---|---|
| Laravel | 12.x | Framework backend |
| Filament | 4.x | Panel de administración |
| TailwindCSS | 4.x | Estilos |
| PHP | 8.2+ | Lenguaje |
| SQLite / MySQL | — | Base de datos |
| Vite | — | Bundler de assets |

---

## 📄 Licencia

Este proyecto es de uso académico/institucional para la **Universidad Martin Lutero (UML)**.
