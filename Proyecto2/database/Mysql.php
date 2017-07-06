<?php
require_once 'Connection.php';

/* @author Claret */
class Mysql implements Connection{
    //variable que contiene la instancia de la conexion a Mysql
    private static $con = FALSE;

    /**
     * Funcion para obtener la información de la conexión,
     * en caso de que la conexión no exista, devuelve null
     * @return mysqli_connection
     */
    public static function get_connection() {
        return self::$con;
    }

    /**
     * Funcion para abrir una nueva conexión a Mysql.
     * En caso de que no se contecte muestra un error en pantalla
     */
    public static function open() {
        self::$con = mysqli_connect("localhost:3306", "root", "gamma26", "db_management_associations");
        if (mysqli_connect_errno()) {
            echo "Error de conexión a MySQL: " . mysqli_connect_error();
        }
    }

    /**
     * Funcion para cerrar una conexión a mysql
     */
    public static function close() {
        if (self::$con <> FALSE) {
            mysqli_close(self::$con);
            self::$con = FALSE;
        }
    }

    /**
     * Funcion para obtener un resultset de una consulta SQL
     * hecha a mysql
     * @param string $query
     * @return resultset
     */
    public static function query($query) {
        return mysqli_query(self::$con, $query);
    }

    /**
     * Funcion para obtener una fila con los resultados de una consulta
     * resultset sql
     * @param resultset $resultset
     * @return array
     */
    public static function get_row_array($resultset) {
        return mysqli_fetch_assoc($resultset);
    }

    /**
     * Funcion para ejecutar una consulta en SQL y conocer
     * si se ejecutó correctamente
     * @param string $query
     * @return bool
     */
    public static function execute($query) {
        return (self::query($query) !== FALSE) ? TRUE : FALSE;
    }

    public static function get_fetch_array($resultset) {
        return mysqli_fetch_array($resultset);
    }
}
