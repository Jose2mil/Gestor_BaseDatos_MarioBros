<?php

include '../conexionBD.php';
$stid = oci_parse($conexion, 'begin GESTION.MADRE(:OPCION, :OPCION2, :OPCION3, :V_NOM_PLAT, 
    :N_POT_PLAT, :V_TIT_AVEN, :V_POR_AVEN, :N_ANYO_AVEN, :V_DES_AVEN, :V_OBJ_AVEN, 
    :V_TITRK_AVEN, :V_IMP_AVEN, :A_TABLA_BUSQUEDA, :C_TABLA_COINCIDENCIAS, :RESULTADO); end;');

?>