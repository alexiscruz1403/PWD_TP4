<!DOCTYPE html>

<?php include_once("./util/configuracion.php"); ?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="view/css/styles.css">
   
</head>
<body class="grey darken-3">

<!-- navbar -->
<?php include_once($ROOT . '/view/components/navbar.php'); ?>
   
    <main class="row blue-grey lighten-5 z-depth-5">
        <div class="row">
            <h1 class="center-align col s12">Menú Principal</h1>
            <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m1 l4 offset-l1"><a href="view/verAutos.php" class="white-text">Lista de Autos</a></button>
            <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m2 l4 offset-l2"><a href="view/listaPersonas.php" class="white-text">Lista de Personas</a></button>
            <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m1 l4 offset-l1"><a href="view/buscarAuto.php" class="white-text">Buscar Auto</a></button>
            <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m2 l4 offset-l2"><a href="view/BuscarPersona.php" class="white-text">Buscar Persona</a></button>
            <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m1 l4 offset-l1"><a href="view/nuevoAuto.php" class="white-text">Nuevo Auto</a></button>
            <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m2 l4 offset-l2"><a href="view/NuevaPersona.php" class="white-text">Nueva Persona</a></button>
            <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m1 l4 offset-l1"><a href="view/cambioDuenio.php" class="white-text">Cambiar Dueño</a></button>
        </div>
    </main>
    
    <!-- footer -->
    <?php include_once($ROOT . '/view/components/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>
