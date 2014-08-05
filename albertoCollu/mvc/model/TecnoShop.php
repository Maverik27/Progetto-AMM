<?php

require_once 'Database.php';

/**
 * Description of TecnoShop
 *
 * @author Alberto
 */
class TecnoShop {

    private $msgError;
    private static $database;
    //debug 
    private $debugErr; //da cancellare

    function __construct() {
        TecnoShop::$database = new Database(USER_DB, PASSWORD_DB, NAME_DB);
        if (TecnoShop::$database->isConnected()) {
            $this->msgError = NULL;
            $this->debugErr = "Connessione al Database Corretta\n";
        } else {
            $this->msgError = "Offline Error!! (" . TecnoShop::$database->getDatabase()->connect_errno . " / - / " . TecnoShop::$database->getDatabase()->connect_error . ")";
            TecnoShop::$database = NULL;
        }
    }

    public function getMsgError() {
        return $this->msgError;
    }

    public static function getDatabase() {
        return self::$database;
    }

    public function getDebugErr() {
        return $this->debugErr;
    }

    public static function sha1Password($password) {
        return sha1($password);
    }
}
