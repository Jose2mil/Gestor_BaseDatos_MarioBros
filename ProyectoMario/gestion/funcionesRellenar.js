window.onload = function()
{
    let formulario = document.getElementsByName('formu')[0];
    let campoRellenar = document.getElementsByName('rellenar')[0];
    let campoTitulo = document.getElementsByName('titulo')[0];
    let campoNombre = document.getElementsByName('nombre')[0];

    function bloquearOpcionesA()
    {
        formulario.borrarAventura.disabled = true;
        formulario.consultarAventura.disabled = true;
    }

    function bloquearOpcionesP()
    {
        formulario.borrarPlataforma.disabled = true;
        formulario.consultarPlataforma.disabled = true;
    }

    let rellenarAventura = function()
    {
        campoRellenar.value = 'aventura';
        formulario.submit();
    }

    let boquearOpcionesAventura = function()
    {
        bloquearOpcionesA();
    }

    let boquearOpcionesPlataforma = function()
    {
        bloquearOpcionesP();
    }

    let rellenarPlataforma = function()
    {
        campoRellenar.value = 'plataforma';
        formulario.submit();
    }

    if(formulario != undefined)
    {
        campoTitulo.addEventListener('blur', rellenarAventura);
        campoTitulo.addEventListener('focus', boquearOpcionesAventura);
        campoNombre.addEventListener('blur', rellenarPlataforma);
        campoNombre.addEventListener('focus', boquearOpcionesPlataforma);

        if(formulario.bloquearCamposA.value == 1)
        {
            formulario.portada.readOnly = true;
            formulario.anyo.readOnly = true;
            formulario.descripcion.readOnly = true;
            formulario.objetivo.readOnly = true;
            formulario.tituloRemake.readOnly = true;
            formulario.implementacion.readOnly = true;
        }

        else
        {
            bloquearOpcionesA();
        }

        if(formulario.bloquearCamposP.value == 1)
        {
            formulario.potencia.readOnly = true;
        }

        else
        {
            formulario.borrarPlataforma.disabled = true;
            formulario.consultarPlataforma.disabled = true;
        }
    }
}