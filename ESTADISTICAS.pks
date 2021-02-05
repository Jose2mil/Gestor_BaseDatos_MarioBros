CREATE OR REPLACE PACKAGE MARIO.ESTADISTICAS 
IS
    TYPE ARRAY_DATOS IS TABLE OF VARCHAR2(200) INDEX BY BINARY_INTEGER;
    TYPE CURSOR_DATOS IS REF CURSOR;
    
    FUNCTION LISTAR_POWER_UPS RETURN SYS_REFCURSOR;
    
    PROCEDURE AVENTURAS_DE_OBJETO(V_CODIGO_OBJETO OBJETOS.CODIGO%TYPE, C_AVENTURAS_SALIDA OUT CURSOR_DATOS);
    
    FUNCTION LISTAR_AVENTURAS RETURN ARRAY_DATOS;
    
    PROCEDURE APARICIONES_OBJETOS(V_TIT_AVEN AVENTURAS.TITULO%TYPE, 
        A_PORCENTAJES OUT ARRAY_DATOS, A_OBJETOS OUT ARRAY_DATOS);
    
    FUNCTION LISTAR_PERSONAJES RETURN SYS_REFCURSOR;
    
    PROCEDURE LISTA_PERS_OBJ_COMPAT(V_PERSONAJE PERSONAJES.NOMBRE_JAP%TYPE, C_DATOS_DEVUELTOS OUT CURSOR_DATOS);
    
    PROCEDURE LISTA_PER_OBJ_HAB(V_PERSONAJE PERSONAJES.NOMBRE_JAP%TYPE, C_DATOS_DEVUELTOS OUT CURSOR_DATOS);
    
    PROCEDURE BUSCAR_AVENTURA(V_SUBCADENA VARCHAR2, V_CADENA_BUSQUEDA VARCHAR2, 
        N_ANYO_MIN NUMBER, N_ANYO_MAX NUMBER, V_TITULO_REMAKE AVENTURAS.TITULO_REMAKE%TYPE, 
        V_POWER_UP POWER_UPS.CODIGO_OBJETO%TYPE, V_PERSONAJE PERSONAJES.NOMBRE_JAP%TYPE,
        N_FILA_INICIO NUMBER, N_NUM_REGISTROS NUMBER, C_DATOS_DEVUELTOS OUT CURSOR_DATOS, COINCIDENCIAS OUT NUMBER);
END ESTADISTICAS;
/