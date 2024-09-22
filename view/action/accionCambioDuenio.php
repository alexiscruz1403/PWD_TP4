<?php

include_once("../../util/configuracion.php");

$datos = dataSubmmited();
$mensaje = '';

if (isset($datos['patente']) && isset($datos['dni'])) {
    $patente = $datos['patente'];
    $dni = $datos['dni'];

    $abm = new ABM();

    $auto = $abm->buscarAuto(['patente' => $patente]);
    $persona = $abm->buscarPersona(['nroDni' => $dni]);

    if (!$auto) {
        $mensaje = "Error: El auto con patente $patente no se encuentra registrado. Por favor registre el automóvil para iniciar el cambio de dueño.";
    } elseif (!$persona) {
        $mensaje = "Error: La persona con DNI $dni no está registrada. Por favor registre a la persona para iniciar el cambio de dueño del automóvil.";
    } else {
        $auto->setDuenio($persona);
        if ($auto->modificar()) {
            $marca = $auto->getMarca();
            $modelo = $auto->getModelo();
            $nombrePersona = $persona->getNombre();
            $apellidoPersona = $persona->getApellido();
            $mensaje = "El dueño del auto con patente $patente ha sido actualizado exitosamente. El/La nuevo/a dueño/a del auto $marca $modelo es $nombrePersona $apellidoPersona.";
        } else {
            $mensaje = "Error al actualizar el dueño del auto.";
        }
    }
} else {
    $mensaje = "Error: No se enviaron los datos requeridos.";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Resultado del Cambio de Dueño</title>
</head>

<header>
    <nav class="row">
        <div class="nav-wrapper">
            <div class="col s12 m12 l12">
                <a href="/$ROOT/menu.php" class="breadcrumb">Menu</a>
            </div>
        </div>
    </nav>
</header>

<body class="grey darken-3">
    <main class="row blue-grey lighten-5 z-depth-5">
        <h2 class="center-align col s12">Resultado</h2>
        <p class="center-align col s12"><?= $mensaje; ?></p>
        <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4">
            <a href="../cambioDuenio.php" class="white-text">Volver</a>
        </button>
    </main>
    <footer class="page-footer">
        <div class="row">
            <div class="col l4">
                <h3>Grupo 8</h3>
                <ul>
                    <li>Antueno Pablo Sebastian - FAI-4973</li>
                    <li>Cruz Jesus Ramon Alexis - FAI-4682</li>
                    <li>Mondaca Araceli Andrea - FAI-2147</li>
                </ul>
            </div>
            <div class="col l4">
                <h3>Programacion Web Dinamica</h3>
                <ul>
                    <li>Año 2024</li>
                </ul>
            </div>
            <div class="col l4">
                <h3>Universidad Nacional del Comahue</h3>
                <ul>
                    <li>Facultad de Informatica</li>
                    <li>Tecnicatura Universitaria en Desarrollo Web</li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

<footer class="page-footer">
        <div class="row">
            <div class="col l4">
                <h3>Grupo 8</h3>
                <ul>
                    <li>Antueno Pablo Sebastian - FAI-4973</li>
                    <li>Cruz Jesus Ramon Alexis - FAI-4682</li>
                    <li>Mondaca Araceli Andrea - FAI-2147</li>
                </ul>
            </div>
            <div class="col l4">
                <h3>Programacion Web Dinamica</h3>
                <ul>
                    <li>Año 2024</li>
                </ul>
            </div>
            <div class="col l4">
                <h3>Universidad Nacional del Comahue</h3>
                <ul>
                    <li>Facultad de Informatica</li>
                    <li>Tecnicatura Universitaria en Desarrollo Web</li>
                </ul>
            </div>
        </div>
    </footer>

</html>