<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MARIO BROS. [GESTION]</title>
    <!--metas para evitar problemas al refrescar pantalla en el navegador !-->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <script src="funcionesRellenar.js"></script>
    <link rel="stylesheet" type="text/css" href="../estilo/estilo.css">
</head>
<body>
    <header id="gestion">
        <a href="../index.html"><img src="../imagenes/LogoSuperMarioGestionar.png" alt="SUPER MARIO"></a>
    </header>

    <?php
    
    //VARIABLES NECESARIAS
    $mostrarFormulario = true;
    $hayErrores = false;
    $formularioEnviado = false;
    $errores = "";
    $bloquearCamposA = false;
    $bloquearCamposP = false;
        //Aventura
    $titulo = $portada = $anyo = $descripcion = $objetivo = $tituloRemake = $implementacion = null;
    $modoA;
        //Plataforma
    $nombre = $potencia = null;
    $modoP;

    //Comprobar si hay un envio de formulario
    if(isset($_REQUEST['insertar']) || 
            isset($_REQUEST['borrarAventura']) || 
            isset($_REQUEST['consultarPlataforma']) ||
            isset($_REQUEST['borrarPlataforma']) || 
            isset($_REQUEST['consultarAventura']))
        $formularioEnviado = true;

    //VALIDACIONES DE FORMULARIO
    if(isset($_REQUEST['insertar']))
    {
        include 'validarAventura.php';
        include 'validarPlataforma.php';
    }

    //MOSTRAR ERRORES, SI LOS HAY
    if(! empty($errores))
        $errores = substr($errores, 1);

    if($hayErrores)
    {
        $errores = explode(';',$errores);
        echo '<div class="error">';
        echo '<h2>HAY ERRORES</h2>';
        echo '<ul>';
        
        for($i = 0; $i < count($errores); $i= $i + 1)
            echo "<li>".$errores[$i]."</li>";
        
        echo '</ul>';
        echo '</div>';
    }

    //RELLENAR CAMPOS SI SE INTRODUCE UNA PK VÁLIDA
    if(isset($_REQUEST['rellenar']))
    {
        $rellenar = $_REQUEST['rellenar'];
        if($rellenar == 'aventura' || $rellenar == 'plataforma')
        {
            include 'recogerDatos.php';
            include 'rellenarFormulario.php';
        }
    }

    //SIMULACIÓN DE UNA SEGUNDA PANTALLA
    if ($formularioEnviado && !$hayErrores)
        include 'accionesGestionar.php';

    if($mostrarFormulario)
    {

    ?>

    <form name="formu" method="post" action=<?= $_SERVER['PHP_SELF'] ?> >
    <input name="rellenar" type="hidden">
    <input name="bloquearCamposA" type="hidden" value="<?=$bloquearCamposA?>">
    <input name="bloquearCamposP" type="hidden" value="<?=$bloquearCamposP?>">
        <fieldset class="aventura">
            <legend>AVENTURA</legend>

            <div class="filaFormulario">
                <label for="titulo">Título: </label>
                <input name="titulo" type="text" value="<?=$titulo?>">

                <label for="portada">Portada: </label>
                <input name="portada" type="text" value="<?=$portada?>">

                <label for="anyo">Año: </label>
                <input name="anyo" type="text" value="<?=$anyo?>">
            </div>

            <div class="filaFormulario">
                <label id="labelDescripcion" for="descripcion">Descripción: </label>
                <label class="columnaDerecha" for="objetivo">Objetivo: </label>
            </div>
            <div class="filaFormulario">
                <textarea name="descripcion" cols="30" rows="10"><?=$descripcion?></textarea>
                <textarea class="columnaDerecha" name="objetivo" cols="30" rows="10"><?=$objetivo?></textarea>
            </div>

            <div class="filaFormulario">
                <label for="tituloRemake">Título Remake: </label>
                <input name="tituloRemake" type="text" value="<?=$tituloRemake?>">
            </div>

            <label class="filaFormulario" for="implementacion">Implementación: </label>
            <textarea class="filaFormulario" name="implementacion" cols="30" rows="10"><?=$implementacion?></textarea>

            <input name="borrarAventura" type="submit" value='BORRAR AVENTURA'>
            <div class="filaFormulario">
                <input name="modoA" type="radio" value="completo">Borrar en TODA LA BASE DE DATOS
            </div>
            <div class="filaFormulario">
                <input name="modoA" type="radio" value='normal' checked="checked">Borrar solo en "AVENTURAS" y "CREARSE_PARA"
            </div>

            <input name="consultarAventura" type="submit" value='CONSULTAR AVENTURA'> 
        </fieldset>

        <fieldset class="plataforma">
            <legend>PLATAFORMA</legend>
            <div class="filaFormulario">
                <label for="nombre">Nombre: </label>
                <input name="nombre" type="text" value="<?=$nombre?>">
                <label for="potencia">Potencia: </label>
                <input name="potencia" type="text" value="<?=$potencia?>">MHz.
            </div>

            <input name="borrarPlataforma" type="submit" value='BORRAR PLATAFORMA'>
            <div class="filaFormulario">
                <input name="modoP" type="radio" value="completo">Borrar en TODA LA BASE DE DATOS
            </div>
            <div class="filaFormulario">
                <input name="modoP" type="radio" value='normal' checked="checked">Borrar solo en "PLATAFORMAS" y "CREARSE_PARA"
            </div>

            <input name="consultarPlataforma" type="submit" value='CONSULTAR PLATAFORMA'>
        </fieldset>
        <input name="insertar" type="submit" value='INSERTAR EN "CREARSE_PARA"'>
    </form>

    <?php

    }

    ?>

    <div id="footer">
        <a id="botonAtras" href="../index.html">Volver al inicio</a>
    </div>
</body>
</html>