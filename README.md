<!-- <p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p> -->

# Proyecto Servisena

## Descripción

El proyecto **Sennovalab y LabServiser** es una plataforma de aplicaciones desarrollada utilizando el Yii Framework Advanced Template. El objetivo de esta plataforma es ofrecer módulos de información para empresas en el área de servitización, permitiendo una gestión completa de los modulos y el acceso a los mismos por parte de los participantes.

## Aplicaciones

# Proyecto de Servitización - YII2 Advanced Template

Este proyecto está desarrollado en Yii2 Advanced Template y consta de tres aplicaciones principales:

1. **appSennovalab**: Funciona como una landing page para enlazar diferentes proyectos.
2. **appServiser**: Es la página del proyecto de Servitización que da cara al cliente/usuario final. Es un gestor de contenido para cargar módulos informativos acerca del proceso de servitización.
3. **appServiserAdmin**: Es la interfaz de administración del proyecto de Servitización, donde se gestionan los contenidos de los módulos y se incluye una herramienta para la creación de diagnósticos a través de formularios.

## Estructura del Proyecto

- **appSennovalab/**: Landing page para redirigir a otros proyectos.
- **appServiser/**: Página del usuario final de la plataforma.
- **appServiserAdmin/**: Panel de administración del proyecto de Servitización.
- **common/**: Archivos compartidos entre las aplicaciones.
- **console/**: Comandos de consola.
- **db/**: Archivos relacionados con la base de datos.
- **vendor/**: Dependencias instaladas a través de Composer.

## Estructura del Proyecto

```plaintext
project-root/
│
├── appSennovalab/
│   ├── assets/
│   ├── config/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   └── ...
│
├── appServiser/
│   ├── assets/
│   ├── config/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   └── ...
│
├── appServiserAdmin/
│   ├── assets/
│   ├── config/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   └── ...
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
├── vendor/
│   └── ...
│
├── yii
```

## Requisitos del Sistema

- PHP 7.4 o superior.
- Composer.
- Servidor Web (Apache, Nginx).
- Base de datos MySQL, MariaDB o PostgreSQL.

## Instalación

1. Clonar el repositorio:

    ```bash
    git clone https://github.com/miguelcmo/Sennova.git
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

Este proyecto está licenciado bajo BSD 3-Clause "New" or "Revised" License. Consulta el archivo `LICENSE` para más detalles.

---

**Autor:** Miguel Angel Carrillo

**Contacto:** miguel.carrillo.m@hotmail.com, mcbs@outlook.com
