<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MARIO BROS. [OPCIÓN 03]</title>
    <link rel="stylesheet" type="text/css" href="../../estilo/estilo.css">
    <?php include "../crearSelect.php"; ?>
    <script src="completarFormularioOpcion03.js"></script>
</head>
<body>
    <header id="estadistica">
        <a href="../../index.html"><img src="../../imagenes/LogoSuperMarioEstadistica.png" alt="SUPER MARIO"></a>
    </header>
    <form name='formu' method="post" onsubmit="return combrobarFechas()" action='opcion03_01.php'>
        <fieldset id='opcionesGrafica'>
            <legend>BUSCADOR</legend>
                <div class="filaFormulario">
                    SUBCADENA <input name="subcadena" type="text">
                    <input name="opcionSubcadena" type="radio" value="TITULO" checked> TÍTULO
                    <input name="opcionSubcadena" type="radio" value="DESCRIPCION"> DESCRIPCIÓN
                </div>
                <div class="filaFormulario">
                    <input type="number" min="1983" max="2021" name="fechaMin"> =< AÑO =< <input type="number" min="1983" max="2021" name="fechaMax">
                </div>
                <div id="contenedorListaRemakes" class="filaFormulario">
                    <label for="">TÍTULO ORIGINAL: </label>
                </div>
                <div id="contenedorlistaPowerUps" class="filaFormulario">
                    <label for="">POWER-UP: </label>
                </div>
                <div id="contenedorListaPersonajes" class="filaFormulario">
                    <label for="">PERSONAJE: </label>
                </div>
                <div class="filaFormulario">
                    <input type="submit" name="BUSCAR" value="BUSCAR">
                    <input type="reset" name="VACIAR" value="VACIAR">
                </div>
        </fieldset>
    </form>
    <div id="footer">
        <a id="botonAtras" href="../estadistica.html">Volver al menú</a>
    </div>
</body>
</html>