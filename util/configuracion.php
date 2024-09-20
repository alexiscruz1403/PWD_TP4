
<!-- header('Content-Type: text/html; charset=utf-8');
header ("Cache-Control: no-cache, must-revalidate ");

$PROYECTO = "PWD_TP4";

//variable que almacena el directorio del proyecto
$ROOT = $_SERVER['DOCUMENT_ROOT']."/$PROYECTO/";

include_once($ROOT.'util/funciones.php');

$_SESSION['ROOT']=$ROOT; -->

<<?php
header('Content-Type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");

// Cargar Composer autoload para utilizar phpdotenv
require_once __DIR__ . '/../vendor/autoload.php';

$PROYECTO = "PWD_TP4";

// Cargar las variables de entorno desde el archivo .env
/*
__DIR__:Esta constante mágica de PHP devuelve el directorio completo donde está ubicado el archivo que contiene esta línea. 
*/
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../'); 
// $dotenv->load();

// // Obtener las variables de entorno
// $DB_HOST = $_ENV['DB_HOST'];
// $DB_NAME = $_ENV['DB_NAME'];
// $DB_USER = $_ENV['DB_USER'];
// $DB_PASS = $_ENV['DB_PASS'];
// $DB_PORT = $_ENV['DB_PORT'];
// $DB_ENGINE = $_ENV['DB_ENGINE'];

// Variable que almacena el directorio del proyecto
$ROOT = $_SERVER['DOCUMENT_ROOT'] . "/$PROYECTO/";

// Incluir funciones desde la carpeta util
include_once($ROOT . 'util/funciones.php');

// Almacenar la raíz del proyecto en la sesión
$_SESSION['ROOT'] = $ROOT;


