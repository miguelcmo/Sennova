<!-- <p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p> -->

# Proyecto Servisena

## Descripción

El proyecto **Servisena** es una plataforma de aplicaciones desarrollada utilizando el Yii Framework Advanced Template. El objetivo de esta plataforma es ofrecer módulos de formación para empresas en el área de servitización, permitiendo una gestión completa de los cursos y el acceso a los mismos por parte de los participantes.

## Aplicaciones

### 1. Servisena

**Descripción**: Aplicación principal que funciona como una landing page, proporcionando visibilidad al proyecto y permitiendo el acceso a las demás aplicaciones de la plataforma.

**Características**:
- Página de inicio atractiva y profesional.
- Información general sobre el proyecto y sus beneficios.
- Enlaces de acceso a `serviserFrontend` y `serviserBackend`.

### 2. serviserFrontend

**Descripción**: Aplicación frontend que permite a los usuarios acceder y registrarse en los cursos, ver el contenido de los cursos y otros recursos.

**Características**:
- Registro y autenticación de usuarios.
- Navegación y acceso a los cursos disponibles.
- Visualización de lecciones, recursos y evaluaciones.
- Participación en foros de discusión y actividades colaborativas.

### 3. serviserBackend

**Descripción**: Aplicación backend para la gestión del LMS, donde se administran los cursos, usuarios, evaluaciones y otros recursos.

**Características**:
- Gestión de usuarios y roles.
- Creación y administración de cursos y módulos.
- Gestión de lecciones y recursos de aprendizaje.
- Evaluaciones y calificaciones.
- Monitoreo de la actividad y generación de reportes.
- Gestión de notificaciones y mensajes.

## Estructura del Proyecto

```plaintext
project-root/
│
├── common/
│   ├── config/
│   ├── models/
│   └── ...
│
├── console/
│   ├── config/
│   ├── controllers/
│   └── ...
│
├── environments/
│   └── ...
│
├── servisena/
│   ├── assets/
│   ├── config/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   └── ...
│
├── serviserFrontend/
│   ├── assets/
│   ├── config/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   └── ...
│
├── serviserBackend/
│   ├── assets/
│   ├── config/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   └── ...
│
├── vendor/
│   └── ...
│
├── yii
└── yii_test
```

## Requisitos del Sistema

- PHP 7.4 o superior.
- Composer.
- Servidor Web (Apache, Nginx).
- Base de datos MySQL o PostgreSQL.

## Instalación

1. Clonar el repositorio:

    ```bash
    git clone https://github.com/tu_usuario/servisena.git
    ```

2. Instalar dependencias con Composer:

    ```bash
    composer install
    ```

3. Configurar los archivos de entorno y configuración:

    - Copiar los archivos `.env.example` a `.env` y ajustar las variables necesarias.
    - Configurar las bases de datos en `common/config/main-local.php`.

4. Ejecutar migraciones para crear las tablas necesarias en la base de datos:

    ```bash
    php yii migrate
    ```

5. Configurar el servidor web para que apunte a las carpetas `web` de cada aplicación (`servisena/web`, `serviserFrontend/web`, `serviserBackend/web`).

## Contribuir

Si deseas contribuir al proyecto, por favor sigue estos pasos:

1. Realiza un fork del proyecto.
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -am 'Añadir nueva funcionalidad'`).
4. Sube los cambios a tu rama (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.

---

**Autor:** Miguel Angel

**Contacto:** mcbs@outlook.com
