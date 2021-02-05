window.onload = function()
{
    let fieldset = document.getElementById('opcionesGrafica');
    crearSelectPowerUps(fieldset,"listaPowerUps","listaPowerUps");

    let select = document.getElementById("listaPowerUps");
    select.selectedIndex = -1;
    select.addEventListener('change', function() { document.formu.submit()});
}