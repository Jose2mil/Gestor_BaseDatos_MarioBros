function combrobarFechas()
{
    let fechaMinima = document.formu.fechaMin;
    let fechaMaxima = document.formu.fechaMax;
    
    if(fechaMinima.value != ""  && fechaMaxima.value != "" && +(fechaMinima.value) > +(fechaMaxima.value))
    {
        if(confirm('La fecha mínima es superior a la máxima, ¿Quieres alternarlas?'))
        {
            let aux = fechaMinima.value;
            fechaMinima.value = fechaMaxima.value;
            fechaMaxima.value = aux;

            return true;
        }
        return false;
    }
    return true;
}

window.onload = function()
{
    let contenedorListaRemakes = document.getElementById('contenedorListaRemakes');
    crearSelectAventuras(contenedorListaRemakes,"listaRemakes","listaRemakes");
    contenedorListaRemakes.appendChild(document.createTextNode(" (SI ES REMAKE)"));

    let contenedorlistaPowerUps = document.getElementById('contenedorlistaPowerUps');
    crearSelectPowerUps(contenedorlistaPowerUps,"listaPowerUps","listaPowerUps");

    let contenedorListaPersonajes = document.getElementById('contenedorListaPersonajes');
    crearSelectPersonajes(contenedorListaPersonajes,"listaPersonajes","listaPersonajes");
    
    let vaciarSelects = function()
    {
        let selects= document.getElementsByTagName('select');
        for(let i = 0; i < selects.length; i++)
            selects[i].selectedIndex = -1;
    }
    vaciarSelects();

    document.getElementsByName('VACIAR')[0].onblur = vaciarSelects;
}