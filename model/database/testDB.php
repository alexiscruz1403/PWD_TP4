<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // Asegúrate de que el autoload está correctamente incluido

use Dotenv\Dotenv;

// Carga las variables del archivo .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

include_once 'Database.php';
include_once '../data/Auto.php';
include_once '../data/Persona.php';
include_once '../../controller/ABM.php';

$database = new DataBase();
if ($database->getConnection()) {
    echo "Conexión a la base de datos exitosa.";
} else {
    echo "Error en la conexión: " . $database->getError();
    exit; 
}

// $abm = new ABM(); // Crear una instancia de ABM
// $autos = $abm->listarAutos(); // Obtener la lista de autos
// $personas = $abm->listarPersonas("nrodni=25963874");

// print_r($autos);
// print_r($personas);

$DB_HOST = $_ENV['DB_HOST'] ?? 'default_host';
$DB_NAME = $_ENV['DB_NAME'] ?? 'default_database';
$DB_USER = $_ENV['DB_USER'] ?? 'default_user';
$DB_PASS = $_ENV['DB_PASS'] ?? 'default_pass';

echo "Host: " . $DB_HOST . ", Base de datos: " . $DB_NAME;

?>