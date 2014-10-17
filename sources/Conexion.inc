<?php

//   Date             Modified by         Change(s)
//   2013-09-24         HMP                 1.1



require_once ("Config.php");
require_once 'Error.inc';

class Conexion {

    private $id = null;

    /**
     * Construcción del objeto Conexión     * 
     */
    function __construct() {
        $this->id = pg_connect("host=" . HOST . " port=" . PORT . " dbname=" . DB_NAME . " user=" . USER . " password=" . PASS);
        if (!$this->id)
            (Error::error_pgsql(pg_errormessage(), __FILE__, __LINE__, __CLASS__, __FUNCTION__, __METHOD__, $_SERVER['PHP_SELF'], "Error al Conectar a la Base de Datos"));
    }

    /**
     * Destrucción del objeto Conexión
     * @return type
     */
    function __destruct() {
        if ($this->id) {
            return @pg_close($this->id);
        }
    }

    /**
     * Obtner ID Conexión
     * @return type
     */
    function getIdConexion() {
        return $this->id;
    }

}

?>
