pasarImagenYEnviarFormulario = function()
{
    formulario = document.getElementsByTagName('form')[0];
    formulario.imagenPersonaje.value = formulario.selectPersonaje.options[formulario.selectPersonaje.selectedIndex].id;
    formulario.submit();
}

window.onload = function()
{
    let fieldset = document.getElementById('opcionesGrafica');
    crearSelectPersonajes(fieldset,"selectPersonaje","selectPersonaje");
    
    this.document.getElementById('selectPersonaje').selectedIndex = -1;
    this.document.getElementById('selectPersonaje').addEventListener('change', pasarImagenYEnviarFormulario);
}