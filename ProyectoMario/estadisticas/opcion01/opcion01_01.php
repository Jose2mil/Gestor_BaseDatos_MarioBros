<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MARIO BROS. [OPCIÓN 01 LISTADO]</title>
    <link rel="stylesheet" type="text/css" href="../../estilo/estilo.css">
    <script src="enviarFormulario.js"></script>
</head>
<body>
    <header id="estadistica">
        <a href="../../index.html"><img src="../../imagenes/LogoSuperMarioEstadistica.png" alt="SUPER MARIO"></a>
    </header>
    <form name='formu' method="post" action="opcion01_02.php" onSubmit="guaradarAventura();">
        <fieldset id='contenedorEstadistica'>
            <legend>AVENTURAS EN LAS QUE APARECE</legend>
            <input type="hidden" name="listaAventuras">
                <?php 
                        include '../../conexionBD.php';

                        //VINCILAMOS VARIABLES
                        $stid = oci_parse($conexion, 'begin ESTADISTICAS.AVENTURAS_DE_OBJETO(:CODIGO_OBJETO, :C_AVENTURAS_SALIDA); end;');
                        $codigoObjeto = $_REQUEST['listaPowerUps']; 
                        oci_bind_by_name($stid,":CODIGO_OBJETO",$codigoObjeto);
                        $cursorAventuras = oci_new_cursor($conexion);
                        oci_bind_by_name($stid, ":C_AVENTURAS_SALIDA", $cursorAventuras, -1, OCI_B_CURSOR);
                    
                        //EJECUTAR COMANDO EN BASE DE DATOS
                        $conexionExitosa = @oci_execute($stid);
                        @oci_execute($cursorAventuras);

                        //CAPTAR ERRORES DE CONEXIÓN
                        if(! $conexionExitosa)
                        {
                            include '../capturarErrorBD.php';
                ?>
                            <script>alert("<?= $error ?>");</script>
                <?php
                        }
                    
                        else
                        {
                            $hayAventuras = false;
                            while ($fila = oci_fetch_array($cursorAventuras, OCI_ASSOC))
                            {
                                $hayAventuras = true;

                                echo '<table>';
                                echo '<caption>' . $fila['TITULO'] . '</caption>';
                                echo '<tr><th>PAISES DE LANZAMIENTO (' . $fila['PAISES_CAL_SUP'] . ' TIENEN UNA CRÍTICA SUPERIOR A LA MEDIA)</th></tr>';
                                echo '<tr><td>' . $fila['PAISES_LISTA'] . '</td></tr>';
                                echo '<tr><th>PLATAFORMAS PARA LAS QUE SE HA CREADO</th></tr>';
                                echo '<tr><td>' . $fila['PLATAFORMAS_LISTA'] . '</td></tr>';
                                echo '<tr><th>' . $fila['CANTIDAD_MUNDOS'] . ' MUNDOS Y ' . $fila['CANTIDAD_NIVELES']  . ' NIVELES.</th></tr>';
                                echo '<tr><th>' . $fila['NUMERO_ALIADOS'] . ' ENEMIGOS Y ' . $fila['NUMERO_ENEMIGOS']  . ' ALIADOS.</th></tr>';
                                echo '<tr><td><input class="botonVerPorcentajes" type="button" value="VER APARICIÓN DE OBJETOS EN ' . $fila['TITULO'] . '" onClick="mandarFomulario(\''. $fila['TITULO'] . '\');"></td></tr>';
                                echo '</table>';
                            }

                            if(! $hayAventuras)
                                echo '<p>NO APARECE EN NINGUNA AVENTURA HASTA EL MOMENTO</p>';
                        }

                        //LIBERACIÓN DE RECURSOS
                        oci_free_statement($stid);
                        oci_close($conexion);
                ?>
        </fieldset>
    </form>
    <div id="footer">
        <a id="botonAtras" href="opcion01.php">Volver</a>
    </div>
</body>
</html>