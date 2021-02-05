function vaciarInformacion(contenedorEstadistica)
{
    while (contenedorEstadistica.hasChildNodes())
    {
        contenedorEstadistica.removeChild(contenedorEstadistica.firstChild);
    }
}

function mostrarInformacion(contenedorEstadistica, tituloTexto, introTexto, objetivos)
{
    vaciarInformacion(contenedorEstadistica);
    contenedorEstadistica.style.display = 'block';

    let titulo = document.createElement('h2');
    titulo.appendChild(document.createTextNode(tituloTexto));
    contenedorEstadistica.appendChild(titulo);

    let introduccion = document.createElement('p');
    introduccion.appendChild(document.createTextNode(introTexto));
    contenedorEstadistica.appendChild(introduccion);

    let tituloObjetivos = document.createElement('h3');
    tituloObjetivos.appendChild(document.createTextNode('OBJETIVOS A CUMPLIR'));
    contenedorEstadistica.appendChild(tituloObjetivos);

    let objetivoLista = document.createElement('ul');
    objetivoLista.style.listStyle = 'none';
    for(let i = 0; i < objetivos.length; i++)
    {
        let objetivo = document.createElement('li');
        objetivo.appendChild(document.createTextNode(objetivos[i]));
        objetivoLista.appendChild(objetivo);
    }
    contenedorEstadistica.appendChild(objetivoLista);
}