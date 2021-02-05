<?php
    include 'recogerDatos.php';

    if(empty($nombre))
    {
        $hayErrores = true;
        $errores = $errores . ';Nombre de plataforma obligatorio';
    }

    if(! empty($potencia) && floatval($potencia) < 1.5)
    {
        $hayErrores = true;
        $errores = $errores . ';La potencia debe ser un numero decimal superior a 10 MHz';
    }

    else if(! empty($potencia))
        $potencia = floatval($potencia);
?>