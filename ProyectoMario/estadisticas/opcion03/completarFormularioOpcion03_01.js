window.onload = function()
{
    let formulario = document.formuIndice;
    let botonAnterior = formulario.anterior;
    let botonSiguiente = formulario.siguiente;

    let indiceActual = +formulario.numFilaInicial.value;
    let indiceMax = +formulario.coincidencias.value;
    let saltodePagina = +formulario.numRegistros.value;

    let eventoAnterior = function()
    {
        let nuevoIndice = indiceActual - saltodePagina;
        if(nuevoIndice < 1)
            nuevoIndice = 1;

        formulario.numFilaInicial.value = nuevoIndice;
        formulario.submit();
    }
    botonAnterior.addEventListener('click',eventoAnterior);

    let eventoSiguiente = function()
    {
        let nuevoIndice = indiceActual + saltodePagina;
        if(nuevoIndice > indiceMax - saltodePagina + 1)
            nuevoIndice = indiceMax - saltodePagina + 1;
        
        formulario.numFilaInicial.value = nuevoIndice;
        formulario.submit();
    }
    botonSiguiente.addEventListener('click',eventoSiguiente);

    if(indiceActual == 1)
        botonAnterior.style.display = "none";

    if(indiceActual >= indiceMax - saltodePagina + 1)
        botonSiguiente.style.display = "none";
    
    if(indiceMax <= 4)
        formulario.style.display = "none";
}