# Trabajo práctico N° 4 - Persistencia y MVC

### Descripción del contenido

* En la carpetas *'Ejercicio [Nro]'* encontrará los ejercicios prácticos más las respuestas a las preguntas teóricas en cada punto.
* La respuesta a los ejercicios que son unicamente teóricos los encontrará acontinuación.

### Preguntas teóricas

#### 1) Instale el Sistema Gestor de Bases de Datos MySQL y las extensiones necesarias para poder interactuar con la misma desde PHP. Documente brevemente los pasos realizados y como verificó que el driver se instaló correctamente (vía phpinfo y vía un script de prueba).

Los pasos realizados para la instalación del sistema gestor de base de datos MySQL fueron los siguientes:
* Se instalo el programa WAMP3.1.7_x64.

Los pasos realizados para verificar que el driver del sistema gestor de base de datos MySQL este instalado correctamente fueron los siguientes:
* Se copio el framework utilizado para este trabajo del link: https://github.com/tomasdelvechio/The-PHP-Practitioner-Full-Source-Code.git
* Se crearon los script necesarios para el schema de la base de datos y sus tablas.
* Se ejecutaron en orden dichos scripts utilizando la herramienta `phpMyAdmin`.
* Se creo el archivo `config.php` dentro del proyecto de prueba.
* Se configuro la base de datos creada y los usuarios correspondientes.
* Se instalo el programa `Composer`.
* Se ejecuto el comando `composer install` desde la raiz del proyecto de prueba.
* Se levanto el proyecto utilizando el comando `php -S ip:puerto` desde la raiz del proyecto de prueba.
* Se realiazo una prueba con el ejemplo que el framework brindaba y se observo el correcto impacto de los datos cargados desde el formulario de entrada relacionada a la creacion de `Tareas`.

#### 2) Genere un objeto que construya y gestione la conexión a la base de datos. El objeto debe permitir vía constructor la provisión de los datos de acceso. Los datos de acceso deben estar en un archivo de configuración específico y fuera del control de versiones. Documentar este mecanismo de forma adecuada.

Dentro de la estructura del proyecto, más precisamente dentro del directorio `aplicacion\core\database\`, se encuentra un archivo llamado `Connection.php` el cual contiene la clase `Connection` encargada de, a traves de la función `make`, retorna un objeto PDO con los datos de conexión a la base de datos utilizada. Dichos datos son obtenidos del archivo `config.php` que se encuentra en la raiz del proyecto.

Por otro lado, dentro del mismo directorio `aplicacion\core\database\`, se encuentra otro archivo llamado `QueryBuilder.php` el cual contiene la clase `QueryBuilder` encargada de ofreces las funciones para recuperar los datos de la base, insertar nuevos registos, etc. Estas funciones son utilizadas en las clases Modelos definidas en la aplicación.

Si bien ya existen estas clases en el proyecto, las cuales hacemos uso, se creo dentro de la carpeta *'Ejercicio 2'* un pequeño ejemplo de una clase conexion que se conecta a una base de datos indicada en el archivo `index.php`.

#### 5) ¿Qué es un motor de persistencia ORM (Object-Relational Mapping; Mapeo objeto-relacional)? ¿Qué problemática resuelve? Realice una evaluación de cuánto le costaría modificar el código para implementar uno en el sistema de turnos por usted desarrollado. Si para realizar la evaluación necesita elegir un producto particular, aclárelo.

El ORM es una técnica de programación que permite relacionar datos entre un lenguaje de programación orientado a objetos y el sistema de bases de datos relacional utilizado en el desarrollo de una aplicación.

El principal problema que surge hoy en día, es que prácticamente todas las aplicaciones están diseñadas orientada a objetos (POO) mientras que las bases de datos más usadas son del tipo relacional. Estas bases de datos relacionales solo permiten guardar datos primitivos (enteros, cadenas de texto, etc) no permitiendo guardar de forma directa los objetos de las aplicaciones en las tablas, por lo que estos se deben de convertir antes en registros, afectando por lo general a varias tablas. Este mismo problema tambien se da al momento de recuperar los datos, ya que se debe hacer el proceso inverso, de debe convertir los registros a objetos. Es en esto cuando ORM cobra importancia, ya que se encarga de convertir los objetos en registros y viceversa simulando así tener una base de datos orientada a objetos, permitiendo al desarrollador despreocuparse de las complejidades y el costoso labor de hacer este mapeo objeto relacional.

En PHP tenemos algunos motores de persistencia ORM como Doctrine, Propel, Torpor, etc. El costo que llevaria hacer el cambio a la utilización de estos motores de persistencia ORM viene relacionado con los tiempo que llevaria aprender a utilizar estos motores, la necesidad de definir las clases necesarias encargadas de mapear los datos a la base, la modificación de los controladores para que hagan uso de estas clases y agregar las librerias necesarias para poder realizar todo esto.

### Consideraciones generales

* Para resolver el trabajo práctico se inslato el programa WAMP3.1.7_x64.
* Se utilizo PHP 7.2.14.
* Para correr los proyectos se utilizo el comando php -S ip:puerto