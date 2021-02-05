window.onload = function()
{
    let contenedorEstadistica = document.getElementById('contenedorEstadistica');

    let mostrarInformacionGestion = function()
    {
        let objetivos = new Array();
        objetivos.push('BORRADO DE TABLAS MEDIANTE INFORMACIÓN INTRODUCIDA POR EL USUARIO');
        objetivos.push('CONSULTA DE TABLAS MEDIANTE INFORMACIÓN INTRODUCIDA POR EL USUARIO');
        objetivos.push('INSERTADO DE REGISTROS EN CASO NECESARIO');

        let introTexto = "En el apartado de gestión se permitirá hacer algunas acciones como el insertado de registros en la tabla " +
        "\"CREARSE_PARA\" entre \"AVENTURAS\" y \"PLATAFORMAS\", se realizará una validación en los campos de la fecha de la aventura" +
        " (Deberá ser numérica entre 1983 y 2021), y sobre la potencia (Deberá ser un número superior a 1,5).Si a la hora de insertar alguna de las entidades no se encuentra " +
        "en la base de datos, se insertará automaticamente recogiendo los datos del formulario. Cuando se escriba el título de la aventura o el nombre de la plataforma, " +
        "se debera deseleccionar la casilla de texto para así realizar una llamada a la base de datos para consultar si ya se encuentra en la misma, en caso de ser así, los campos que no sean PK" +
        " se rellenarán automáticamente enfatizando esta situación con un borde de color verde sobre los mismos. Sólo se podrá consultar" +
        " y borrar una vez se hay comprobado que la entidad exite con anterioridad y no se esté seleccionando ningún campo de PK. Cuando " + 
        "queramos consultar un registro de las dos tablas se mostará la informacion de cada una de sus columnas" + 
        " junto a una tabla con los registros de la tabla contraria que relacionan con el mismo.";

        mostrarInformacion(contenedorEstadistica, 'PARTE I - GESTION (M-M)', introTexto, objetivos);
    }

    let mostrarInformacionEstadistica = function()
    {
        let objetivos = new Array();
        objetivos.push('(DESCRITOS EN LA PRÓXIMA PANTALLA)');

        let introTexto = "En las siguientes pantallas de estadísticas se han intentado cumplir los objetivos de proyecto, " +
        "cada estadística tiene una breve introducción y un listado de objetivos que se han intentado conseguir con la misma. " +
        "Toda intervención del usuario se ha intentado simplificar lo máximo posible por lo que no creo que se necesite una larga " +
        "explicación sobre su uso. En esta parte de proyecto la capturación de errores de la base de datos se han realizado mediante \"oci_error()\", para mi gusto," +
        " mucho más cómodo que utilizando un parámetro por referencia como puede ser una Varchar2 o boolean, pero en esta parte del proyecto no" +
        " ha sido necesario tanto control de excepciones ya que se controla casi toda a entrada de datos desde php mediante uso de " +
        "selects recogidos previamente desde la misma base de datos. A pesar de ser solamente 3 estadísticas he intentado cumplir con los objetivos del proyecto.";

        mostrarInformacion(contenedorEstadistica, 'PARTE II - ESTADISTICAS', introTexto, objetivos);
    }

    document.getElementById('opcionGestion').addEventListener('mouseover', mostrarInformacionGestion);
    document.getElementById('opcionEstadisticas').addEventListener('mouseover', mostrarInformacionEstadistica);
}