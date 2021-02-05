<script>
    function añadirOpcionALista(select, value, text, id)
    {
        nuevaOpcion = document.createElement("option");
        nuevaOpcion.text = text;
        nuevaOpcion.value = value;
        nuevaOpcion.id = id;
        select.options.add(nuevaOpcion);
    }

    function crearSelectPowerUps(nodoDestino, name, id)
    {
        let nuevaSelect = document.createElement('select');
        nuevaSelect.name = name;
        nuevaSelect.id = id;
    <?php
        include '../../conexionBD.php';

        //RELLENAMOS LA SELECT DE POWER-UPS
        $stid = oci_parse($conexion, 'begin :A_OBJETOS := ESTADISTICAS.LISTAR_POWER_UPS(); end;');
        $cursorObjetos = oci_new_cursor($conexion);
        oci_bind_by_name($stid, ":A_OBJETOS", $cursorObjetos, -1, OCI_B_CURSOR);

        //EJECUTAR COMANDO EN BASE DE DATOS
        $conexionExitosa = @oci_execute($stid);
        @oci_execute($cursorObjetos);

        //CAPTAR ERRORES DE CONEXIÓN
        if(! $conexionExitosa)
        {
            include 'capturarErrorBD.php';
    ?>
            alert("<?= $error ?>");
    <?php
        }

        else
        {
            while ($fila = oci_fetch_array($cursorObjetos, OCI_ASSOC))
            {
    ?>
                añadirOpcionALista(nuevaSelect,<?= '"' . $fila['CODIGO'] . '","' . $fila['NOMBRE'] . '","' .  $fila['CODIGO'] . '"'?>);
    <?php
            }
        }

        //LIBERACIÓN DE RECURSOS
        oci_free_statement($stid);
        oci_close($conexion);
    ?>
        nodoDestino.append(nuevaSelect);
    }


    function crearSelectAventuras(nodoDestino, name, id)
    {
        let nuevaSelect = document.createElement('select');
        nuevaSelect.id = id;
        nuevaSelect.name = name;
    <?php
        include '../../conexionBD.php';

        //RELLENAMOS LA SELECT DE AVENTURAS
        $stid = oci_parse($conexion, 'begin :ARRAY_DATOS := ESTADISTICAS.LISTAR_AVENTURAS(); end;');
        oci_bind_array_by_name($stid, ":ARRAY_DATOS", $arrayDatos, 1000, 50, SQLT_CHR);

        //EJECUTAR COMANDO EN BASE DE DATOS
        $conexionExitosa = @oci_execute($stid);

        //CAPTAR ERRORES DE CONEXIÓN
        if(! $conexionExitosa)
        {
            include 'capturarErrorBD.php';
            ?>
            alert('<?= $error ?>');
            <?php
        }

        else
            for($i = 0; $i < count($arrayDatos); $i++)
            {
                ?>
                añadirOpcionALista(nuevaSelect,<?= '"' . $arrayDatos[$i] . '","' . $arrayDatos[$i] . '","' . $arrayDatos[$i] . '"'?>)
                <?php
            }

        //LIBERACIÓN DE RECURSOS
        oci_free_statement($stid);
        oci_close($conexion);
    ?>
        nodoDestino.append(nuevaSelect);
    }

    function crearSelectPersonajes(nodoDestino, name, id)
    {
        let nuevaSelect = document.createElement('select');
        nuevaSelect.id = id;
        nuevaSelect.name = name;
    <?php
        include '../../conexionBD.php';

        //RELLENAMOS LA SELECT DE PERSONAJES
        $stid = oci_parse($conexion, 'begin :C_OBJETOS := ESTADISTICAS.LISTAR_PERSONAJES(); end;');
        $cursorPersonajes = oci_new_cursor($conexion);
        oci_bind_by_name($stid, ":C_OBJETOS", $cursorPersonajes, -1, OCI_B_CURSOR);
    
        //EJECUTAR COMANDO EN BASE DE DATOS
        $conexionExitosa = @oci_execute($stid);
        @oci_execute($cursorPersonajes);

        //CAPTAR ERRORES DE CONEXIÓN
        if(! $conexionExitosa)
        {
            include 'capturarErrorBD.php';
    ?>
            alert("<?= $error ?>");
    <?php
        }
    
        else
        {
            while ($fila = oci_fetch_array($cursorPersonajes, OCI_ASSOC))
            {
    ?>
                añadirOpcionALista(nuevaSelect,<?= '"' . $fila['NOMBRE_JAP'] . '","' . $fila['NOMBRE_ESP'] . '","' . $fila['IMAGEN'] . '"' ?>);
    <?php
            }
        }

        //LIBERACIÓN DE RECURSOS
        oci_free_statement($stid);
        oci_close($conexion);
    ?>
        nodoDestino.append(nuevaSelect);
    }
</script>