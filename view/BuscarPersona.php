<!DOCTYPE html>
<html lang="es">

<?php include_once("../util/configuracion.php"); ?>

<head>
    <meta charset="UTF-8">
    <title>Buscar Persona</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body class="grey darken-3">

    <!-- navbar -->
    <?php include_once($ROOT . '/view/components/navbar.php'); ?>

    <main class="row blue-grey lighten-5 z-depth-5">
        <h1 class="center-align">Buscar Persona</h1>
        <form action="./Action/accionBuscarPersona.php" method="post" class="col s12" id="form">
        <div class="input-field col s12 m4 offset-m4 l6 offset-l3">
                <input type="number" name="nroDni" id="nroDni" class="validate" required>
                <label for="nroDni">Ingrese el DNI de la persona</label>
            </div>

            <button type="submit" type="submit" class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4">Buscar Persona</button>
            </form>
        </div>
        <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4"><a href="../menu.php" class="white-text">Volver</a></button>
    </main>

        <!-- footer -->
        <?php include_once($ROOT . '/view/components/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.updateTextFields();
        });
    </script>
    <script src="js/formValidation.js"></script>
</body>

</html>