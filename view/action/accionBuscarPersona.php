<?php
include_once("../../util/configuracion.php");

$datos = dataSubmmited();
$dni = isset($datos['nroDni']) ? trim($datos['nroDni']) : null;
$mensaje = "";

if ($dni) {
    $control = new ABM();
    $persona = $control->buscarPersona($datos);
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
    <link rel="stylesheet" href="../css/styles.css">
    <title>Resultado de Búsqueda</title>
    <meta charset="UTF-8">
</head>

<body class="grey darken-3">

    <!-- navbar -->
    <?php include_once($ROOT . '/view/components/navbar.php'); ?>

    <main class="row blue-grey lighten-5 z-depth-5">
        <div class="container">
            <h3 class="center-align">Información de la persona</h3>
            <div class="card-panel grey lighten-3">
            <?php echo $mensaje; ?>
            </div>
        </div>
        <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4"><a href="../BuscarPersona.php" class="white-text">Volver</a></button>
    </main>

      <!-- footer -->
      <?php include_once($ROOT . '/view/components/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>