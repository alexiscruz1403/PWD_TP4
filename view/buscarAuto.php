<!DOCTYPE html>

<?php include_once '../util/configuracion.php'; ?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Auto</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="grey darken-3">

    <?php include_once($ROOT . '/view/components/navbar.php'); ?>

    <main class="row blue-grey lighten-5 z-depth-5">
        <div class="row">
            <h1 class="center-align col s12">Buscar Auto </h1>
            <form action="./Action/accionBuscarAuto.php" method="post" class="col s12" id="form">

                <div class="input-field col s12 m4 offset-m4 l6 offset-l3">
                    <input type="text" name="patente" id="patente" class="validate" required>
                    <label for="patente">Ingrese la patente del auto:</label>
                </div>
                <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4" type="submit">
                    Buscar Auto
                </button>
            </form>
        </div>
        <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4"><a href="../menu.php" class="white-text">Volver</a></button>
    </main>

    <?php include_once($ROOT . '/view/components/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/formValidation.js"></script>

</body>

</html>