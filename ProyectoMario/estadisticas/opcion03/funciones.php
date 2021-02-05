<?php

function escribirListadoDeDtosEnTabla($titulo, $datosString)
{
    echo "<tr><th>$titulo</th></tr>";
    $arrayDatos = explode(';',$datosString);
    foreach($arrayDatos as $dato)
        echo "<tr><td>$dato</td></tr>";
}

function escribirTablaCompleta($fila)
{
    if (file_exists('../../imagenes/Aventuras/' . $fila['PORTADA']))
        echo '<img class="imagenEntidad" src="../../imagenes/Aventuras/' . $fila['PORTADA'] . '" alt="portada ' . $fila['TITULO_AVENTURA'] . '">';
    else
        echo '<img class="imagenEntidad" src="../../imagenes/Aventuras/ImagenNoDisponible.png" alt="portada ' . $fila['TITULO_AVENTURA'] . '">';
    echo '<table class="aventuraTabla">';
    echo '<caption>(' . $fila['INDICE_ORDEN'] . ') - ' . $fila['TITULO_AVENTURA'] . '</caption>';
    echo '<tr><td>AÑO: [' . $fila['ANYO'] . ']</td></tr>';
    echo '<tr><th>DESCRIPCIÓN</th></tr>';
    echo '<tr><td>' . $fila['DESCRIPCION'] . '</td></tr>';
    echo '<tr><th>OBJETIVO</th></tr>';
    echo '<tr><td>' . $fila['OBJETIVO'] . '</td></tr>';

    if(isset($fila['PLATAFORMAS_LISTA']))
        escribirListadoDeDtosEnTabla('PLATAFORMAS DISPONIBLES', $fila['PLATAFORMAS_LISTA']);

    if(isset($fila['PERSONAJES_LISTA']))
        escribirListadoDeDtosEnTabla('APARICIONES', $fila['PERSONAJES_LISTA']);

    if(isset($fila['OBJETOS_LISTA']))
        escribirListadoDeDtosEnTabla('OBJETOS', $fila['OBJETOS_LISTA']);
    echo '</table>';
}

function escribirTablaMedia($fila)
{
    echo '<table class="aventuraTabla">';
    echo '<caption>(' . $fila['INDICE_ORDEN'] . ') - ' . $fila['TITULO_AVENTURA'] . '</caption>';
    echo '<tr><td>AÑO: [' . $fila['ANYO'] . ']</td></tr>';
    if(isset($fila['PLATAFORMAS_LISTA']))
        echo '<tr><th>Nª PLATAFORMAS DISPONIBLES: ' . count(explode(';',$fila['PLATAFORMAS_LISTA'])) . '</th></tr>';
    else
    echo '<tr><th>SIN PLATAFORMAS DISPONIBLES</th></tr>';

    if(isset($fila['PERSONAJES_LISTA']))
        echo '<tr><th>Nº APARICIONES TOTALES: ' . count(explode(';',$fila['PERSONAJES_LISTA'])) . '</th></tr>';
    else
        echo '<tr><th>SIN APARICIONES DE PERSONAJES</th></tr>';

    if(isset($fila['OBJETOS_LISTA']))
        echo '<tr><th>Nº DE OBJETOS TOTALES: ' . count(explode(';',$fila['OBJETOS_LISTA'])) . '</th></tr>';
    else
        echo '<tr><th>SIN OBJETOS</th></tr>';
    echo '</table>';
}

function escribirTablaCorta($fila)
{
    echo '<table class="aventuraTabla">';
    echo '<tr><td>(' . $fila['INDICE_ORDEN'] . ') - ' . $fila['TITULO_AVENTURA'] . ' [' . $fila['ANYO'] . ']</td></tr>';
    echo '</table>';
}

?>