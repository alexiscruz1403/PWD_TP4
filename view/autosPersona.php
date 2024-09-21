<?php

include_once '../util/configuracion.php';

$datos = dataSubmmited();

if (isset($datos['dni'])) {
    $dni = $datos['dni'];

    $abm = new ABM();

    // Busca la persona por su DNI
    $persona = $abm->buscarPersona(['nroDni' => $dni]);

    if ($persona) {
        // Listar autos asociados a la persona
        $autosPersona = $abm->listarAutos('dniDuenio=' . $dni);
    } else {
        $error = "El DNI proporcionado no se encuentra registrado.";
    }
} else {
    $error = "No se ha enviado un DNI válido.";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Autos de la Persona</title>
</head>

<header class="row">
    <nav>
        <div class="nav-wrapper">
            <div class="col s12 m12 l12">
                <a href="../menu.php" class="breadcrumb">Menu</a>
            </div>
        </div>
    </nav>
</header>

<body class="grey darken-3">

    <main class="row blue-grey lighten-5 z-depth-5">
        <div class="row">
            <h1 class="center-align col s12">Autos de la Persona</h1>

            <?php if (isset($error)): ?>
                <p class="center-align red-text"><?= $error ?></p>
            <?php else: ?>
                <div class="col s12 m8 offset-m2 l8 offset-l2">
                    <h5>Datos de la Persona</h5>
                    <ul class="collection">
                        <li class="collection-item">DNI: <?= $persona->getNroDni(); ?></li>
                        <li class="collection-item">Nombre: <?= $persona->getNombre(); ?></li>
                        <li class="collection-item">Apellido: <?= $persona->getApellido(); ?></li>
                    </ul>
                </div>

                <div class="col s12 m8 offset-m2 l8 offset-l2">
                    <h5>Autos de la Persona</h5>
                    <table class="highlight centered">
                        <thead>
                            <tr>
                                <th>Patente</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($autosPersona)): ?>
                                <?php foreach ($autosPersona as $auto): ?>
                                    <tr>
                                        <td><?= $auto->getPatente(); ?></td>
                                        <td><?= $auto->getMarca(); ?></td>
                                        <td><?= $auto->getModelo(); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="center-align"><p style="color: #D32F2F">Esta persona no tiene autos asociados.</p></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
        <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4">
            <a href="listaPersonas.php" class="white-text">Volver</a>
        </button>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>