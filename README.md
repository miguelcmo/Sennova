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

Requisitos del Sistema

    PHP 7.4 o superior.
    Composer.
    Servidor Web (Apache, Nginx).
    Base de datos MySQL o PostgreSQL.