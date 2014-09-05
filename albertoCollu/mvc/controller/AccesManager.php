<?php

require_once (__DIR__) . "/../model/User.php";
require_once (__DIR__) . "/../model/TecnoShop.php";

/**
 * Description of AccesManager
 * Gestisce gli accessi al sito web
 * @author Alberto
 */
class AccesManager {

    const
            ACCESS_FORBIDDEN = 0,
            ACCESS_GUEST = 1,
            ACCESS_BUYER = 2,
            ACCESS_SELLER = 4,
            ACCESS_ADMIN = 8,
            ACCESS_EVERYBODY = 14,
            ACCESS_NOBUYER = 12,
            ACCESS_NOSELLER = 10,
            ACCESS_NOADMIN = 6,
            ACCESS_PUBLIC = 15;

    private $user;
    private $msgError;
    private $isRegistered = FALSE;
    // Di default il livello d'accesso è GUEST
    private static $accessLevel = AccesManager::ACCESS_GUEST;

    function __construct() {
        if (isset($_SESSION["user"])) {
            $this->user = $_SESSION["user"];
            $this->updateAccessLevel($this->user->getIdentity());
        }
    }

    public static function getAccessLevel() {
        return self::$accessLevel;
    }

    public function getUser() {
        return $this->user;
    }

    public function isRegistered() {
        return $this->isRegistered;
    }

    private function updateAccessLevel($identity) {
        switch ($identity) {
            case "admin":
                AccesManager::$accessLevel = AccesManager::ACCESS_ADMIN;
                break;
            case "seller":
                AccesManager::$accessLevel = AccesManager::ACCESS_SELLER;
                break;
            case "buyer":
                AccesManager::$accessLevel = AccesManager::ACCESS_BUYER;
                break;
            default :
                AccesManager::$accessLevel = AccesManager::ACCESS_GUEST;
                break;
        }
    }

    public function getMsgError() {
        return $this->msgError;
    }

    public function login($email, $password) {
        if (isset($_SESSION["user"])) {
            $this->user = $_SESSION["user"];
        } else {
            $this->user = User::login($email, TecnoShop::sha1Password($password));
        }
        if ($this->user) {
            $_SESSION["user"] = $this->user;

            $this->updateAccessLevel($this->user->getIdentity());
        } else {
            $this->msgError = "Errore i dati inseriti sono incorretti!";
            echo $this->msgError;
        }
    }

    public function logout() {
        $_SESSION = array();

        if (session_id() != "" || isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 2592000, '/');
        }

        session_destroy();
        $this->user = NULL;
        // Quando l'utente fa il logout il suo livello d'accesso deve essere ripristinato a guest.
        AccesManager::$accessLevel = AccesManager::ACCESS_GUEST;
    }

    public static function checkGroupAccess($accessLevel, $predeterminedAccessLevel) {
        return ($accessLevel & $predeterminedAccessLevel);
    }

    public static function checkAccess($predeterminedAccessLevel) {
        return AccesManager::checkGroupAccess(AccesManager::$accessLevel, $predeterminedAccessLevel);
    }

    public function register($email, $password, $name, $surname, $identity, $address) {
        $result = User::realRegister($email, TecnoShop::sha1Password($password), $name, $surname, $identity, $address);
        if($result) {
            $this->isRegistered = TRUE;
        }
        return $result;
    }

}
