<?php

include_once('../../util/configuracion.php');


$datos = dataSubmmited();
$patente = isset($datos['patente']) ? $datos['patente'] : null;
$mensaje = "";
$autoControl = new ABM();

if ($patente) {
    $auto = $autoControl->buscarAuto($datos);
    if ($auto) {
        $mensaje = "<h2>Detalles del Auto</h2>";
        $mensaje .= "Patente: " . htmlspecialchars($auto->getPatente()) . "<br>";
        $mensaje .= "Marca: " . htmlspecialchars($auto->getMarca()) . "<br>";
        $mensaje .= "Modelo: " . htmlspecialchars($auto->getModelo()) . "<br>";
        $mensaje .= "DNI del Dueño: " . htmlspecialchars($auto->getDuenio()->getNroDni()) . "<br>";
    } else {

        $mensaje = "No se encontró el auto con la patente " . htmlspecialchars($patente) . ".";
    }
} else {
    $mensaje = "No se proporcionó una patente.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">

    <title>Resultado de la Búsqueda</title>
</head>

<body class="grey darken-3">

    <?php include_once($ROOT . '/view/components/navbar.php'); ?>

    <main class="row blue-grey lighten-5 z-depth-5">
        <div class="container">
            <h3 class="center-align">Información del auto</h3>
            <div class="card-panel grey lighten-3">
            <?php echo $mensaje; ?>
            </div>
        </div>
        <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4"><a href="../buscarAuto.php" class="white-text">Volver</a></button>
    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <?php include_once($ROOT . '/view/components/footer.php'); ?>

</body>

</html>