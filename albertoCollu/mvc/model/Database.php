<?php

require_once 'ModelDb.php';

/**
 * Description of Database
 * Connette l'applicazione al database creato
 * @author Alberto
 */
class Database {

    private $connected; //indica lo stato della connessione al database
    private $database;

    function __construct($username, $password, $database, $port = "3306", $host = "localhost") {
        $this->connected = FALSE; //inizializzo lo stato della connessione a false
        $this->database = new mysqli($host, $username, $password, $database, $port); //creo l'oggetto database con i parametri configurati in precedenza

        if (!$this->database->connect_errno) {
            $this->connected = TRUE;
        }
    }

    public function getDatabase() {
        return $this->database;
    }

    public function isConnected() {
        return $this->connected;
    }

    public function query($query) {
        $tableTemp = array();
        // richiamo il metodo query sull'oggetto database di tipo mysqli 
        $result = $this->database->query($query);
        if (is_object($result)) {
            $i = 0;
            while ($r = $result->fetch_assoc()) {
                $tableTemp[$i++] = $r;
            }
        }
        return $tableTemp;
    }

    public function getIdQuery($query) {
        $resultArray = $this->query($query);
        //la query è diventata un array associativo
        if (count($resultArray)) {
            $keys = array_keys($resultArray[0]);
            return $resultArray[0][$keys[0]];
        } else {
            return FALSE;
        }
    }

    public function getRowsAfterQuery($query) {
        $q = $this->database->query($query);
        return $this->database->affected_rows;
    }

    public function startTransaction() {
        $this->database->autocommit(FALSE);
    }

    public function commit() {
        $this->database->commit();
        $this->database->autocommit(TRUE);
    }

    public function rollback() {
        $this->database->rollback();
        $this->database->autocommit(TRUE);
    }

}
