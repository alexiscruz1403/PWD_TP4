<?php

include_once('../../util/funciones.php');
include_once('../../controller/ABM.php');

$datos = dataSubmmited(); 
$dni = isset($datos['NroDni']) ? trim($datos['NroDni']) : null;
$mensaje = ""; 

if ($dni) {
    $control = new ABM();
    $persona = $control->buscarPersona($dni); 
    if ($persona) {
        $mensaje .= "DNI: " . $persona->getNroDni() . "<br>";
        $mensaje .= "Apellido: " . $persona->getApellido() . "<br>";
        $mensaje .= "Nombre: " . $persona->getNombre() . "<br>";
        $mensaje .= "Fecha de Nacimiento: " . $persona->getFechaNac() . "<br>";
        $mensaje .= "Telefono: " . $persona->getTelefono() . "<br>";
        $mensaje .= "Domicilio: " . $persona->getDomicilio() . "<br>";
        $mensaje .= "<a href='ListarPersonas.php'>Volver a Listar Todas las Personas</a><br>"; 
    } else {
        $mensaje = "No se encontró la persona con el DNI " . htmlspecialchars($dni) . ".";
    }
} else {
    $mensaje = "No se proporcionó un DNI.";
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <title>Resultado de Búsqueda</title>
    <meta charset="UTF-8">
</head>
<body>
    <h3>Información de la Persona</h3>
    <br><a href="/PWD_TP4/view/BuscarPersona.php">Volver</a><br>
    <?php echo $mensaje; ?>
</body>
</html>
