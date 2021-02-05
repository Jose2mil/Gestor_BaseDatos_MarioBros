<?php
    include 'recogerDatos.php';
    
    if(empty($titulo))
    {
        $hayErrores = true;
        $errores = $errores . ';Título de aventura obligatorio';
    }

    if(! empty($anyo) && (! is_numeric($anyo) || intval($anyo) < 1983 || intval($anyo) > 2021))
    {
        $hayErrores = true;
        $errores = $errores . ';El año debe ser numérico entre 1983 y 2021';
    }

    else if (! empty($anyo))
        $anyo = intval($anyo);
?>