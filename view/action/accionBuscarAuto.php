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

    <title>Resultado de la Búsqueda</title>
</head>
<body>

<!-- navbar -->
<?php include_once($ROOT . '/view/components/navbar.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h1 class="card-title">Resultado de la Búsqueda</h1>
                    <p class="card-text">
                        <?php echo $mensaje; ?>
                    </p>
                    <a href="../buscarAuto.php" class="btn btn-light">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- footer -->
  <?php include_once($ROOT . '/view/components/footer.php'); ?>
  
</body>
</html>
