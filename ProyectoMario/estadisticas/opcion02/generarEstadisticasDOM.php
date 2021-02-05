<script>

window.onload = function()
{
    <?php include '../../conexionBD.php'; ?>
    let opcionElegida = '<?= $_REQUEST['opcion'] ?>';

    function generarEstadisticaParametrizada()
    {
        <?php
            //VINCULAMOS VARIABLES
            $stid = oci_parse($conexion, 'begin ESTADISTICAS.LISTA_PER_OBJ_HAB(:V_PERSONAJE, :C_DATOS_DEVUELTOS); end;');
            $nombrePersonaje = $_REQUEST['selectPersonaje']; 
            oci_bind_by_name($stid,":V_PERSONAJE",$nombrePersonaje);
            $cursorAventuras = oci_new_cursor($conexion);
            oci_bind_by_name($stid, ":C_DATOS_DEVUELTOS", $cursorAventuras, -1, OCI_B_CURSOR);
        
            //EJECUTAR COMANDO EN BASE DE DATOS
            $conexionExitosa = @oci_execute($stid);
            @oci_execute($cursorAventuras);
            
            //CAPTAR ERRORES DE CONEXIÓN
            if(! $conexionExitosa)
            {
                include '../capturarErrorBD.php';
    ?>
                alert("<?= $error ?>");
    <?php
            }
        
            else
            {
    ?>
                //CREACIÓN DEL CONTENEDOR DE LAS TABLAS Y SU IMAGEN DE PORTADA
                let contenedorEstadisticas = document.createElement('div');
                contenedorEstadisticas.id = 'contenedorEstadistica';
                let imagenPersonaje = document.createElement('img');
                imagenPersonaje.classList.add('imagenEntidad');
    <?php
                if (file_exists('../../imagenes/Personajes/' . $_REQUEST['imagenPersonaje']))
                {
    ?>
                    imagenPersonaje.src = '../../imagenes/Personajes/<?= $_REQUEST['imagenPersonaje'] ?>';
    <?php
                }

                else
                {
    ?>
                    imagenPersonaje.src = '../../imagenes/Personajes/ImagenNoDisponible.png';
    <?php
                }
    ?>
                contenedorEstadisticas.appendChild(imagenPersonaje);

                let tablaAventura, titulo, filaHabilidadesTitulo, columnaHabilidadesTitulo, listaHabilidades, filaHabilidadesDatos, columnaHabilidadesDatos;
    <?php
                $hayAventuras = false;
                while ($fila = oci_fetch_array($cursorAventuras, OCI_ASSOC))
                {
                    $hayAventuras = true;

    ?>
                    tablaAventura = document.createElement('table');

                    titulo = document.createElement('caption');
                    titulo.appendChild(document.createTextNode('<?= $fila['COD_NOMBRE'] ?>'));
                    tablaAventura.appendChild(titulo);

                    filaHabilidadesTitulo = document.createElement('tr');
                    columnaHabilidadesTitulo = document.createElement('th');
                    columnaHabilidadesTitulo.appendChild(document.createTextNode('HABILIDADES DE' + ('<?= $fila['COD_NOMBRE'] ?>').substring(('<?= $fila['COD_NOMBRE'] ?>').lastIndexOf(')') + 1)));
                    filaHabilidadesTitulo.appendChild(columnaHabilidadesTitulo);
                    tablaAventura.appendChild(filaHabilidadesTitulo);

    <?php 
                    if(isset($fila['HABILIDADES']))
                    {
    ?>
                        listaHabilidades = '<?= $fila['HABILIDADES'] ?>';
                        listaHabilidades = listaHabilidades.split(",");
                        for(let i = 0; i < listaHabilidades.length; i++)
                        {
                            filaHabilidadesDatos = document.createElement('tr');
                            columnaHabilidadesDatos = document.createElement('td');
                            columnaHabilidadesDatos.appendChild(document.createTextNode(listaHabilidades[i]));
                            filaHabilidadesDatos.appendChild(columnaHabilidadesDatos);
                            tablaAventura.appendChild(filaHabilidadesDatos);
                        }
    <?php
                    }

                    else
                    {
    ?>
                        filaHabilidadesDatos = document.createElement('tr');
                        columnaHabilidadesDatos = document.createElement('td');
                        columnaHabilidadesDatos.appendChild(document.createTextNode('(SIN HABILIDADES)'));
                        filaHabilidadesDatos.appendChild(columnaHabilidadesDatos);
                        tablaAventura.appendChild(filaHabilidadesDatos);
    <?php
                    }
    ?>
                    contenedorEstadisticas.appendChild(tablaAventura);
    <?php
                }

                if(! $hayAventuras)
                {
    ?>
                    let mensajeParrafo = document.createElement('p');
                    mensajeParrafo.classList.add('error');
                    let mensajeParrafoTexto = document.createTextNode('NO ES COMPATIBLE CON NINGÚN OBJETO HASTA EL MOMENTO');
                    mensajeParrafo.appendChild(mensajeParrafoTexto);
                    document.body.insertBefore(mensajeParrafo,document.body.lastChild.previousSibling);
    <?php 
                }
                
                else
                {
    ?>
                    document.body.insertBefore(contenedorEstadisticas, document.body.lastChild.previousSibling);
    <?php
                }
            }
    ?>
    }

    function generarEstadisticaMedianteVariable()
    {
    <?php
            //VINCILAMOS VARIABLES
            $stid = oci_parse($conexion, 'begin ESTADISTICAS.LISTA_PERS_OBJ_COMPAT(:V_PERSONAJE, :C_DATOS_DEVUELTOS); end;');
            $nombrePersonaje = $_REQUEST['selectPersonaje']; 
            oci_bind_by_name($stid,":V_PERSONAJE",$nombrePersonaje);
            $cursorAventuras = oci_new_cursor($conexion);
            oci_bind_by_name($stid, ":C_DATOS_DEVUELTOS", $cursorAventuras, -1, OCI_B_CURSOR);
        
            //EJECUTAR COMANDO EN BASE DE DATOS
            $conexionExitosa = @oci_execute($stid);
            @oci_execute($cursorAventuras);

            //CAPTAR ERRORES DE CONEXIÓN
            if(! $conexionExitosa)
            {
                include '../capturarErrorBD.php';
    ?>
                alert("<?= $error ?>");
    <?php
            }
        
            else
            {
    ?>
                //CREACIÓN DEL CONTENEDOR DE LAS TABLAS Y SU IMAGEN DE PORTADA
                let contenedorEstadisticas = document.createElement('div');
                contenedorEstadisticas.id = 'contenedorEstadistica';
                let imagenPersonaje = document.createElement('img');
                imagenPersonaje.classList.add('imagenEntidad');
    <?php
                if (file_exists('../../imagenes/Personajes/' . $_REQUEST['imagenPersonaje']))
                {
    ?>
                    imagenPersonaje.src = '../../imagenes/Personajes/<?= $_REQUEST['imagenPersonaje'] ?>';
    <?php
                }

                else
                {
    ?>
                    imagenPersonaje.src = '../../imagenes/Personajes/ImagenNoDisponible.png';
    <?php
                }
    ?>
                contenedorEstadisticas.appendChild(imagenPersonaje);

                let tablaAventura, titulo, filaObjetosTitulo, columnaObjetosTitulo, listaObjetos, filaObjetosDatos, columnaObjetosDatos;
    <?php
                $hayAventuras = false;
                while ($fila = oci_fetch_array($cursorAventuras, OCI_ASSOC))
                {
                    $hayAventuras = true;

    ?>
                    tablaAventura = document.createElement('table');

                    titulo = document.createElement('caption');
                    titulo.appendChild(document.createTextNode('<?= $fila['TITULO_AVENTURA'] ?>'));
                    tablaAventura.appendChild(titulo);

                    filaObjetosTitulo = document.createElement('tr');
                    columnaObjetosTitulo = document.createElement('th');
                    columnaObjetosTitulo.appendChild(document.createTextNode('OBJETOS COMPATIBLES EN LA MISMA'));
                    filaObjetosTitulo.appendChild(columnaObjetosTitulo);
                    tablaAventura.appendChild(filaObjetosTitulo);

    <?php 
                    if(isset($fila['OBJETOS_COMPATIBLES']))
                    {
    ?>
                        listaObjetos = '<?= $fila['OBJETOS_COMPATIBLES'] ?>';
                        listaObjetos = listaObjetos.split(",");
                        for(let i = 0; i < listaObjetos.length; i++)
                        {
                            filaObjetosDatos = document.createElement('tr');
                            columnaObjetosDatos = document.createElement('td');
                            columnaObjetosDatos.appendChild(document.createTextNode(listaObjetos[i]));
                            filaObjetosDatos.appendChild(columnaObjetosDatos);
                            tablaAventura.appendChild(filaObjetosDatos);
                        }
    <?php
                    }

                    else
                    {
    ?>
                        filaObjetosDatos = document.createElement('tr');
                        columnaObjetosDatos = document.createElement('td');
                        columnaObjetosDatos.appendChild(document.createTextNode('(SIN OBJETOS COMPATIBLES)'));
                        filaObjetosDatos.appendChild(columnaObjetosDatos);
                        tablaAventura.appendChild(filaObjetosDatos);
    <?php
                    }
    ?>
                    contenedorEstadisticas.appendChild(tablaAventura);
    <?php
                }

                if(! $hayAventuras)
                {
    ?>
                    let mensajeParrafo = document.createElement('p');
                    mensajeParrafo.classList.add('error');
                    let mensajeParrafoTexto = document.createTextNode('NO APARECE EN NINGUNA AVENTURA HASTA EL MOMENTO');
                    mensajeParrafo.appendChild(mensajeParrafoTexto);
                    document.body.insertBefore(mensajeParrafo,document.body.lastChild.previousSibling);
    <?php 
                }
                
                else
                {
    ?>
                    document.body.insertBefore(contenedorEstadisticas, document.body.lastChild.previousSibling);
    <?php
                }
            }
    ?>
    }

    if(opcionElegida == 'PARAMETRIZADO')
        generarEstadisticaParametrizada();

    else if(opcionElegida == 'MEDIANTE VARIABLE')
        generarEstadisticaMedianteVariable();

    //LIBERACIÓN DE RECURSOS
    <?php
    oci_free_statement($stid);
    oci_close($conexion);
    ?>
}

</script>