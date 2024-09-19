<?php 

include_once("../../util/configuracion.php");
include_once('../../controller/ABM.php');

$datos = dataSubmmited(); 
$resp = false;
$mensaje = "";

$nroDni = isset($datos['nroDni']) ? $datos['nroDni'] : null;
$apellido = isset($datos['apellido']) ? $datos['apellido'] : null;
$nombre = isset($datos['nombre']) ? $datos['nombre'] : null;
$fechaNac = isset($datos['fechaNacimiento']) ? $datos['fechaNacimiento'] : null;
$telefono = isset($datos['telefono']) ? $datos['telefono'] : null;
$Domicilio = isset($datos['domicilio']) ? $datos['domicilio'] : null;
$objTrans = new ABM();
if ($nroDni && $apellido && $nombre && $fechaNac && $telefono && $Domicilio) {
    $datos = [
        'nroDni' => $nroDni,
        'apellido' => $apellido,
        'nombre' => $nombre,
        'fechaNacimiento' => $fechaNac,
        'telefono' => $telefono,
        'domicilio' => $Domicilio
    ];

    if ($objTrans->insertarPersona($datos)) {
        $mensaje = "La persona se insertó correctamente.";
    } else {
        $mensaje = "La persona no pudo insertarse. Error: " . $objTrans->getMensajeError();
    }
} else {
    $mensaje = "No se proporcionaron todos los datos necesarios.";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1-transitional.dtd">
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <title>Resultado de la Operación</title>
</head>
<body>
   
    <div class="container">
        
        <div class="card blue lighten-4">
            <div class="card-content">
                <span class="card-title">Resultado de la Operación</span>
                <p>
                    <?php echo $mensaje;
                     ?>
                </p>
            </div>
            <div class="card-action">
                <a href="../NuevaPersona.php" class="btn waves-effect waves-light">Volver</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
