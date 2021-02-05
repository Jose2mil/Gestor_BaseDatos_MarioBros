<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MARIO BROS. [OPCIÓN 03 RESULTADO]</title>
    <link rel="stylesheet" type="text/css" href="../../estilo/estilo.css">
    <script src="completarFormularioOpcion03_01.js"></script>
    <?php include 'funciones.php' ?>
</head>
<body>
    <header id="estadistica">
        <a href="../../index.html"><img src="../../imagenes/LogoSuperMarioEstadistica.png" alt="SUPER MARIO"></a>
    </header>
    <div id="contenedorEstadistica">
    <?php 
        include '../../conexionBD.php';

        $stid = oci_parse($conexion, 'begin ESTADISTICAS.BUSCAR_AVENTURA(:V_SUBCADENA , :V_CADENA_BUSQUEDA , 
            :N_ANYO_MIN , :N_ANYO_MAX , :V_TITULO_REMAKE, :V_POWER_UP , :V_PERSONAJE ,
            :N_FILA_INICIO , :N_NUM_REGISTROS , :C_DATOS_DEVUELTOS, :COINCIDENCIAS); end;');
        //CREACIÓN DE VARIABLES
        $subcadena; $opcionSubcadena; $fechaMin; $fechaMax; $listaRemakes; $listaPowerUps; 
            $listaPersonajes; $numFilaInicial = 1; $numRegistros = 4; $coincidencias;
        //ASIGNACIÓN DE VALOR
        if(isset($_REQUEST['subcadena'])) 
            $subcadena = $_REQUEST['subcadena'];
        if(isset($_REQUEST['opcionSubcadena'])) 
            $opcionSubcadena = $_REQUEST['opcionSubcadena'];
        if(isset($_REQUEST['fechaMin'])) 
            $fechaMin = $_REQUEST['fechaMin'];
        if(isset($_REQUEST['fechaMax'])) 
            $fechaMax = $_REQUEST['fechaMax'];
        if(isset($_REQUEST['listaRemakes'])) 
            $listaRemakes = $_REQUEST['listaRemakes'];
        if(isset($_REQUEST['listaPowerUps'])) 
            $listaPowerUps = $_REQUEST['listaPowerUps'];
        if(isset($_REQUEST['listaPersonajes'])) 
            $listaPersonajes = $_REQUEST['listaPersonajes'];
        if(isset($_REQUEST['numFilaInicial'])) 
            $numFilaInicial = $_REQUEST['numFilaInicial'];
        //VINCILAMOS VARIABLES
        oci_bind_by_name($stid,":V_SUBCADENA",$subcadena);
        oci_bind_by_name($stid,":V_CADENA_BUSQUEDA",$opcionSubcadena);
        oci_bind_by_name($stid,":N_ANYO_MIN",$fechaMin);
        oci_bind_by_name($stid,":N_ANYO_MAX",$fechaMax);
        oci_bind_by_name($stid,":V_TITULO_REMAKE",$listaRemakes);
        oci_bind_by_name($stid,":V_POWER_UP",$listaPowerUps);
        oci_bind_by_name($stid,":V_PERSONAJE",$listaPersonajes);
        oci_bind_by_name($stid,":N_FILA_INICIO",$numFilaInicial);
        oci_bind_by_name($stid,":N_NUM_REGISTROS",$numRegistros);
        $cursorAventuras = oci_new_cursor($conexion);
        oci_bind_by_name($stid, ":C_DATOS_DEVUELTOS", $cursorAventuras, -1, OCI_B_CURSOR);
        oci_bind_by_name($stid,":COINCIDENCIAS",$coincidencias);
    
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
    
        else if($coincidencias > 0)
        {
            while ($fila = oci_fetch_array($cursorAventuras, OCI_ASSOC))
            {
                if($coincidencias <= 4)
                    escribirTablaCompleta($fila);

                else if($coincidencias <= 8)
                    escribirTablaMedia($fila);

                else
                    escribirTablaCorta($fila);
            }
        }

        else 
        {
                echo '<p>SIN COINCIDENCIAS :\'(</p>';
        }

        //LIBERACIÓN DE RECURSOS
        oci_free_statement($stid);
        oci_close($conexion);
    ?>
    </div>
    
    <form name="formuIndice" action="" id="opcionesGrafica">
        <input type="hidden" name="subcadena" value="<?= $subcadena?>">
        <input type="hidden" name="opcionSubcadena" value="<?= $opcionSubcadena?>">
        <input type="hidden" name="fechaMin" value="<?= $fechaMin?>">
        <input type="hidden" name="fechaMax" value="<?= $fechaMax?>">
        <input type="hidden" name="listaRemakes" value="<?= $listaRemakes?>">
        <input type="hidden" name="listaPowerUps" value="<?= $listaPowerUps?>">
        <input type="hidden" name="listaPersonajes" value="<?= $listaPersonajes?>">
        <input type="hidden" name="numFilaInicial" value="<?= $numFilaInicial?>">
        <input type="hidden" name="numRegistros" value="<?= $numRegistros?>">
        <input type="hidden" name="coincidencias" value="<?= $coincidencias?>">

        <input type="button" name="anterior" value="ANTERIOR">
        <input type="button" name="siguiente" value="SIGUIENTE">
    </form>
    <div id="footer">
        <a id="botonAtras" href="../estadistica.html">Volver al menú</a>
    </div>
</body>
</html>