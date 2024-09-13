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
    <header class="row">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12 m12 l12">
                    <a href="../menu.html" class="breadcrumb">Menu</a>
                    <a href="../ejercicio5/nuevoAuto.php" class="breadcrumb">Cargar Auto</a>
                </div>
            </div>
        </nav>
    </header>
    <main class="row blue-grey lighten-5 z-depth-5">
        <?php if(isset($persona)): ?>
            <?php $autoInsertado=$control->insertarAuto($data); ?>
            <?php if($autoInsertado): ?>
                <?php $auto=$control->buscarAuto($data);?>
                <table class="centered responsive-table blue-grey lighten-5 cols12 m12 l12">
                    <caption class="blue-grey lighten-5">Auto Cargado</caption>
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
        <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4"><a href="../ejercicio5/nuevoAuto.php" class="white-text">Volver</a></button>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>