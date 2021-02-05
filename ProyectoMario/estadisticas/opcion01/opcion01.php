<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MARIO BROS. [OPCIÓN 01]</title>
    <link rel="stylesheet" type="text/css" href="../../estilo/estilo.css">
    <?php include "../crearSelect.php"; ?>
    <script src="completarFormularioOpcion01.js"></script>
</head>
<body>
    <header id="estadistica">
        <a href="../../index.html"><img src="../../imagenes/LogoSuperMarioEstadistica.png" alt="SUPER MARIO"></a>
    </header>

    <form name='formu' method="post" action="opcion01_01.php">
        <fieldset id='opcionesGrafica'>
            <legend>LISTAR POR POWER-UP</legend>
            <label for="listaPowerUps">POWER-UP: </label>
        </fieldset>
    </form>
    <div id="footer">
        <a id="botonAtras" href="../estadistica.html">Volver al menú</a>
    </div>
</body>
</html>