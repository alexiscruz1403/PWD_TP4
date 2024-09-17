<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Auto</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="center-align">Buscar Auto </h1>
        <form action="./Action/accionBuscarAuto.php" method="post" class="col s12">
            <div class="input-field col s12">
                <input type="text" name="Patente" id="Patente" required>
                <label for="Patente">Ingrese la patente del auto:</label>
            </div>
            <div class="input-field col s12">
                <input type="submit" class="btn waves-effect waves-light" value="Buscar Auto">
            </div>
            <br>
            <a href="../menu.php" class="btn btn-light">Volver</a>
        </form>
    </div>

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        
        M.AutoInit();
    </script>
</body>
</html>
