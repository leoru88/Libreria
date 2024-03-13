Documentación del Proyecto libreriaO con Laravel, Composer y npm:

Esta documentación proporciona instrucciones detalladas para instalar y ejecutar un proyecto Laravel que utiliza Composer para la gestión de dependencias de PHP y npm para la gestión de dependencias de JavaScript.


Requisitos Previos
Antes de comenzar, asegúrate de tener instalados los siguientes requisitos en tu sistema:

PHP: Instala PHP en tu máquina. Puedes descargar la última versión de PHP desde php.net.

Composer: Composer es una herramienta de gestión de dependencias para PHP. Puedes instalar Composer siguiendo las instrucciones en getcomposer.org.

Node.js y npm: Node.js es necesario para ejecutar npm. Puedes descargar Node.js desde nodejs.org.

Git: Si aún no tienes Git instalado, puedes descargarlo desde git-scm.com.

Instalación del Proyecto Laravel
Clonar el Repositorio:

bash
Copy code
git clone <url-del-repositorio> nombre-del-proyecto
cd nombre-del-proyecto
Instalar Dependencias de PHP con Composer:

bash
Copy code
composer install
Configuración de la Base de Datos
Copia el archivo .env.example y renómbralo a .env.

Configura las credenciales de la base de datos en el archivo .env.

Ejecuta las migraciones y las semillas:

bash
Copy code
php artisan migrate --seed

Instalación de Dependencias de JavaScript con npm

Instalar Dependencias de Desarrollo:
bash
Copy code
npm install
Ejecución del Proyecto
Compilar Recursos de JavaScript y CSS:

bash
Copy code
npm run dev
Iniciar el Servidor de Desarrollo:

bash
Copy code
php artisan serve
El servidor de desarrollo estará disponible en http://127.0.0.1:8000.

Acceder al Proyecto:
Abre tu navegador y visita http://127.0.0.1:8000 para ver tu aplicación Laravel en funcionamiento.

Comandos Útiles
Compilar Recursos para Producción:

bash
Copy code
npm run prod
Limpiar Caché de Configuración:

bash
Copy code
php artisan config:clear
Limpiar Caché de Vistas:

bash
Copy code
php artisan view:clear