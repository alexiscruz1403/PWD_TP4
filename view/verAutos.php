<?php

include_once '../util/configuracion.php';

$abm = new ABM();
$autos = $abm->listarAutos();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Ver Autos</title>
</head>

<body class="grey darken-3">

    <!-- navbar -->
    <?php include_once($ROOT . '/view/components/navbar.php'); ?>

    <main class="row blue-grey lighten-5 z-depth-5">
        <div class="row">
            <h1 class="center-align col s12">Listado de Autos</h1>
            <?php if (count($autos) > 0): ?>
                <table class="highlight centered col s12 m8 offset-m2 l8 offset-l2">
                    <thead>
                        <tr>
                            <th>Patente</th>
                            <th>Marca</th>
                            <th>Modelo (año)</th>
                            <th>Dueño</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($autos as $auto): ?>
                            <tr>
                                <td><?php echo $auto->getPatente(); ?></td>
                                <td><?php echo $auto->getMarca(); ?></td>
                                <td><?php echo $auto->getModelo(); ?></td>
                                <td><?php echo $auto->getDuenio()->getNombre() . " " . $auto->getDuenio()->getApellido(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="center-align">No hay autos cargados en la base de datos.</p>
            <?php endif; ?>
        </div>
        <a href="../menu.php" class="white-text">
            <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4">Volver</button>
        </a>
    </main>

    <!-- footer -->
    <?php include_once($ROOT . '/view/components/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>


</html>