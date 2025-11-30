# Portfolio Backend API

Sistema de gestión de portafolio profesional con API REST para administrar experiencias laborales y proyectos.

## 🚀 Características

- **Panel de administración** completo con Laravel Breeze
- **API de lectura versionada** (v1) para consumo externo
- **Gestión de experiencias laborales** con responsabilidades
- **Gestión de proyectos** con imágenes y enlaces
- **Documentación de API** integrada
- **Diseño minimalista** y responsive
- **Paginación** en listados

## 📋 Requisitos

- PHP >= 8.1
- Composer
- MySQL/PostgreSQL
- Node.js & NPM

## 🔧 Instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/raortega8906/backend-admin-api
cd backend-admin-api
```

2. **Instalar dependencias**
```bash
composer install
npm install
```

3. **Configurar el entorno**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configurar base de datos**

Edita el archivo `.env` con tus credenciales:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

5. **Ejecutar migraciones**
```bash
php artisan migrate
```

6. **Crear enlace simbólico para storage**
```bash
php artisan storage:link
```

7. **Compilar assets**
```bash
npm run dev
```

8. **Iniciar servidor**
```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`

## 📚 Estructura del Proyecto

```
portfolio-backend/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController
│   │   │   ├── Admin/
│   │   │   │   ├── ExperienceController.php
│   │   │   │   └── ProjectController.php
│   │   │   └── Api/
│   │   │       └── V1/
│   │   │           ├── ApiExperienceController.php
│   │   │           └── ApiProjectController.php
│   │   └── Requests/
│   │   │    └──Admin/
│   │   │       ├── StoreExperienceRequest.php
│   │   │       └── StoreProjectRequest.php
│   │   │       └── UpdateExperienceRequest.php
│   │   │       └── UpdateProjectRequest.php
│   └── Models/
│       ├── Experience.php
│       └── Project.php
├── resources/
│   └── views/
│       ├── admin/
│       │   ├── experiences/
│       │   │   ├── index.blade.php
│       │   │   ├── create.blade.php
│       │   │   └── edit.blade.php
│       │   └── projects/
│       │       ├── index.blade.php
│       │       ├── create.blade.php
│       │       └── edit.blade.php
│       ├── api/
│       │   └── documentation.blade.php
│       └── dashboard.blade.php
└── routes/
    ├── web.php
    └── api.php
```

## 🔑 API Endpoints

### Base URL
```
https://backend-admin-api.test/api/v1
```

### Experiencias

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/experiences` | Listar todas las experiencias |
| GET | `/experiences/{id}` | Obtener una experiencia específica |

### Proyectos

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/projects` | Listar todos los proyectos |
| GET | `/projects/{id}` | Obtener un proyecto específico |

### Ejemplo de Respuesta

**GET /api/v1/experiences**
```json
[
  {
    "id": 1,
    "company": "Tech Corp",
    "position": "Senior Developer",
    "start_year": 2020,
    "end_year": null,
    "is_current": true,
    "responsibilities": [
      "Desarrollo de APIs REST",
      "Liderazgo técnico del equipo"
    ],
    "created_at": "2024-01-15T10:00:00.000000Z",
    "updated_at": "2024-01-15T10:00:00.000000Z"
  }
]
```

## 🎨 Características del Panel Admin

### Dashboard
- Estadísticas de experiencias y proyectos
- Estado de la API
- Enlaces rápidos a gestión de contenido
- Endpoints de API con botón de copiar

### Gestión de Experiencias
- Crear, editar y eliminar experiencias
- Campos dinámicos para responsabilidades
- Checkbox para trabajo actual
- Validación de formularios

### Gestión de Proyectos
- Crear, editar y eliminar proyectos
- Subida de imágenes
- Enlaces a proyectos externos
- Vista previa de imágenes

## 🔐 Autenticación

El panel de administración está protegido con Laravel Breeze. Para acceder:

1. Registra un usuario:
```bash
php artisan tinker
>>> User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')]);
```

2. Accede en `/login`

## 📖 Documentación de API

Accede a la documentación completa de la API en:
```
http://localhost:8000/api/documentation
```

## 🧪 Testing

Ejecutar tests:
```bash
php artisan test
```

## 🚢 Despliegue

### Producción

1. Configurar variables de entorno de producción
2. Ejecutar migraciones:
```bash
php artisan migrate --force
```

3. Optimizar aplicación:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

4. Compilar assets para producción:
```bash
npm run build
```

## 🛠️ Tecnologías

- **Backend**: Laravel 12.x
- **Frontend**: Blade, Tailwind CSS
- **Autenticación**: Laravel Breeze
- **Base de datos**: MySQL/PostgreSQL
- **Validación**: Form Request Validation

## 🤝 Contribuir

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -m 'Añadir nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la licencia MIT.

## 👤 Autor

Rafael A. Ortega - [raortega8906@gmail.com](mailto:raortega8906@gmail.com)

## 🔮 Próximas Funcionalidades

- [ ] Integración con Swagger/OpenAPI
- [ ] Autenticación API con Sanctum
- [ ] Sistema de tags para proyectos
- [ ] Filtros y búsqueda en API
- [ ] Exportación de portafolio a PDF
- [ ] Versionado v2 de API con GraphQL

## 📞 Soporte

Si tienes alguna pregunta o problema, por favor abre un issue en el repositorio.

---

⭐ Si te gusta este proyecto, ¡dale una estrella en GitHub!