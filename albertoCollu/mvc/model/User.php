<?php

require_once 'Database.php';

/**
 * Description of User
 * Gestisce i 3 tipi di utenti
 * @author Alberto
 */
class User {

    private $id;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $address;
    private $identity;
    private $credit;
    private static $tempAttributes = Array();

    const IDENTITY_GUEST = "",
            IDENTITY_BUYER = "buyer",
            IDENTITY_SELLER = "seller",
            IDENTITY_ADMIN = "admin";
    const EMAIL = "email",
            NAME = "name",
            SURNAME = "surname",
            ADDRESS = "address";

    function __construct() {
        
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function setIdentity($identity) {
        $this->identity = $identity;
    }

    public function setCredit($credit) {
        $this->credit = $credit;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getIdentity() {
        return $this->identity;
    }

    public function getCredit() {
        return $this->credit;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public static function setTempAttributes($tempAttributes) {
        self::$tempAttributes = $tempAttributes;
    }

    public static function fillInArray() {
        if (count(User::$tempAttributes) == 0) {
            User::$tempAttributes[User::EMAIL] = ModelDb::$mapperDb["usersTable"]["email"];
            User::$tempAttributes[User::NAME] = ModelDb::$mapperDb["usersTable"]["name"];
            User::$tempAttributes[User::SURNAME] = ModelDb::$mapperDb["usersTable"]["surname"];
            User::$tempAttributes[User::ADDRESS] = ModelDb::$mapperDb["usersTable"]["address"];
        }
    }

    public static function login($email, $password) {
        $db = TecnoShop::getDatabase();
        if ($db == NULL) {
            echo 'Database Non trovato';
            return NULL;
        }
        /* assegno alla variabile table la tabella usersTable contenuta 
         * nell'array mapperDb ad indice tables del database chiamato NAME_DB 
         * che fa riferimento al file config.php dove il name del database è TecnoShop
         */
        $table = NAME_DB . "." . ModelDb::$mapperDb["tables"]["usersTable"];

        //metodi per la gestione della sicurezza dell'input
        $email = $db->getDatabase()->escape_string($email);
        $password = $db->getDatabase()->escape_string($password);

        $query = "SELECT * FROM $table WHERE " . ModelDb::$mapperDb["usersTable"]["email"] . "=\"$email\" AND " . ModelDb::$mapperDb["usersTable"]["password"] . "=\"$password\" limit 1;";

        $data = $db->query($query);

        if (count($data) == 0) {
            return NULL;
        }

        $user = new User();

        $user->id = $data[0][ModelDb::$mapperDb["usersTable"]["id"]];
        $user->email = $data[0][ModelDb::$mapperDb["usersTable"]["email"]];
        $user->password = $data[0][ModelDb::$mapperDb["usersTable"]["password"]];
        $user->name = $data[0][ModelDb::$mapperDb["usersTable"]["name"]];
        $user->surname = $data[0][ModelDb::$mapperDb["usersTable"]["surname"]];
        $user->address = $data[0][ModelDb::$mapperDb["usersTable"]["address"]];
        $user->identity = $data[0][ModelDb::$mapperDb["usersTable"]["identity"]];
        $user->credit = $data[0][ModelDb::$mapperDb["usersTable"]["credit"]];

        return $user;
    }

    public static function realRegister($email, $password, $name, $surname, $identity, $address) {
        $db = TecnoShop::getDatabase();
        if ($db == NULL) {
            return NULL;
        }

        $email = $db->getDatabase()->escape_string($email);
        $password = $db->getDatabase()->escape_string($password);
        $name = $db->getDatabase()->escape_string($name);
        $surname = $db->getDatabase()->escape_string($surname);
        $address = $db->getDatabase()->escape_string($address);

        $query = "INSERT INTO `" . NAME_DB . "`.`" . ModelDb::$mapperDb["tables"]["usersTable"] . "` (`"
                . ModelDb::$mapperDb["usersTable"]["id"] . "`, `"
                . ModelDb::$mapperDb["usersTable"]["email"] . "`, `"
                . ModelDb::$mapperDb["usersTable"]["password"] . "`, `"
                . ModelDb::$mapperDb["usersTable"]["name"] . "`, `"
                . ModelDb::$mapperDb["usersTable"]["surname"] . "`, `"
                . ModelDb::$mapperDb["usersTable"]["address"] . "`, `"
                . ModelDb::$mapperDb["usersTable"]["identity"] . "`, `"
                . ModelDb::$mapperDb["usersTable"]["credit"] . "` ) VALUE ("
                . "NULL, '"
                . "$email', '"
                . "$password', '"
                . "$name', '"
                . "$surname', '"
                . "$address', '"
                . "$identity', '"
                . "0.0');";
        if ($db->getRowsAfterQuery($query) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function updateUser($idUser, $arrayChange) {
        $db = TecnoShop::getDatabase();
        if ($db == NULL) {
            return NULL;
        }
        $table = "`" . NAME_DB . "`.`" . ModelDb::$mapperDb["tables"]["usersTable"] . "`";
        $idUser = $db->getDatabase()->escape_string($idUser);
        foreach ($arrayChange as $key => $value) {
            $arrayChange[$key] = $db->getDatabase()->escape_string($value);
        }

        $query = "UPDATE $table SET ";
        User::fillInArray();
        $i = 0;
        foreach ($arrayChange as $key => $value) {
            if (($i++) != 0) {
                $query .= ", ";
            }
            $query .= "`" . User::$tempAttributes[$key] . "`='$value'";
        }
        $query .= "WHERE $table. `" . ModelDb::$mapperDb["usersTable"]["id"] . "`='$idUser';";

        if ($db->getRowsAfterQuery($query) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function updateCredit($idUser, $import) {
        $db = TecnoShop::getDatabase();
        if ($db == NULL) {
            return NULL;
        }
        $table = "`" . NAME_DB . "`.`" . ModelDb::$mapperDb["tables"]["usersTable"] . "`";
        $idUser = $db->getDatabase()->escape_string($idUser);
        $import = $db->getDatabase()->escape_string($import);
        $query = "UPDATE $table SET `" . ModelDb::$mapperDb["usersTable"]["credit"] . "`='$import' WHERE `" . ModelDb::$mapperDb["usersTable"]["id"] . "`='$idUser';";
        if ($db->getRowsAfterQuery($query) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function realUpdateCredit($idUser, $import) {
        $db = TecnoShop::getDatabase();
        if ($db == NULL) {
            return NULL;
        }
        //inizio della transazione
        $db->startTransaction();
        //se il metodo updateCredit retituisce TRUE (andato a buon fine) rochiamo il metodo commit
        if (User::updateCredit($idUser, $import)) {
            $db->commit();
            return TRUE;
        }
        //altrimenti richiamo il metodo rollback per ripristinare il database allo stato precedente
        else {
            $db->rollback();
            return FALSE;
        }
    }

}
