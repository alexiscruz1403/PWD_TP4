<?php

include_once '../util/configuracion.php';

$abm = new ABM();
$personas = $abm->listarPersonas();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Lista de Personas</title>
</head>
<body class="grey darken-3">
    <header class="row">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12 m12 l12">
                    <a href="../menu.php" class="breadcrumb"><strong>Menu</strong></a>
                </div>
            </div>
        </nav>
    </header>
    <main class="row blue-grey lighten-5 z-depth-5">
        <div class="row">
            <h1 class="center-align col s12">Listado de Personas</h1>
            <?php if (count($personas) > 0): ?>
                <table class="highlight centered col s12 m8 offset-m2 l8 offset-l2">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Autos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($personas as $persona): ?>
                        <tr>
                            <td><?php echo $persona->getNroDni(); ?></td>
                            <td><?php echo $persona->getNombre(); ?></td>
                            <td><?php echo $persona->getApellido(); ?></td>
                            <td>
                                <form action="autosPersona.php" method="POST">
                                    <input type="hidden" name="dni" value="<?php echo $persona->getNroDni(); ?>">
                                    <button type="submit" class="waves-effect waves-teal btn-flat btn-small">>Ver<</button>

                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="center-align">No hay personas cargadas en la base de datos.</p>
            <?php endif; ?>
        </div>
        <a href="../menu.php" class="white-text">
        <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4">Volver</button>
        </a>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
