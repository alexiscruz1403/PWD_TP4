<?php
include_once("../../util/configuracion.php");

$datos = dataSubmmited();
$dni = isset($datos['nroDni']) ? trim($datos['nroDni']) : null;
$mensaje = "";

if ($dni) {
    $control = new ABM();
    $persona = $control->buscarPersona(['nroDni' => $dni]);
    if ($persona) {
        $mensaje .= "DNI: " . $persona->getNroDni() . "<br>";
        $mensaje .= "Apellido: " . $persona->getApellido() . "<br>";
        $mensaje .= "Nombre: " . $persona->getNombre() . "<br>";
        $mensaje .= "Fecha de Nacimiento: " . $persona->getFechaNacimiento() . "<br>";
        $mensaje .= "Telefono: " . $persona->getTelefono() . "<br>";
        $mensaje .= "Domicilio: " . $persona->getDomicilio() . "<br>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <title>Resultado de Búsqueda</title>
    <meta charset="UTF-8">
</head>

<body>

    <!-- navbar -->
    <?php include_once($ROOT . '/view/components/navbar.php'); ?>

    <div class="container">
        <h3 class="center-align">Información de la Persona</h3>

        <div class="card-panel grey lighten-3">
            <p><?php echo $mensaje; ?></p>
        </div>

        <a href="../BuscarPersona.php" class="waves-effect waves-light btn-small">Volver</a>
    </div>

      <!-- footer -->
      <?php include_once($ROOT . '/view/components/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>