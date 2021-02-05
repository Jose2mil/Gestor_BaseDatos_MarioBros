window.onload = function()
{
    let fieldset = document.getElementById('opcionesGrafica');
    crearSelectAventuras(fieldset,"listaAventuras","listaAventuras");
    
    let select = document.getElementById("listaAventuras");
    select.selectedIndex = -1;
    select.addEventListener('change', function() { document.formu.submit()});

    generarGrafica();
}