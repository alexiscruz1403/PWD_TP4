<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Registro de Persona</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
        <h1 class="center-align">Registrar Nueva Persona</h1>
        <form action="./Action/accionNuevaPersona.php" method="post" class="col s12">
        
            <div class="input-field">
                <input type="text" name="nroDni" id="nroDni" class="validate" required>
                <label for="nroDni">DNI</label>
            </div>
          
            <div class="input-field">
                <input type="text" name="apellido" id="apellido" class="validate" required>
                <label for="apellido">Apellido</label>
            </div>
            
            <div class="input-field">
                <input type="text" name="nombre" id="nombre" class="validate" required>
                <label for="nombre">Nombre</label>
            </div>
            
            <div class="input-field">
                <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="validate" required>
                <label for="fechaNacimiento">Fecha de Nacimiento</label>
            </div>
            
            <div class="input-field">
                <input type="number" name="telefono" id="telefono" class="validate" required>
                <label for="telefono">Teléfono</label>
            </div>
            
            <div class="input-field">
                <input type="text" name="domicilio" id="domicilio" class="validate" required>
                <label for="domicilio">Domicilio</label>
            </div>
            
            <div class="input-field center-align">
                <button type="submit" class="btn waves-effect waves-light">Registrar Persona</button>
            </div>
            
            <div class="center-align">
                <a href="../menu.php" class="btn light-blue lighten-2">Volver</a>
            </div>
        </form>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            M.updateTextFields();  
        });
    </script>
</body>
</html>
