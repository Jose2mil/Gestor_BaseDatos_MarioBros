window.onload = function()
{
    let contenedorEstadistica = document.getElementById('contenedorEstadistica');

    let mostrarInformacionPowerUps = function()
    {
        let objetivos = new Array();
        objetivos.push('1 Cursor declarado que no sea FOR con datos de varias tablas.');
        objetivos.push('Calculos usando \"if\" o \"case\".');
        objetivos.push('Al menos 1 bucle sin cursores.');
        objetivos.push('Al menos 2 \"select into\".');
        objetivos.push('Uso del Rowtype.');
        objetivos.push('1 PHP Dinámico con 3 pantallas.');

        let introTexto = "La estadística comienza con la elección de un power-up de la base de datos, " + 
        "una vez seleccionado se redireccionará a la segunda pantalla php, donde se mostrará un listado de" + 
        " las aventuras donde aparezca el objeto anteriormente seleccionado ordenados por el título junto a más información de la misma." +
        " Cada una de las aventuras listadas presentará un botón el cual te redireccionará a la tercera pantalla php," +
        " donde se observará una gráfica, donde se plasmarán los porcentajes de aparición de todos los objetos de esa aventura. En esta tercera " +
        "pantalla habrá un formulario con un desplegable, donde se podrá cambiar la avetura de la gráfica.";

        mostrarInformacion(contenedorEstadistica, 'ESTADISTICAS DE POWER UP', introTexto, objetivos);
    }

    let mostrarInformacionPersonajes = function()
    {
        let objetivos = new Array();
        objetivos.push('2 Estadísticas con 2 cursores declarados y vinculados');
        objetivos.push('Vinculación de cursores por parámetro.');
        objetivos.push('Vinculación de cursores por variable.');
        objetivos.push('Creación de estructura mediente DOM con datos recibidos por PHP.');
        objetivos.push('PHP Multipantalla.');

        let introTexto = "Se trata de dos estadísticas vinculadas por un mismo formulario, " + 
        "el cual te da a elegir entre dos opciones: \"PARAMETRIZADO\" (Se mostrarán los datos de la " +
        "estadística mediante cursores vinculados por parámetro), se listarán todos los objetos que son " +
        "compatibles con el personaje seleccionado a lo largo de las aventuras junto a las habilidades de los mismos; y \"MEDIANTE VARIABLE\" (Se mostrarán " +
        "los datos de la estadística mediante cursores vinculados por variable), en esta segunda se mostarán las " + 
        "aventuras en las que ha aparecido el personaje elegido y justo debajo de cada una, los objetos " +
        "compatibles con el personaje en dicha aventura.";

        mostrarInformacion(contenedorEstadistica, 'ESTADISTICAS DE PERSONAJES', introTexto, objetivos);
    }

    let mostrarInformacionBuscador = function()
    {
        let objetivos = new Array();
        objetivos.push('Buscador sobre varias tablas.');
        objetivos.push('Al menos 4 criterios de búsqueda.');
        objetivos.push('SQL "Dinámico".');
        objetivos.push('Funciones y Arrays PHP.');
        objetivos.push('Paginador.');

        let introTexto = "La tercera estadística se trata de un buscador de aventuras, el cual, a partir de unos parametros muestra " +
        "las coincidencias en forma de listado. En caso de aparecer más de 8 aventuras, se mostrarán con información en formato corto, " +
        "en caso de haber de 5 a 8 aventuras, se verán algunos datos adicionales, y si resultan 4 o menos, esta mostrará su información " +
        "en un formato largo. A esta estadística se le ha añadido un paginador con una capacidad de 4 aventuras por página, es un simple paginador " +
        "gestionado entre el php y la base de datos.";

        mostrarInformacion(contenedorEstadistica, 'ESTADISTICA DE BUSCADOR', introTexto, objetivos);
    }

    document.getElementById('opcionPowerUps').addEventListener('mouseover', mostrarInformacionPowerUps);
    document.getElementById('opcionPersonajes').addEventListener('mouseover', mostrarInformacionPersonajes);
    document.getElementById('opcionBuscador').addEventListener('mouseover', mostrarInformacionBuscador);
}