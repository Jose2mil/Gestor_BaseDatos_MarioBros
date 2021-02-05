<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MARIO BROS. [OPCIÓN 02]</title>
    <link rel="stylesheet" type="text/css" href="../../estilo/estilo.css">
    <?php 
    if(! isset($_REQUEST['selectPersonaje'])) 
    { 
        include "../crearSelect.php";
    ?>
        <script src="completarFormularioOpcion02.js"></script>
    <?php 
    } 
    ?>
</head>
<body>
    <header id="estadistica">
        <a href="../../index.html"><img src="../../imagenes/LogoSuperMarioEstadistica.png" alt="SUPER MARIO"></a>
    </header>

    <?php
    if(! isset($_REQUEST['opcion']))
    {
    ?>
    <form name='formu' method="post" action=<?=$_SERVER['PHP_SELF']?>>
        <fieldset id='opcionesGrafica'>
            <legend>ESTADISTICAS</legend>
                <div class="filaFormulario">
                    PARAMETRIZADO <input name="opcion" type="radio" value="PARAMETRIZADO" checked>
                    <input name="opcion" type="radio" value="MEDIANTE VARIABLE"> MEDIANTE VARIABLE
                    <input type="hidden" name="imagenPersonaje" id="imagenPersonaje">
                </div>
        </fieldset>
    </form>
    <?php
    }

    else
    {
        include 'generarEstadisticasDOM.php';
    }
    ?>
    <div id="footer">
        <a id="botonAtras" href="../estadistica.html">Volver al menú</a>
    </div>
</body>
</html>