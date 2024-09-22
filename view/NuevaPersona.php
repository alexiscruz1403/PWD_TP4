<!DOCTYPE html>
<html lang="es">

<?php include_once("../util/configuracion.php"); ?>


<head>
    <meta charset="UTF-8">
    <title>Nuevo Registro de Persona</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="grey darken-3">

    <?php include_once($ROOT . '/view/components/navbar.php'); ?>

    <main class="row blue-grey lighten-5 z-depth-5">
        <div class="row">
            <h1 class="center-align">Registrar Nueva Persona</h1>
            <form action="./Action/accionNuevaPersona.php" method="post" class="col s12" id="form">
                <div class="input-field col s12 m4 offset-m4 l6 offset-l3">
                    <input type="text" name="nroDni" id="nroDni" class="validate" required>
                    <label for="nroDni">DNI</label>
                </div>

                <div class="input-field col s12 m4 offset-m4 l6 offset-l3">
                    <input type="text" name="apellido" id="apellido" class="validate" required>
                    <label for="apellido">Apellido</label>
                </div>

                <div class="input-field col s12 m4 offset-m4 l6 offset-l3">
                    <input type="text" name="nombre" id="nombre" class="validate" required>
                    <label for="nombre">Nombre</label>
                </div>

                <div class="input-field col s12 m4 offset-m4 l6 offset-l3">
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="validate" required>
                    <label for="fechaNacimiento">Fecha de Nacimiento</label>
                </div>

                <div class="input-field col s12 m4 offset-m4 l6 offset-l3">
                    <input type="number" name="telefono" id="telefono" class="validate" required>
                    <label for="telefono">Teléfono</label>
                </div>

                <div class="input-field col s12 m4 offset-m4 l6 offset-l3">
                    <input type="text" name="domicilio" id="domicilio" class="validate" required>
                    <label for="domicilio">Domicilio</label>
                </div>

                <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4">
                    <input type="submit" class="white-text" value="Registrar Persona">
                </button>

                <br>
            </form>
        </div>
        <a href="../menu.php" class="white-text">
            <button class="btn waves-effect waves-light blue-grey col s10 offset-s1 m4 offset-m4 l4 offset-l4">
                Volver
            </button>
        </a>
    </main>

    <?php include_once($ROOT . '/view/components/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/formValidation.js"></script>

</body>

</html>