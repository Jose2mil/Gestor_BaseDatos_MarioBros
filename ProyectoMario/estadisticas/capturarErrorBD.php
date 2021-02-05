<?php

$error = oci_error($stid);
$error = $error['message'];
$error = substr($error, strpos($error, 'ORA-') + 11);
$error = substr($error, 0, strpos($error, 'ORA-') - 1);

?>