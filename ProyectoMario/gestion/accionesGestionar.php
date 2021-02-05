<?php

    include 'recogerDatos.php';

    //CONEXIÓN CON LA BASE DE DATOS
    include 'conexionBDMadre.php';
    
    //CREACIÓN DE VARIABLES
    $conexionExitosa = true;
    $opcion1; $opcion2; $opcion3;
    if(empty($anyo)) $anyo = null;
    if(empty($potencia)) $potencia = null;

    //ELEGIR OPCIONES DEL PROCEDIMIENTO MADRE
    if(isset($_REQUEST['insertar']))
    {
        $opcion1 = "INSERTAR";
        $opcion2 = "";
        $opcion3 = "";
    }

    else if(isset($_REQUEST['borrarAventura']))
    {
        $opcion1 = "ELIMINAR";
        $opcion2 = "AVENTURA";

        if($modoA == 'completo')
            $opcion3 = "COMPLETO";
        else if($modoA == 'normal')
            $opcion3 = "NORMAL";
    }

    else if(isset($_REQUEST['borrarPlataforma']))
    {
        $opcion1 = "ELIMINAR";
        $opcion2 = "PLATAFORMA";

        if($modoP == 'completo')
            $opcion3 = "COMPLETO";
        else if($modoP == 'normal')
            $opcion3 = "NORMAL";
    }

    else if(isset($_REQUEST['consultarAventura']))
    {
        $opcion1 = "CONSULTAR";
        $opcion2 = "AVENTURA";
        $opcion3 = "";
    }

    else if(isset($_REQUEST['consultarPlataforma']))
    {
        $opcion1 = "CONSULTAR";
        $opcion2 = "PLATAFORMA";
        $opcion3 = "";
    }

    //ASIGNACIÓN DE VARIABLES 
    include 'asignarVariablesAMadre.php';

    //EJECUTAR COMANDO EN BASE DE DATOS
    $conexionExitosa = @oci_execute($stid);

    //CAPTAR ERRORES DE CONEXIÓN
    if(! $conexionExitosa)
    {
        $error = oci_error($stid);
        $resultado = $error['message'];
        $resultado = substr($resultado, strpos($resultado, 'ORA-') + 11);
        $resultado = substr($resultado, 0, strpos($resultado, 'ORA-') - 1);
        echo $resultado;
    }

    //MOSTRAR CONSULTAS
    else if($resultado == null)
    {
        $resultado = 'GESTIÓN REALIZADA CON ÉXITO!';

        if(isset($_REQUEST['consultarAventura']))
        {
            $mostrarFormulario = false;
            
            echo '<div class="aventura">';
            echo '<h2>AVENTURA: ' . $tablaBusqueda[0] . ' ( ' . $tablaBusqueda[2] . ' )</h2>';
            if (! empty($tablaBusqueda[1]) && file_exists('../imagenes/Aventuras/' . $tablaBusqueda[1]))
                echo '<p><img class="imagenEntidad" src="../imagenes/Aventuras/' . $tablaBusqueda[1] . '" alt="' . $tablaBusqueda[1] . '"></p>';
            else
                echo '<p><img class="imagenEntidad" src="../imagenes/Aventuras/ImagenNoDisponible.png" alt="' . $tablaBusqueda[1] . '"></p>';
            echo '<h3>DESCRIPCIÓN</h3>';
            echo '<p>' . $tablaBusqueda[3] . '</p>';
            echo '<h3>OBJETIVO</h3>';
            echo '<p>' . $tablaBusqueda[4] . '</p>';

            if($tablaBusqueda[5] != null)
            {
                echo '<h3>TÍTULO REMAKE</h3>';
                echo '<p>' . $tablaBusqueda[5] . '</p>';
                echo '<h3>IMPLEMENTACIÓN</h3>';
                echo '<p>' . $tablaBusqueda[6] . '</p>';
            }

            echo '<h3>LISTADO DE PLATAFORMAS COMPATIBLES:</h3>';
            echo '<table>';
            echo '<tr><th>NOMBRE</th><th>POTENCIA</th></tr>';
            oci_execute($tablaCoincidencias);
            while ($fila = oci_fetch_array($tablaCoincidencias, OCI_ASSOC)) 
            { 
                if(isset($fila['POTENCIA']))
                    echo '<tr><td>' . $fila['NOMBRE'] . '</td><td>' . $fila['POTENCIA'] . ' MHz.</td></tr>';
                else
                    echo '<tr><td>' . $fila['NOMBRE'] . '</td><td></td></tr>';
            }
            echo '</table>';
            echo '</div>';
        }

        else if(isset($_REQUEST['consultarPlataforma']))
        {
            $mostrarFormulario = false;
            
            echo '<div class="plataforma">';
            echo '<h2>PLATAFORMA: ' . $tablaBusqueda[0] . ' ( ' . $tablaBusqueda[1] . ' MHz.)</h2>';

            echo '<h3>LISTADO AVENTURAS DISPONIBLES:</h3>';
            echo '<table>';
            echo '<tr><th>TÍTULO</th><th>AÑO</th></tr>';
            oci_execute($tablaCoincidencias);
            while ($fila = oci_fetch_array($tablaCoincidencias, OCI_ASSOC)) 
            { 
                if(isset($fila['ANYO']))
                    echo '<tr><td>' . $fila['TITULO'] . '</td><td>' . $fila['ANYO'] . '</td></tr>';
                else
                    echo '<tr><td>' . $fila['TITULO'] . '</td><td></td></tr>';
            }
            echo '</table>';
            echo '</div>';
        }
    }

    //MOSTRAR MENSAJE DE ESTADO
    if($resultado != null)
    {
    
    ?>

    <script>alert(' <?=$resultado?> ');</script>

    <?php

    }

    //LIBERACIÓN DE RECURSOS
    oci_free_statement($stid);
    oci_close($conexion);

?>