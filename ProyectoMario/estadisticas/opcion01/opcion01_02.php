<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MARIO BROS. [OPCIÓN 01 GRÁFICA OBJETOS]</title>
    <link rel="stylesheet" type="text/css" href="../../estilo/estilo.css">
    <script src="Chart.js"></script>
    <?php include "../crearSelect.php"; ?>
    <script src="completarFormularioOpcion01_02.js"></script>
    <?php include 'generadorEstadistica.php'; ?>
</head>
<body>
    <header id="estadistica">
        <a href="../../index.html"><img src="../../imagenes/LogoSuperMarioEstadistica.png" alt="SUPER MARIO"></a>
    </header>

    <form name='formu' method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <fieldset id='opcionesGrafica'>
            <legend>SELECTOR AVENTURA</legend>
        </fieldset>
    </form>

    <div id='contenedorGrafica'>
        <h2></h2>
        <canvas id='grafica'></canvas>
    </div>
    <div id="footer">
        <a id="botonAtras" href="../estadistica.html">Volver al menú</a>
    </div>
</body>
</html>