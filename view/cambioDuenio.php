<!DOCTYPE html>

<?php include_once("../util/configuracion.php"); ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Cambiar Dueño</title>
</head>

<body class="grey darken-3">

    <!-- navbar -->
    <?php include_once($ROOT . '/view/components/navbar.php'); ?>

    <main class="row blue-grey lighten-5 z-depth-5">
        <div class="row">
            <h1 class="center-align col s12">Solicitud de cambio de Dueño</h1>
            <form action="action/accionCambioDuenio.php" method="post" id="form">
                <div class="row">
                    <div class="input-field col s12 m4 offset-m4 l6 offset-l3">
                        <input type="text" name="patente" id="patente" class="validate">
                        <label for="patente">Patente</label>
                        <span class="helper-text" data-error="" data-success="Correcto"></span>
                    </div>
                    <div class="input-field col s12 m4 offset-m4 l6 offset-l3">
                        <input type="number" name="nroDni" id="dni" class="validate">
                        <label for="dni">DNI</label>
                        <span class="helper-text" data-error="" data-success="Correcto"></span>
                    </div>
                </div>
                <button type="submit" class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4">Enviar</button>
            </form>
        </div>

        <a href="../menu.php" class="white-text">
            <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4">Volver</button>
        </a>

    </main>

    <!-- footer -->
    <?php include_once($ROOT . '/view/components/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script src="js/cambioDuenio.js"></script>
</body>

</html>