<!DOCTYPE html>
<html lang="es">

<?php include_once("../util/configuracion.php"); ?>

<head>
    <meta charset="UTF-8">
    <title>Buscar Persona</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

</head>

<body>

    <!-- navbar -->
    <?php include_once($ROOT . '/view/components/navbar.php'); ?>

    <div class="container">
        <h1 class="center-align">Buscar Persona</h1>
        <form action="./action/accionBuscarPersona.php" method="post" class="col s12">

            <div class="input-field">
                <input type="number" name="nroDni" id="nroDni" class="validate" required>
                <label for="nroDni">Ingrese el DNI de la persona</label>
            </div>

            <div class="input-field center-align">
                <button type="submit" class="btn waves-effect waves-light">Buscar Persona</button>
            </div>

            <div class="center-align">
                <a href="../menu.php" class="btn light-blue lighten-2">Volver</a>
            </div>
        </form>
    </div>

        <!-- footer -->
        <?php include_once($ROOT . '/view/components/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.updateTextFields();
        });
    </script>
</body>

</html>