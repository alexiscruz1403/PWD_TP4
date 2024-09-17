<?php 

include_once('../../util/funciones.php');
include_once('../../controller/ABM.php');

$datos = dataSubmmited(); 
$resp = false;
$mensaje = "";

$nroDni = isset($datos['NroDni']) ? $datos['NroDni'] : null;
$apellido = isset($datos['Apellido']) ? $datos['Apellido'] : null;
$nombre = isset($datos['Nombre']) ? $datos['Nombre'] : null;
$fechaNac = isset($datos['fechaNac']) ? $datos['fechaNac'] : null;
$telefono = isset($datos['Telefono']) ? $datos['Telefono'] : null;
$Domicilio = isset($datos['Domicilio']) ? $datos['Domicilio'] : null;

$objTrans = new ABM();

if ($nroDni && $apellido && $nombre && $fechaNac && $telefono && $Domicilio) {
    // Verificar qué datos se están enviando
    verEstructura($datos);
    if ($objTrans->insertarPersona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $Domicilio)) {
        $resp = true;
    }

    if ($resp) {
        $mensaje = "La persona se insertó correctamente.";
    } else {
        $mensaje = "La persona no pudo insertarse.";
    }
} else {
    $mensaje = "No se proporcionaron todos los datos necesarios.";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <title>Resultado de la Operación</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <h3>Resultado de la Operación</h3>
    <br><a href="../NuevaPersona.php">Volver</a><br>

    <?php	
    echo $mensaje;
    ?>
</body>
</html>
