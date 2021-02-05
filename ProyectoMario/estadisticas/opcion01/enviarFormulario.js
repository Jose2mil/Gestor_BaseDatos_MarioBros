mandarFomulario = function (aventura)
{
    let formulario = document.getElementsByName('formu')[0];
    formulario.listaAventuras.value = aventura;
    formulario.submit();
}