<script>
function generarGrafica()
{
    <?php 
    if(isset($_REQUEST['listaAventuras']))
    {
        $tituloMostrar = $_REQUEST['listaAventuras'];
        include '../../conexionBD.php';
        $stid = oci_parse($conexion, 'begin ESTADISTICAS.APARICIONES_OBJETOS(:V_TIT_AVEN, :A_PORCENTAJES, :A_OBJETOS); end;');
        oci_bind_by_name($stid, ":V_TIT_AVEN", $tituloMostrar);
        oci_bind_array_by_name($stid, ":A_OBJETOS", $objetos, 1000, 50, SQLT_CHR);
        oci_bind_array_by_name($stid, ":A_PORCENTAJES", $porcentajes, 1000, 50, SQLT_CHR);

        //EJECUTAR COMANDO EN BASE DE DATOS
        $conexionExitosa = @oci_execute($stid);

        //CAPTAR ERRORES DE CONEXIÓN
        if(! $conexionExitosa)
        {
            include '../capturarErrorBD.php';
            ?>
            alert('<?= $error ?>');
            <?php
        }

        else if (count($objetos) > 0)
        {
            ?>
            document.querySelector('#contenedorGrafica h2').textContent = "<?= $tituloMostrar ?>";
            let grafica = document.getElementById('grafica').getContext('2d');

            let chart = new Chart(grafica,{
                type:"horizontalBar",
                data:{
                    labels:<?php echo json_encode($objetos); ?>,
                    datasets:[{
                        label:'% DE APARICIÓN',
                        backgroundColor:'#81e0fe',
                        borderWidth:'5',
                        borderColor:'#8d98ff',
                        hoverBackgroundColor:'#5764d6',
                        data:<?php echo json_encode($porcentajes); ?>
                    }]
                },
                options:{ 
                    legend:{
                        labels:{
                            fontColor: "white",
                            fontSize: 18
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: "white"
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: "white",
                                stepSize: 1,
                                beginAtZero: true,
                                max: 100
                            }
                        }]
                    }
                }
            });
        <?php
        
        }

        else
        {
        ?>
            document.querySelector('#contenedorGrafica h2').textContent = "ESTA AVENTURA NO CONTIENE OBJETOS!";
        <?php
        }

        //LIBERACIÓN DE RECURSOS
        oci_free_statement($stid);
        oci_close($conexion);
    }
    ?>
    window.location.hash = '#contenedorGrafica';
}
</script>