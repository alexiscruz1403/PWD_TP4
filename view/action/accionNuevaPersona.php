<?php

include_once("../../util/configuracion.php");

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Resultado de la Operación</title>
</head>

<body class="grey darken-3">

    <?php include_once($ROOT . '/view/components/navbar.php'); ?>

    <main class="row blue-grey lighten-5 z-depth-5">
                <p class="center-align col s12">
                    <?php echo $mensaje;
                     ?>
                </p>
            
      <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4"><a href="../NuevaPersona.php" class="white-text">Volver</a></button>
    </main>

    <?php include_once($ROOT . '/view/components/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>