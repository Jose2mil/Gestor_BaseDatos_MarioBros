<?php

include 'conexionBDMadre.php';

$opcion1 = "RELLENAR";

if($rellenar == 'aventura')
    $opcion2 = "AVENTURA";
else if($rellenar == 'plataforma')
    $opcion2 = "PLATAFORMA";

include 'asignarVariablesAMadre.php';

oci_execute($stid); 

if(empty($resultado))
{
    if($rellenar == 'aventura')
    {
        $portada = $tablaBusqueda[1];
        $anyo = $tablaBusqueda[2];
        $descripcion = $tablaBusqueda[3];
        $objetivo = $tablaBusqueda[4];
        $tituloRemake = $tablaBusqueda[5];
        $implementacion = $tablaBusqueda[6];
        $bloquearCamposA = true;
    }

    else if($rellenar == 'plataforma')
    {
        $potencia = $tablaBusqueda[1];
        $bloquearCamposP = true;
    }
}

else
{
    if($rellenar == 'aventura')
        $bloquearCamposA = false;
    else if($rellenar == 'plataforma')
        $bloquearCamposP = false;
}

oci_free_statement($stid);
oci_close($conexion);

?>