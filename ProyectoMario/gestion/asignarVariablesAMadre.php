<?php

oci_bind_by_name($stid, ":OPCION", $opcion1);
oci_bind_by_name($stid, ":OPCION2", $opcion2);
oci_bind_by_name($stid, ":OPCION3", $opcion3);
oci_bind_by_name($stid, ":V_NOM_PLAT", $nombre);
oci_bind_by_name($stid, ":N_POT_PLAT", $potencia);
oci_bind_by_name($stid, ":V_TIT_AVEN", $titulo);
if(is_numeric($anyo))
    oci_bind_by_name($stid, ":V_POR_AVEN", $portada);
else
    oci_bind_by_name($stid, ":V_POR_AVEN", $portadaAux);

if(is_numeric($anyo))
    oci_bind_by_name($stid, ":N_ANYO_AVEN", $anyo);
else
    oci_bind_by_name($stid, ":N_ANYO_AVEN", $anyoAux);

oci_bind_by_name($stid, ":V_DES_AVEN", $descripcion);
oci_bind_by_name($stid, ":V_OBJ_AVEN", $objetivo);
oci_bind_by_name($stid, ":V_TITRK_AVEN", $tituloRemake);
oci_bind_by_name($stid, ":V_IMP_AVEN", $implementacion);

oci_bind_array_by_name($stid, ":A_TABLA_BUSQUEDA", $tablaBusqueda, 8, 300, SQLT_CHR);

$tablaCoincidencias = oci_new_cursor($conexion);
oci_bind_by_name($stid, ":C_TABLA_COINCIDENCIAS", $tablaCoincidencias, -1, OCI_B_CURSOR);	

oci_bind_by_name($stid, ":RESULTADO", $resultado, 150);

?>