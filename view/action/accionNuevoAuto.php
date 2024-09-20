<?php

include_once("../../util/configuracion.php");

$data=dataSubmmited();
$control=new ABM();
$persona=$control->buscarPersona($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Accion Nuevo Auto</title>
</head>
<body class="grey darken-3">
    <header>
        <nav class="row">
            <div class="nav-wrapper">
                <div class="col s12 m12 l12">
                    <a href="../../menu.php" class="breadcrumb">Menu</a>
                    <a href="../nuevoAuto.php" class="breadcrumb">Cargar Auto</a>
                </div>
            </div>
        </nav>
    </header>
    <main class="row blue-grey lighten-5 z-depth-5">
        <?php if(isset($persona)): ?>
            <?php $autoInsertado=$control->insertarAuto($data); ?>
            <?php if($autoInsertado): ?>
                <?php $auto=$control->buscarAuto($data);?>
                <h1 class="center-align">Auto Cargado</h1>
                <table class="centered responsive-table blue-grey lighten-5 cols12 m12 l12">
                    <thead>
                        <tr>
                            <th>Patente</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>DNI del Dueño</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?=$auto->getPatente()?></td>
                            <td><?=$auto->getMarca()?></td>
                            <td><?=$auto->getModelo()?></td>
                            <td><?=$auto->getDuenio()->getNroDni()?></td>
                        </tr>
                    </tbody>
                </table>
            <?php else: ?>
                <h1 class="center-align col s12">Hubo un error al insertar el auto</h1>
                <p class="center-align col s12"><?=$control->getMensajeError()?></p>
            <?php endif; ?>
        <?php else: ?>
            <h1 class="center-align col s12">No se encontro la persona con DNI <?=$data['nroDni']?></h1>
            <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4"><a href="../ejercicio4_2/nuevaPersona.php" class="white-text">Cargar Persona</a></button>
        <?php endif; ?>
        <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4"><a href="../nuevoAuto.php" class="white-text">Volver</a></button>
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
</html>