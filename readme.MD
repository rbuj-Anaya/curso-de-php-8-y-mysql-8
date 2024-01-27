# Curso de PHP 8 y MySQL 8
<p align="center">
<img src="images/libro.png" alt="Curso de PHP 8 y MySQL 8" width="500px">
</p>

## Introducción
En este repositorio encontrarás todos los ejemplos del libro “Curso de PHP 8 y MySQL 8” de _Anaya Multimedia_. Sigue los pasos de instalación de los contenedores para poder tener un Sistema completo con PHP 8, MySQL 8 y Nginx.
## Instalación
Para instalar los contenedores es necesario tener Docker funcionado en la máquina y que el comando _docker-compose_ esté presente.  
Después de clonar el repositorio es necesario levantar los contenedores con:  
`docker-compose up`. 
Si es la primera vez que se ejecuta, Docker recuperará las imágenes de los contenedores, compilará la última versión de la rama master de PHP en uno de ellos y quedará funcionando todo correctamente.  
Para revisar si la instalación ha sido correcta puedes ejecutar el comando:  
`docker-compose ps`. 
Deberías obtener un resultado parecido:
```sh
NAME                               IMAGE                          COMMAND                  SERVICE   CREATED         STATUS         PORTS
curso-de-php-8-y-mysql-8-mysql-1   mysql                          "docker-entrypoint.s…"   mysql     3 seconds ago   Up 2 seconds   0.0.0.0:3306->3306/tcp, 33060/tcp
curso-de-php-8-y-mysql-8-nginx-1   nginx:mainline-alpine          "/docker-entrypoint.…"   nginx     3 seconds ago   Up 2 seconds   0.0.0.0:8000->80/tcp, 0.0.0.0:8001->81/tcp, 0.0.0.0:8002->82/tcp
curso-de-php-8-y-mysql-8-php-1     curso-de-php-8-y-mysql-8-php   "docker-php-entrypoi…"   php       3 seconds ago   Up 2 seconds   0.0.0.0:3000->3000/tcp, 0.0.0.0:9000->9000/tcp
```

Cada línea indica que es un contenedor distinto:
- curso-de-php-8-y-mysql-8-mysql-1: Contiene el motor de bases de datos MySQL 8.
- curso-de-php-8-y-mysql-8-nginx-1. Contiene el Servidor de aplicaciones Nginx que va a tramitar las peticiones de PHP.
- curso-de-php-8-y-mysql-8-php-1. Contiene la compilación de PHP 8 funcionando como componente ([FastCGI Process Manager](https://www.php.net/manual/es/install.fpm.php "FastCGI Process Manager")) de Nginx.
Si el estado (_State_) del contenedor es _UP_ quiere decir que todo está funcionando. El servidor web Nginx se levanta en el puerto 8000 y debería responder desde cualquier navegador con la URL [http://localhost:8000](http://localhost:8000 "http://localhost:8000"). 
Además, es posible comprobar que PHP 8 está funcionando accediendo a la URL [http://localhost:8000/info.php](http://localhost:8000/info.php "http://localhost:8000/info.php").
<p align="center">
<img src="images/info.png" alt="Captura de pantalla de phpinfo()"/>
</p>

## Conexión con los contenedores
### PHP 8
Una vez que los contenedores están funcionando se puede interactuar con ellos con los [comandos básicos de Docker](https://cerebro-digital.com/panel/knowledgebase/63/Comandos-frecuentes-de-Docker.html "comandos básicos de Docker"). Para conectar con el contenedor de PHP 8 tendremos que poner en el terminal el siguiente comando:  
```bash
docker exec -ti curso-de-php-8-y-mysql-8-php-1 sh
```
A partir de aquí tendremos una Shell (una línea de comandos) para hacer comprobaciones o crear nuevos archivos. Desde esta misma línea de comandos podemos comprobar la versión que se está ejecutando con el comando:  
`php -v`
Obtendremos algo parecido a esto:
```sh
PHP 8.3.2 (cli) (built: Jan 27 2024 04:30:03) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.3.2, Copyright (c) Zend Technologies
    with Zend OPcache v8.3.2, Copyright (c), by Zend Technologies
```
Al clonar el repositorio, se crea un directorio llamado _www_. En este directorio tendremos que añadir los archivos de PHP que vayamos creando y serán accesibles desde el navegador a través del puerto 8000. El directorio _www_ está conectado con el directorio _/srv/www/api_ del contenedor de PHP 8. Todo lo que creemos en nuestra máquina local en _www_ aparecerá en el Docker en esa dirección. Docker necesita directorios compartidos para guardar  los archivos que vamos creando, porque cada vez que se apaga el contenedor desaparece todo aquello que se ha modificado dentro.  
### MySQL 8
La conexión al contenedor de MySQL es prácticamente igual al anterior:  
`docker exec -it curso-de-php-8-y-mysql-8-mysql-1 sh`
En el archivo _.env_ están descritas las variables de entorno que se utilizan en la instalación del motor de bases de datos. Ahí se muestran las contraseñas de root y del usuario por defecto.
```sh
MYSQL_ROOT_PASSWORD=root
MYSQL_DATABASE=curso
MYSQL_USER=curso
MYSQL_PASSWORD=curso
```
Para ver la versión instalada en el Docker tendremos que escribir el siguiente comando:
`mysql --version`
Obteniendo un resultado parecido al siguiente:
```sh
mysql  Ver 8.3.0 for Linux on x86_64 (MySQL Community Server - GPL)
```
Para conectar a MySQL 8 se utiliza el comando básico y el usuario root o el creado por defecto (_curso_):
`# mysql -u root -p`
Tras escribir la contraseña del usuario debería aparecer la consola de MySQL, que nos permitirá, a través de consultas SQL, manejar todos los aspectos de nuestras bases de datos:
```bash
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 9
Server version: 8.3.0 MySQL Community Server - GPL

Copyright (c) 2000, 2024, Oracle and/or its affiliates.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> 
```
La última comprobación que podemos hacer es ejecutar una pequeña consulta para ver si la base de datos del curso está creada:
`show databases;`
Obtendremos algo parecido a lo siguiente:
```bash
mysql> show databases;
+--------------------+
| Database           |
+--------------------+
| curso              |
| information_schema |
| mysql              |
| performance_schema |
| sys                |
+--------------------+
5 rows in set (0.00 sec)
```
### Nginx
También es posible conectar al contenedor del servidor web, pero no es nada recomendable si no sabemos muy bien lo que hacemos. Este contenedor tiene la configuración de uso de PHP 8, el directorio que va a ejecutar los scripts de PHP (el mismo que está compartido con el Docker de PHP 8), etc.  
Cualquier configuración que sea necesario cambiar es obligatorio hacerlo en los archivos externos, que están en _/docker/nginx/_. Si se cambia alguna configuración dentro del Docker directamente solo será efectiva hasta que el contenedor se apague. Cuando arranque de nuevo, la configuración volverá a restablecerse.
